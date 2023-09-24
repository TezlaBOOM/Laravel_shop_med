<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CustomerCreditSetting;
use Illuminate\Http\Request;

class CustomerCreditSettingController extends Controller
{
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'integer'],
            
        ]);

        CustomerCreditSetting::updateOrCreate(
            ['id' => $id],
            [
                'status' => $request->status,
            ]
        );

        toastr('Zaktualizowano', 'success', 'Success');
        return redirect()->back();
    }
}
