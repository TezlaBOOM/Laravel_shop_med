<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backorder;
use App\Models\ShippingRule;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckOutController extends Controller
{
    public function index()
    {
        $addresses = UserAddress::where('id_user', Auth::user()->id)->get();
        $shippingMethods = ShippingRule::where('status', 1)->get();
        $backorders= Backorder::all();
        return view('frontend.pages.checkout', compact('addresses', 'shippingMethods','backorders'));
    }

    public function createAddress(Request $request)
    {
        $request->validate([
            'type'=>['required','integer'],
            'name'=>['required', 'max:200'],
            'phone'=>['required', 'max:12'],
            'nip'=>['required', 'max:10'],
            'street'=>['required', 'max:200'],
            'zipCode'=>['required', 'max:10'],
            'city'=>['required', 'max:200'],
            'country'=>['required'],
        ]);
        $address = new UserAddress();
        $address->id_user = Auth::user()->id;
        $address->type = $request->type;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->nip = $request->nip;
        $address->street = $request->street;
        $address->zipCode = $request->zipCode;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->save();

        toastr('Dodano adres!', 'success', 'Success');

        return redirect()->back();

    }

    public function checkOutFormSubmit(Request $request)
    {
       $request->validate([
        'shipping_method_id' => ['required', 'integer'],
        'shipping_address_id' => ['required', 'integer'],
       ]);

       $shippingMethod = ShippingRule::findOrFail($request->shipping_method_id);
       if($shippingMethod){
           Session::put('shipping_method', [
                'id' => $shippingMethod->id,
                'name' => $shippingMethod->name,
                'type' => $shippingMethod->type,
                'cost' => $shippingMethod->cost
           ]);
       }
       $address = UserAddress::findOrFail($request->shipping_address_id)->toArray();
       if($address){
           Session::put('address', $address);
       }

       return response(['status' => 'success', 'redirect_url' => route('user.payment')]);
    }
}
