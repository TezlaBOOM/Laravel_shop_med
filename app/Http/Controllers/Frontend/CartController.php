<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Backorder;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;

use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
        $backorders = Backorder::all();


    
        if($product->qty > $request->qty){
            foreach($backorders as $backordered)
            {
                if($product->backorder == $backordered->id){
                    if($backordered->sell == 1){
                            $this->addToCartBackorder($request,$product);
                            return response(['status' =>'success', 'message' =>'Dodano. Produkt do kupna1']);
                    }else{
                            return response(['status' =>'error', 'message' =>'Dodano. Produkt nie możliwy w tym monęcie do kupienia. Status produktu: '.$backordered->name]);
                    }
                }else{
                    if($product->backorder == $backordered->id){
                        if($backordered->sell == 1){
                            $this->addToCartBackorder($request,$product);
                            return response(['status' =>'warning', 'message' =>'Dodano. Status produktu: '.$backordered->name]);
                        }else{
                            return response(['status' =>'error', 'message' =>'Produkt nie możliwy w tym monęcie do kupienia. Status produktu: '.$backordered->name]);
                        }
                    }
                }
            }

        }else{
            foreach($backorders as $backordered)
            {
                if($product->backorder == $backordered->id){
                    if($backordered->sell == 1){
                            $this->addToCartBackorder($request,$product);
                            return response(['status' =>'warning', 'message' =>'Dodano. Status produktu: '.$backordered->name]);
                    }else{
                            return response(['status' =>'error', 'message' =>'Produkt nie możliwy w tym monęcie do kupienia. Status produktu: '.$backordered->name]);
                    }
                }else{
                    if($product->backorder == $backordered->id){
                        if($backordered->sell == 1){
                            $this->addToCartBackorder($request,$product);
                            return response(['status' =>'warning', 'message' =>'Status produktu: '.$backordered->name]);
                        }else{
                            return response(['status' =>'error', 'message' =>'Produkt nie możliwy w tym monęcie do kupienia. Status produktu: '.$backordered->name]);
                        }
                    }
                }
            }
        }
        $this->addToCartBackorder($request,$product);
        return response(['status'=> 'success','message'=>'Dodano produkt do koszyka']);

    }
    public function addToCartBackorder(Request $request,$product)
    {
        
        $variants =[];
        $variantTotalAmount = 0;


            if($request->has('variants_items')){
                foreach ($request->variants_items as $item_id)
                {
                    $variantItem = ProductVariantItem::find($item_id);
                    $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                    $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                    $variants[$variantItem->productVariant->name]['sku'] = $variantItem->sku;
                    $variantTotalAmount += $variantItem->price;
                }
            }
        $variants['main']['backorder'] = $product->backorder;
        $variants['main']['storage'] = $product->qty;
        

        $productPrice = 0;

        if(checkDiscount($product))
        {
            $productPrice = $product->offer_price ;
        }else {
            $productPrice = $product->price;
        }



        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product ->name;
        $cartData['qty'] = $request->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product ->thumb_image;
        $cartData['options']['slug'] = $product ->slug;
        //dd($cartData);
        Cart::add($cartData);
    }

    //show cart page
    public function CartDetails()
    {
        $cartItems = Cart::content();

        if(count($cartItems)===0)
        {   
            Session::forget('coupon');
            toastr('Koszy jest pusty','warning','Uwaga!');
            return redirect()->route('home');
        }
        $cart_banner = Advertisement::where('key', 'cart_banner')->first();
        $cart_banner = json_decode($cart_banner?->value);
        $backorders= Backorder::all();
      
        return view('frontend.pages.cart-detail',compact('cartItems','cart_banner','backorders'));
    }

    public function updateProductQty(Request $request)
    {
        $productId = Cart::get($request->rowId)->id;
        $product = Product::findOrFail($productId);

        if($product->qty===0)
        {
            switch($product->backorder)
            {
                case 0:
                    return response(['status' =>'warning', 'message' =>'Produkt na zamówienie']);
                break;
                case 1:
                    return response(['status' =>'error', 'message' =>'Produkt wycofany']);
                break;
                default:
                     return response(['status' =>'warning', 'message' =>'produkt na zamówienie Indiwidualnie']);
                break;
            } 
        }elseif($product->qty < $request->qty){
            switch($request->backorder)
            {
                case 0:
                    return response(['status' =>'warning', 'message' =>'Produkt zostanoie do zamówienie']);
                break;
                case 1:
                    return response(['status' =>'error', 'message' =>'Nie ma wystarczającej ilości produktu na magaznynie']);
                break;
                default:
                     return response(['status' =>'warning', 'message' =>'Produkt zostanoie do zamówienie Indiwidualnie']);
                break;
            } 
        }


        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status'=>'success','message'=>'zmieniono ilość','productTotal'=>$productTotal]);
        
    }
    public function getProductTotal($rowId)
        {
           $product = Cart::get($rowId);
           $total = ($product->price + $product->options->variants_total) * $product->qty;
           return $total;
        }

    public function cartTotal()
    {
        $total = 0;
        foreach(Cart::content() as $product){
            $total += $this->getProductTotal($product->rowId);
        }

        return $total;
    }




    public function clearCart()
    {
        cart::destroy();
        return response(['status'=>'success','message'=>'koszyk wyczyszczono']);
    }
    public function removeProduct($rowId)
    {
        Cart::remove($rowId);
        toastr('Product usunięty','success','Sukces!');
        return redirect()->back();
    }
    public function getCartCount()
    {
        return Cart::content()->count();
    }
    public function getCartProducts()
    {
        return Cart::content();
    }
    public function removeSidebarProduct(Request $request)
    {
        Cart::remove($request->rowId);
        return response(['status'=>'success','message'=>'usunięto']);
    }

    public function applyCoupon(Request $request){
        // if($request->coupon_code === null){
        //     return response(['status'=>'error','message'=>'kupon jest wymagany']);
        // }
        $coupon = Coupon::where(['code'=>$request->coupon_code,'status'=>1])->first();

        if($coupon === null){
            Session::forget('coupon');
            return response(['status'=>'error','message'=>'Kupon nie istnieje 1']);
        }elseif($coupon->start_date > date('Y-m-d')){
            return response(['status'=>'error','message'=>'Kupon nie istnieje 2']);
        }elseif($coupon->end_date < date('Y-m-d')){
            return response(['status'=>'error','message'=>'Kupon wygasł']);
        }elseif($coupon->total_used >= $coupon->quantity){
            return response(['status'=>'error','message'=>'Kupon wyczerpał się']);
        }

        if($coupon->discount_type === 'amount'){
            Session::put('coupon',[
                'coupon_name'=>$coupon->name,
                'coupon_code'=>$coupon->code,
                'discount_type'=>'amount',
                'discount'=>$coupon->discount,
            ]);
        }elseif($coupon->discount_type === 'percent'){
            Session::put('coupon',[
                'coupon_name'=>$coupon->name,
                'coupon_code'=>$coupon->code,
                'discount_type'=>'amount',
                'discount'=>$coupon->discount,
            ]);

        }

        return response(['status'=>'success', 'message'=>'Kupon aktywowany']);
    }


    //cupon calculation
    public function couponCalculation(){
        if(Session::has('coupon')){
            $coupon = Session::get('coupon');
            $subTotal = getCartTotal();
            if($coupon['discount_type'] === 'amount'){
                $total = $subTotal - $coupon['discount'];
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $coupon['discount']]);
            }elseif($coupon['discount_type'] === 'percent'){
                $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
                $total = $subTotal - $discount;
                return response(['status' => 'success', 'cart_total' => $total, 'discount' => $discount]);
            }
        }else {
            $total = getCartTotal();
            return response(['status' => 'success', 'cart_total' => $total, 'discount' => 0]);
        }
    }

}
