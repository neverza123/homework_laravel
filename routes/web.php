<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JohnController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function()
{
    echo "Sawaddekrub";
}
);


Route::get('/users',function()
{
    echo "<H1?>Sawadee KRub P' nong</H1?";
}
);
