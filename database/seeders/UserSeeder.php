<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("users")->insert([
            [
                'name' =>'Admin user',
                'username' => 'admin',
                'email'=>'admin@tezla.pl',
                'nip'=>'1111111111',
                'role' => 'admin',
                'status' => 'active',
                'password' => bcrypt('123456789')
            ],
            [
                'name' =>'Vendor user',
                'username' => 'vendor',
                'email'=>'vendor@tezla.pl',
                'nip'=>'2222222222',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('123456789')
            ],
            [
                'name' =>'User user',
                'username' => 'user',
                'email'=>'user@tezla.pl',
                'nip'=>'3333333333',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('123456789')
            ],

        ]);
    }
}
