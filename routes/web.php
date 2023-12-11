<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiseasController;
use App\Http\Controllers\UsertypeController;
use App\Http\Controllers\CategorylaboController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\ReceptionistController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/recep',[ReceptionistController::class, 'index'])->name('recep.index');
Route::get('/recep/create',[ReceptionistController::class, 'create'])->name('recep.create');
Route::resource('/category-labo',CategorylaboController::class);
// usermanagement
Route::get('/usertype',[UsertypeController::class,'index'])->name('usermanagement.usertype.index');
Route::post('/usertype/store',[UsertypeController::class,'store'])->name('usermanagement.usertype.store');
Route::put('/usertype/update/{id}',[UsertypeController::class, 'update'])->name('usermanagement.usertype.updates');
Route::get('/usertype/delete/{id}',[UsertypeController::class, 'destroy'])->name('usermanagement.usertype.destroy');
Route::get('/user',[UserController::class,'index'])->name('usermanagement.user.index');
Route::post('/user',[UserController::class,'store'])->name('usermanagement.user.stores');
Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('usermanagement.user.edit');
Route::put('/user/update/{id}',[UserController::class,'update'])->name('usermanagement.user.update');
Route::get('/user/delete/{id}',[UserController::class,'destroy'])->name('usermanagement.user.destroy');
//Diseas
Route::get('/diseas',[DiseasController::class,'index'])->name('diseas.index');
Route::post('/diseas',[DiseasController::class,'store'])->name('diseas.store');
Route::put('/diseas/update/{id}',[DiseasController::class,'update'])->name('diseas.update');
Route::get('/diseas/delete/{id}',[DiseasController::class,'destroy'])->name('diseas.destroy');
//Recep Route
Route::resource('/recep',ReceptionistController::class);
//Nurse Route
Route::resource('/nurse',NurseController::class);
//Doctor Route
Route::resource('/doctor',DoctorController::class);
