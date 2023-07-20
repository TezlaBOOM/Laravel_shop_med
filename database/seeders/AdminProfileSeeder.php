<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email','admin@tezla.pl')->first();

        $vendor= new Vendor();
        $vendor->banner = 'uploads/123.jpg';
        $vendor->phone = '123123123';
        $vendor->email = 'admin@tezla.pl';
        $vendor->nip = '1234567890';
        $vendor->address = 'pl';
        $vendor->description = 'vendor';
        $vendor->user_id = $user->id;
        $vendor->save();

    }
}
