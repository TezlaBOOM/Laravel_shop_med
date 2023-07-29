<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorShopProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email','vendor@tezla.pl')->first();

        $vendor= new Vendor();
        $vendor->banner = 'uploads/123.jpg';
        $vendor->shop_name = 'sklep testowy';
        $vendor->phone = '123123123';
        $vendor->email = 'vendor@tezla.pl';
        $vendor->nip = '1234567890';
        $vendor->address = 'pl';
        $vendor->description = 'vendor';
        $vendor->user_id = $user->id;
        $vendor->save();

    }
}
