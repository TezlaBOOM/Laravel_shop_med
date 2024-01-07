<?php

namespace App\Http\Controllers\Frontend;

use App\DataTables\UserOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Backorder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class UserOrderController extends Controller
{
    public function index(UserOrderDataTable $dataTable)
    {
        return $dataTable->render('frontend.dashboard.order.index');
    }

    public function show(string $id)
    {
        $order = Order::findOrFail($id);
        $backorders= Backorder::all();
        $product = Product::all();
        return view('frontend.dashboard.order.show', compact('order','backorders','product'));
    }
}
