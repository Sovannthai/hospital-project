<?php

use App\Models\Appointment;
use App\Models\Employeegroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\DiseasController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PataintController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsertypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CategorylaboController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\EmployeegroupController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\ProductcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UnitController;
use App\Models\Laboratory;
use App\Models\ProductCategory;

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

Route::get('/home', [DashboardController::class, 'index'])->name('home');
Route::get('/recep',[ReceptionistController::class, 'index'])->name('recep.index');
Route::get('/recep/create',[ReceptionistController::class, 'create'])->name('recep.create');
Route::resource('/laboratory',LaboratoryController::class);
// usermanagement
Route::get('/usertype',[UsertypeController::class,'index'])->name('usermanagement.usertype.index');
Route::post('/usertype/store',[UsertypeController::class,'store'])->name('usermanagement.usertype.store');
Route::put('/usertype/update/{id}',[UsertypeController::class, 'update'])->name('usermanagement.usertype.updates');
Route::delete('/usertype/delete/{id}',[UsertypeController::class, 'destroy'])->name('usermanagement.usertype.destroy');
Route::get('/user',[UserController::class,'index'])->name('usermanagement.user.index');
Route::post('/user',[UserController::class,'store'])->name('usermanagement.user.stores');
Route::get('/user/edit/{id}',[UserController::class,'edit'])->name('usermanagement.user.edit');
Route::put('/user/update/{id}',[UserController::class,'update'])->name('usermanagement.user.update');
Route::delete('/user/delete/{id}',[UserController::class,'destroy'])->name('usermanagement.user.destroy');
//Diseas
Route::get('/diseas',[DiseasController::class,'index'])->name('diseas.index');
Route::post('/diseas',[DiseasController::class,'store'])->name('diseas.store');
Route::put('/diseas/update/{id}',[DiseasController::class,'update'])->name('diseas.update');
Route::delete('/diseas/delete/{id}',[DiseasController::class,'destroy'])->name('diseas.destroy');
//Recep Route
Route::resource('/recep',ReceptionistController::class);
//Pataint Route
Route::resource('pataint',PataintController::class);
//Appointment Route
Route::get('/appointment',[AppointmentController::class,'index'])->name('appointment.index');
Route::get('/appointment/create',[AppointmentController::class,'create'])->name('appointment.create');
Route::post('/appointment',[AppointmentController::class,'store'])->name('appointment.store');
Route::get('/appointment/edit/{id}',[AppointmentController::class,'edit'])->name('appointment.edit');
Route::put('/appointment/update/{id}',[AppointmentController::class,'update'])->name('appointment.update');
Route::delete('/appointment/delete/{id}',[AppointmentController::class,'destroy'])->name('appointment.destroy');
//Employee_Group Route
Route::resource('emp_group',EmployeegroupController::class);
Route::post('/update-emp_group/{id}',[EmployeegroupController::class,'updateStatus'])->name('emp.update');
//Employee Route
Route::resource('employee', EmployeeController::class);
Route::post('/update-emp/{id}',[EmployeeController::class,'updateStatus'])->name('emp.update');
//Unit Route
Route::resource('/unit', UnitController::class);
//Category Product Route
Route::resource('/categories',ProductcategoryController::class);
//Product Route
Route::resource('/product',ProductController::class);
Route::post('/update-status/{id}',[ProductController::class,'updateStatus'])->name('products.update');
//Test Route
Route::resource('staff', StaffController::class);

//Frontend Route


