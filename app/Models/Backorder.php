<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backorder extends Model
{
    use HasFactory;

    public function backorders()
    { 
        return $this->hasOne(Product::class);
    }
}
