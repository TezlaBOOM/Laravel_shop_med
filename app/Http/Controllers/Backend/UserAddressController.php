<?php

namespace App\Http\Controllers\backend;

use App\DataTables\UseraddressDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UseraddressDataTable $dataTable,Request $request )
    {
        $addresses = User::findOrFail($request->id);
       
        return $dataTable->render('admin.customerList.address.index', compact('addresses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $addresses = User::findOrFail($request->id);
        return view('admin.customerList.address.create',compact('addresses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'type'=>['required','integer'],
            'name'=>['required', 'max:200'],
            'phone'=>['required', 'max:12'],
            'nip'=>['required', 'max:10'],
            'streat'=>['required', 'max:200'],
            'zipCode'=>['required', 'max:10'],
            'city'=>['required', 'max:200'],
            'country'=>['required'],
        ]);
        $address = new UserAddress();
        $address->id_user = $request->id;
        // $address->type = $request->type;
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->nip = $request->nip;
        $address->street = $request->streat;
        $address->zipCode = $request->zipCode;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->save();

        toastr('Dodano adres', 'success','success');

        $addresses = User::findOrFail($address->id_user);
       
      
        return redirect()->route('admin.customer.address.index',
        ['id' => $addresses->id]);

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
        $address = UserAddress::findOrFail($id);
       
        
        return view('admin.customerList.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // 'type'=>['required','integer'],
            'name'=>['required', 'max:200'],
            'phone'=>['required', 'max:12'],
            'nip'=>['required', 'max:10'],
            'streat'=>['required', 'max:200'],
            'zipCode'=>['required', 'max:10'],
            'city'=>['required', 'max:200'],
            'country'=>['required'],
        ]);
        $address = UserAddress::findOrFail($id);
        $address->name = $request->name;
        $address->phone = $request->phone;
        $address->nip = $request->nip;
        $address->street = $request->streat;
        $address->zipCode = $request->zipCode;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->save();

        toastr('zaktualizowano adres', 'success','success');

        $addresses = User::findOrFail($address->id_user);
       
      
        return redirect()->route('admin.customer.address.index',
        ['id' => $addresses->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $address = UserAddress::findOrFail($id);
        $address ->delete();

        return response(['status' =>'success','message'=>'Usunięto!']);

    }
}
