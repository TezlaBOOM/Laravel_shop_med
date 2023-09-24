<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CodSetting;
use App\Models\CustomerCreditSetting;
use App\Models\PaypalSetting;
use App\Models\RazorpaySetting;
use App\Models\StripeSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paypalSettings = PaypalSetting::first();
        $stripeSettings = StripeSetting::first();
        $codSettings = CodSetting::first();
        $customerCreditSettings = CustomerCreditSetting::first();
       
        return view('admin.payment-settings.index',compact('paypalSettings','stripeSettings','codSettings','customerCreditSettings'));
    }

}
