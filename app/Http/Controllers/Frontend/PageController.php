<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\EmailConfiguration;
use App\Models\TermsAndCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use App\Models\Category;
use App\Models\HistoryPrice;
use App\Models\Product;

class PageController extends Controller
{
    public function about()
    {
        $about = About::first();
        return view('frontend.pages.about', compact('about'));
    }
    public function termsAndCondition()
    {
        $terms = TermsAndCondition::first();
        return view('frontend.pages.terms-and-condition', compact('terms'));
    }
    public function contact()
    {
        return view('frontend.pages.contact');
    }
    public function handleContactForm(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'email' => ['required', 'email'],
            'subject' => ['required', 'max:200'],
            'message' => ['required', 'max:1000']
        ]);

        $setting = EmailConfiguration::first();

        Mail::to($setting->email)->send(new contact($request->subject, $request->message, $request->email));

        return response(['status' => 'success', 'message' => 'Mail został wysłany']);

    }
    public function pricelist()
    {
        $products = Product::where(['status' => 1, 'is_approved' => 1])->orderBy('id', 'DESC')->get();
        $categories = Category::where(['status' => 1])->get();
        return view('frontend.pages.pricelist', compact('products','categories'));
    }
}
