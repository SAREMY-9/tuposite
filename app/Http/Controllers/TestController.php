<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    //
    public function showTest()
    {

         $test= Test::all();
         return view('test.test',compact('test'));

    }
}
