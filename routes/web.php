<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiseasController;
use App\Http\Controllers\PataintController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UsertypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmployeegroupController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LaboratoryController;
use App\Http\Controllers\ProductcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UnitController;
use App\Models\Diseas;
use App\Models\Product;
use App\Models\User;

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
    $diseases = Diseas::all();
    $products = Product::where('status', 1)->get();
    $doctors = User::with('usertype')->where('user_type_id', 1)->get();
    return view('frontend.home.index', compact('diseases', 'doctors', 'products'));
});
//Frontent
Route::get('frontend', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('front/home', [FrontendController::class, 'home'])->name('frontend.home');
Route::get('front/about-us', [FrontendController::class, 'aboutus'])->name('frontend.about-us');
Route::get('front/doctor', [FrontendController::class, 'doctor'])->name('frontend.doctor');
Route::get('front/blog', [FrontendController::class, 'blog'])->name('frontend.blog');
Route::get('front/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::post('/front/contact',[FrontendController::class,'contactStore'])->name('frontend.add_contact');
Route::get('front/product', [FrontendController::class, 'product'])->name('frontend.product');
Route::get('login', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all_permission', 'AllRole')->name('role.index');
        Route::get('/add_permission', 'AddRole')->name('add_role');
        Route::post('/store_permission', 'StoreRole')->name('store_role');
        Route::get('/edit_role/{id}', 'EditRole')->name('edit_role');
        Route::put('/update_role/{id}', 'UpdateRole')->name('update_role');
        Route::delete('/delete/{id}','DestroyRole')->name('destroy_role');
    });
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::resource('/laboratory', LaboratoryController::class);
    // usermanagement
    Route::get('/usertype', [UsertypeController::class, 'index'])->name('usermanagement.usertype.index');
    Route::post('/usertype/store', [UsertypeController::class, 'store'])->name('usermanagement.usertype.store');
    Route::put('/usertype/update/{id}', [UsertypeController::class, 'update'])->name('usermanagement.usertype.updates');
    Route::delete('/usertype/delete/{id}', [UsertypeController::class, 'destroy'])->name('usermanagement.usertype.destroy');
    Route::get('/user', [UserController::class, 'index'])->name('usermanagement.user.index');
    Route::post('/user', [UserController::class, 'store'])->name('usermanagement.user.stores');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('usermanagement.user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('usermanagement.user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('usermanagement.user.destroy');
    //Diseas
    Route::get('/diseas', [DiseasController::class, 'index'])->name('diseas.index');
    Route::post('/diseas', [DiseasController::class, 'store'])->name('diseas.store');
    Route::put('/diseas/update/{id}', [DiseasController::class, 'update'])->name('diseas.update');
    Route::delete('/diseas/delete/{id}', [DiseasController::class, 'destroy'])->name('diseas.destroy');
    //Recep Route
    //Pataint Route
    Route::resource('pataint', PataintController::class);
    //Appointment Route
    Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');
    Route::get('/appointment/create', [AppointmentController::class, 'create'])->name('appointment.create');
    Route::post('/appointment', [AppointmentController::class, 'store'])->name('appointment.store');
    Route::get('/appointment/edit/{id}', [AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::put('/appointment/update/{id}', [AppointmentController::class, 'update'])->name('appointment.update');
    Route::delete('/appointment/delete/{id}', [AppointmentController::class, 'destroy'])->name('appointment.destroy');
    //Employee_Group Route
    Route::resource('emp_group', EmployeegroupController::class);
    Route::post('/update-emp_group/{id}', [EmployeegroupController::class, 'updateStatus'])->name('emp.update');
    //Employee Route
    Route::resource('employee', EmployeeController::class);
    Route::post('/update-emp/{id}', [EmployeeController::class, 'updateStatus'])->name('emp.update');
    //Unit Route
    Route::resource('/unit', UnitController::class);
    //Category Product Route
    Route::resource('/categories', ProductcategoryController::class);
    //Product Route
    Route::resource('/product', ProductController::class);
    Route::post('/update-status/{id}', [ProductController::class, 'updateStatus'])->name('products.update');
    //Test Route
    // Route::resource('staff', StaffController::class);
    //Contact
    Route::get('contact',[ContactController::class,'index'])->name('contact.index');
});
