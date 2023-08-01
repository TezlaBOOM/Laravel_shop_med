<?php

namespace App\Models;

use App\DataTables\SellerPendingProductDataTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
    public function pendingProduct(SellerPendingProductDataTable $datatable )
    {
        return $this->belongsTo(Vendor::class);
    }
}
