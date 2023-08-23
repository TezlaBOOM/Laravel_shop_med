<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use Illuminate\Http\Request;

class PayPalSettingController extends Controller
{

    public function update(Request $request, string $id)
    {
        $request->validate([
            'status'=>['required','integer'],
            'mode'=>['required','integer'],
            'country_name'=>['required','max:200'],
            'currency_name'=>['required','max:200'],
            'currency_rate'=>['required'],
            'client_id'=>['required'],
            'secret_key'=>['required'],
        ]);

        PaypalSetting::updateOrCreate(
            ['id' => $id],
            [
                'status'=>$request->status,
                'mode'=>$request->mode,
                'currency_name'=>$request->currency_name,
                'currency_rate'=>$request->currency_rate,
                'country_name'=>$request->country_name,
                'client_id'=>$request->client_id,
                'secret_key'=>$request->secret_key,
            ]);

            toastr('Zaktualizowano', 'Success', 'Success');
            return redirect()->back();






    }

}
