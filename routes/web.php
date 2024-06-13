<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




//Route::get('/pageslayout',[HomeController::class,'pageslayout']);

//Route::view('/pageslayout','admin.layout.pageslayout');

//Route::view('/layouttest','layouttest');

Route::view('/example-page','example-page');
Route::view('/example-auth','example-auth');


//Route::view('/test','test.test');
Route::get('/test',[TestController::class,'showTest']);







