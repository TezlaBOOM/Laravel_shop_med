<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FlashSale;
use App\Models\FlashSaleItem;
use App\Models\HomePageSettings;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('status', 'asc')->get();
        $flashSaleDate= FlashSale::first();
        $flashSaleItems = FlashSaleItem::where('show_at_home',1)->where('status', 1)->get();
        $popularCategory = HomePageSettings::where('key', 'popular_category_section')->first();
        return view('frontend.home.home',
    compact(
        'sliders',
        'flashSaleDate',
        'flashSaleItems',
        'popularCategory'
    ));
    }
}
