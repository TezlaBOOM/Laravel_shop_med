<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\VendorProductReviewsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorProductReviewController extends Controller
{
    public function index(VendorProductReviewsDataTable $dataTable)
    {
        return $dataTable->render('vendor.review.index');
    }
}
