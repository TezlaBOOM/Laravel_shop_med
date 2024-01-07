<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backorder;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistProducts = Wishlist::with('product')->where('user_id', Auth::user()->id)->orderBy('id','DESC')->get();
        $backorders= Backorder::all();
        $product = Product::all();
        return view('frontend.pages.wishlist',compact('wishlistProducts','backorders','product'));
    }
    public function addToWishList(Request $request)
    {
        if(!Auth::check()){
            return response(['status' => 'error', 'message' => 'Musisz być zalogowany aby dodać produkt do listy życzeń']);
        }

        $wishlistCount = Wishlist::where(['product_id' => $request->id, 'user_id' => Auth::user()->id])->count();
        if($wishlistCount > 0){
            return response(['status' => 'error', 'message' => 'Produkt jest już w listcie życzeń']);
        }

        $wishlist = new Wishlist();
        $wishlist->product_id = $request->id;
        $wishlist->user_id = Auth::user()->id;
        $wishlist->save();

        $count = Wishlist::where('user_id', Auth::user()->id)->count();

        return response(['status' => 'success', 'message' => 'Produkt zsotał dodany do listy życzeń', 'count' => $count]);
    }
    public function destory(string $id)
    {

        $wishlistProducts = Wishlist::where('id', $id)->firstOrFail();
        if($wishlistProducts->user_id !== Auth::user()->id){
            return redirect()->back();
        }
        $wishlistProducts->delete();

        toastr('Produkt usunięto', 'success', 'success');

        return redirect()->back();

    }
}