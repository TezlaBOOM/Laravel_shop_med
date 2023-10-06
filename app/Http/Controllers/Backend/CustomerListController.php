<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\CustomerListDataTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

class CustomerListController extends Controller
{
    use ImageUploadTrait;
    
    public function index(CustomerListDataTable $dataTable)
    {
        return $dataTable->render('admin.customerList.index');
    }

    public function changeStatus(Request $request)
    {
        $customer = User::findOrFail($request->id);
        $customer->status = $request->status == 'true' ? 'active' : 'inavtive';
        $customer->save();

        return response(['message' => 'Zmieniono']);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.customerList.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' =>['required','max:150'],
            'username' =>['required','max:150'],
            'email' =>['required','email'],
            'nip' =>['required','max:10'],
            'phone' =>['required','max:9'], 
            'image' =>['max:2048'],
        ]);


        $user = User::findOrFail($id);

        if($request->hasFile('image'))
        {
            if(File::exists(public_path($user->image)))
            {
                File::delete(public_path($user->image));
            }
            $image=$request->image;
            $imageName=rand().'_'.$image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            $path='/uploads/'.$imageName;

            $user->image=$path;
        }
        
        
        $user ->name = $request->name;
        $user ->username = $request->username;
        $user ->email = $request->email;
        $user ->nip = $request->nip;
        $user ->role = $request->role;
        $user ->phone = $request->phone;
        $user ->status = $request->status;
        $user ->save();

        toastr()->success('Profil zaktualizowano');
        return redirect()->back();
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $childCategory = User::findOrFail($id);

       
        $childCategory->delete();

        return response(['status' => 'success', 'message' =>'Usunięto']);
    }
    public function updatePassword(Request $request)
    {
        
        $request->validate([
            'current_password'=>['required','current_password'],
            'password'=>['required','string','confirmed','min:8']
        ]);

        $request->user()->update([
            'password'=>bcrypt($request->password)
        ]);

        toastr()->success('Profile password successfully');
        return redirect()->back();
    }

}
