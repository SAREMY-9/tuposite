<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Admins;

class AdminSeeder extends Seeder
{
    /** 
     * Run the database seeds.
     */   
    public function run()
    {
        //
        //DB::table('admins')->delete();

        for($i=0;$i<10;$i++){

        Admins::create([
            'name'=>'Admin'.($i+1),
            'username'=>'admin' .($i+1),
            'email'=>'admin@gmail.com'.($i+1),
            'password'=>Hash::make('12345678')
        ]);
        
    }

    }
}




