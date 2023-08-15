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
        $cartData['options']['variantTotalAmount'] = $variantTotalAmount;
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
      
        return view('frontend.pages.cart-detail',compact('cartItems'));
    }

    public function updateProductQty(Request $request)
    {
        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status'=>'success','message'=>'zmieniono ilość','productTotal'=>$productTotal]);
    }
    public function getProductTotal($rowId)
    {
        $product = Cart::get($rowId);
       
        $total = ($product->price+$product->options->variantTotalAmount)*($product->qty);
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
        return redirect()->back();
    }
    public function getCartCount()
    {
        return Cart::content()->count();
    }
}
