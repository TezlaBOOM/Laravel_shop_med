<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductPolicy;
use Illuminate\Http\Request;

class ProductPolicyController extends Controller
{
    public function index()
    {
        
        $policybox1 = ProductPolicy::where('id', 1)->first();
        
        $policybox2 = ProductPolicy::where('id', 2)->first();
        
        $policybox3  = ProductPolicy::where('id', 3)->first();
       
        return view('admin.product-policy.index', compact('policybox1','policybox2','policybox3'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title1' => ['required', 'max:100'],
            'content1' => ['required'],
            'title2' => ['required', 'max:100'],
            'content2' => ['required'],
            'title3' => ['required', 'max:100'],
            'content3' => ['required'],
        ]);

        ProductPolicy::updateOrCreate(
            ['id' => 1],
            [
                'title' => $request->title1,
                'content' => $request->content1
            ]
        );
        ProductPolicy::updateOrCreate(
            ['id' => 2],
            [
                'title' => $request->title2,
                'content' => $request->content2
            ]
        );
        ProductPolicy::updateOrCreate(
            ['id' => 3],
            [
                'title' => $request->title3,
                'content' => $request->content3
            ]
        );

        toastr('updated successfully!', 'success', 'success');

        return redirect()->back();
    }
}
