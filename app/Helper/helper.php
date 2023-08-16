<?php


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
    return $discountProcent;
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
function getCartTotal()
{
    $total = 0;

    foreach (\Cart::content() as $product){
        $total+=($product->price+$product->options->variants_total)*($product->qty);
    }
    return $total;
}
