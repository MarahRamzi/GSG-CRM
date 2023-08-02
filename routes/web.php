<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Models\Customer;
use App\Models\User;
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
    return view('welcome');
});

Route::resource('customers', CustomerController::class);
Route::resource('users', UserController::class);

Route::view('master','master')->name('master');

Route::get('/login' , [LoginController::class , 'create'])->name('login')->middleware('guest');
Route::post('/login' , [LoginController::class , 'store'])->name('login')->middleware('guest');

Route::get('/customers/trashed',[CustomerController::class , 'Trashed'])->name('customers.trashed');
Route::put('/customers/trashed/{customer}',[CustomerController::class , 'restore'])->name('customers.restore');
Route::delete('/customers/trashed/{customer}',[CustomerController::class , 'forceDelete'])->name('customers.force-delete');