<?php

use App\Http\Controllers\ProfileController;
use App\Http\controllers\MaterialTypeController;
use App\Http\controllers\CustomerController;
use App\Http\controllers\VendorController;
use App\Http\controllers\EmployeeController;
use App\Http\controllers\ProcessController;
use App\Http\controllers\StyleController;
use Illuminate\Support\Facades\Route;

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
     return redirect('/login');
});

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/MaterialType/List',[MaterialTypeController::class,'index'])->middleware(['auth', 'verified']);
Route::get('/materialType/detail/',[MaterialTypeController::class,'create'])->middleware(['auth', 'verified']);
Route::post('/materialtype/save',[MaterialTypeController::class,'store'])->middleware(['auth', 'verified']);
Route::get('/materialType/detail/{id}',[MaterialTypeController::class,'show'])->middleware(['auth', 'verified']);
Route::post('/materialtype/update',[MaterialTypeController::class,'update'])->middleware(['auth', 'verified']);
Route::post('/materialtype/destroy/{id}',[MaterialTypeController::class,'destroy'])->middleware(['auth', 'verified']);

Route::get('/customer/List',[CustomerController::class,'index'])->middleware(['auth', 'verified']);
Route::get('/customer/detail/',[CustomerController::class,'create'])->middleware(['auth', 'verified']);
Route::post('/customer/save',[CustomerController::class,'store'])->middleware(['auth', 'verified']);
Route::get('/customer/detail/{id}',[CustomerController::class,'show'])->middleware(['auth', 'verified']);
Route::post('/customer/update',[CustomerController::class,'update'])->middleware(['auth', 'verified']);
Route::post('/customer/destroy/{id}',[CustomerController::class,'destroy'])->middleware(['auth', 'verified']);

Route::get('/vendor/List',[VendorController::class,'index'])->middleware(['auth', 'verified']);
Route::get('/vendor/detail/',[VendorController::class,'create'])->middleware(['auth', 'verified']);
Route::post('/vendor/save',[VendorController::class,'store'])->middleware(['auth', 'verified']);
Route::get('/vendor/detail/{id}',[VendorController::class,'show'])->middleware(['auth', 'verified']);
Route::post('/vendor/update',[VendorController::class,'update'])->middleware(['auth', 'verified']);
Route::post('/vendor/destroy/{id}',[VendorController::class,'destroy'])->middleware(['auth', 'verified']);

Route::get('/employee/List',[EmployeeController::class,'index'])->middleware(['auth', 'verified']);
Route::get('/employee/detail/',[EmployeeController::class,'create'])->middleware(['auth', 'verified']);
Route::post('/employee/save',[EmployeeController::class,'store'])->middleware(['auth', 'verified']);
Route::get('/employee/detail/{id}',[EmployeeController::class,'show'])->middleware(['auth', 'verified']);
Route::post('/employee/update',[EmployeeController::class,'update'])->middleware(['auth', 'verified']);
Route::post('/employee/destroy/{id}',[EmployeeController::class,'destroy'])->middleware(['auth', 'verified']);

Route::get('/process/List',[ProcessController::class,'index'])->middleware(['auth', 'verified']);
Route::get('/process/detail/',[ProcessController::class,'create'])->middleware(['auth', 'verified']);
Route::post('/process/save',[ProcessController::class,'store'])->middleware(['auth', 'verified']);
Route::get('/process/detail/{id}',[ProcessController::class,'show'])->middleware(['auth', 'verified']);
Route::post('/process/update',[ProcessController::class,'update'])->middleware(['auth', 'verified']);
Route::post('/process/destroy/{id}',[ProcessController::class,'destroy'])->middleware(['auth', 'verified']);

Route::get('/model/List',[StyleController::class,'index'])->middleware(['auth', 'verified']);
Route::get('/model/detail/',[StyleController::class,'create'])->middleware(['auth', 'verified']);
Route::post('/model/save',[StyleController::class,'store'])->middleware(['auth', 'verified']);
Route::get('/model/detail/{id}',[StyleController::class,'show'])->middleware(['auth', 'verified']);
Route::post('/model/update',[StyleController::class,'update'])->middleware(['auth', 'verified']);
Route::post('/model/destroy/{id}',[StyleController::class,'destroy'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
