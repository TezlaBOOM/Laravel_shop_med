<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->product_id);
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
        $cartData['qty'] = $product->qty;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product ->thumb_image;
        $cartData['options']['slug'] = $product ->slug;
        //dd($cartData);
        Cart::add($cartData);
        return response(['status'=> 'success','message'=>'Dodano produkt do koszyka']);
    }

    //show cart page
    public function CartDetails()
    {
        $cartItems = Cart::content();

        if(count($cartItems)===0)
        {   
            toastr('Koszy jest pusty','warning','Uwaga!');
            return redirect()->route('home');
        }
      
        return view('frontend.pages.cart-detail',compact('cartItems'));
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
}
