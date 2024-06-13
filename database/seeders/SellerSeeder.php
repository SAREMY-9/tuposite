<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Sellers;
class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
   for($i=0;$i<10;$i++){
        Sellers::create([
            'name'=>'Airtrendy' .($i+1),
            'username'=>'atw'. ($i+1),
            'email'=>'atw@gmail.com'.($i+1),
            'password'=>Hash::make('12345'),
            'address'=>'San Francisco'.($i+1),
            'phone'=>'0706601739'.($i+1)
        ]);
      }
    }
}
