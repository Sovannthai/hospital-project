<?php

use App\Http\Controllers\AppController\ProductController;
use App\Http\Controllers\AppController\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| API Routes

|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('products',[ProductsController::class,'list']);
Route::post('products',[ProductsController::class,'upload']);
Route::put('products/edit/{id}',[ProductsController::class,'change']);
Route::delete('products/delete/{id}',[ProductsController::class,'deleted']);
