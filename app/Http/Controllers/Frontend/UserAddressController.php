<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = UserAddress::where('id_user', Auth::user()->id)->get();
        return view('frontend.dashboard.address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.dashboard.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'type'=>['required','integer'],
            'name'=>['required', 'max:200'],
            'phone'=>['required', 'max:12'],
            'nip'=>['required', 'max:10'],
            'streat'=>['required', 'max:200'],
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
        $address->street = $request->streat;
        $address->zipCode = $request->zipCode;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->save();

        toastr('Dodano adres', 'success','success');

        return redirect()->route('user.address.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
