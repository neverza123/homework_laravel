<?php

use App\Http\Controllers\JohnController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('add_product', [JohnController::class,'AddProduct'] );
Route::put('edit_stock/{id}', [JohnController::class,'EditStock'] );
Route::delete('delete_stock/{id}', [JohnController::class,'DeleteStock'] );
Route::get('list_stock', [JohnController::class,'ListStock'] );
Route::get('show_stock/{id}', [JohnController::class, 'ShowStock'] );
Route::post('datatable_stock', [JohnController::class, 'DataTableStock']);



//JohnController::class,'AddProduct'] );
