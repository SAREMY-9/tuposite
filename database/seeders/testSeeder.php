<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Test;

class testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        for($i=0;$i<=10;$i++)
        {

       Test::create([

      'tdbNo'=>'W1d9vh'.($i+1),
      'officerId'=>'Hd3vh'.($i+1),
      'theoryTest'=>'Passed',
      'pracTest'=>'Passed',


       ]);


        }


    }
}
