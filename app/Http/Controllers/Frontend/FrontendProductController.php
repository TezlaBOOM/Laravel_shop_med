<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function index(string $slug)
    {
        return view('frontend.pages.product-detail');
    }
}
