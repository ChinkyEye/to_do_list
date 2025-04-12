<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers\User')->prefix('home')->name('user.')->middleware(['user'])->group(function(){
    Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index'])->name('home');
    Route::resource('address', AddressController::class );
    Route::resource('student', StudentController::class );
    Route::resource('staff', StaffController::class );
});