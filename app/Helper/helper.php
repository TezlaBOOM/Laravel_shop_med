<?php

use Illuminate\Support\Facades\Session;


/**Set siber active */

function setActive(array $route){
    if(is_array($route)){
        foreach($route as $r){
            if(request()->routeIs($r)){
                return 'active';
            }
        }
    }
}
/**check if product have discount */
function checkDiscount($product)
{
    $currentDate = date('Y-m-d');
    if($product->offer_price > 0 && $currentDate >= $product->offer_start_date && $currentDate <= $product->offer_end_date)
    {
        return true;
    }else {
        return false;
    }
}
/**calculate diccount % */
function calculateDicCountProcent($originalPrice, $discountPrice)
{
    $discountAmount = $originalPrice - $discountPrice;
    $discountProcent =($discountAmount / $originalPrice) * 100;
    return round($discountProcent);
}
/**check product have status */
function productType($type):string
{
    switch($type){
            case 'new_arrival':
            return 'Nowość';
            break;

            case 'featured_product':
            return 'Wyróżniony';
            break;
            case 'top_product':
            return 'Top produkt';
            break;
            case 'best_product':
            return 'Bestseller';
            break;

            default:
            return '';
            break;

        }



   
}
//get total cart amount
function getCartTotal()
{
    $total = 0;

    foreach (\Cart::content() as $product){
        $total+=($product->price+$product->options->variants_total)*($product->qty);
    }
    return $total;
}
//get payable total amount
function getMainCartTotal()
{
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            $total = $subTotal - $coupon['discount'];
            return $total;
        }elseif($coupon['discount_type'] === 'percent'){
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            $total = $subTotal - $discount;
            return $total;
        }
    }else {
        return  getCartTotal();
    }
}

//get cart amount
function getCartDiscount()
{
    if(Session::has('coupon')){
        $coupon = Session::get('coupon');
        $subTotal = getCartTotal();
        if($coupon['discount_type'] === 'amount'){
            return $coupon['discount'];
        }elseif($coupon['discount_type'] === 'percent'){
            $discount = $subTotal - ($subTotal * $coupon['discount'] / 100);
            return $discount;
        }
    }else {
        return 0;
    }
}
function getShppingFee()
{
    iF(Session::has('shipping_method')){
        return Session::get('shipping_method')['cost'];
    }else{
        return 0;
    }
}
function getFinalPayableAmount(){
    return getMainCartTotal() + getShppingFee();
}
function limitText($text, $limit = 20)
{
    return \Str::limit($text, $limit);
}