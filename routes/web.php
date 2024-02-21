<?php

use App\Http\Controllers\CustomAuthController;
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
    return view('login');
});
Route::get('login',[CustomAuthController::class,'login']);
Route::post('login-user',[CustomAuthController::class,'loginUser'])->name('login-user');

Route::get('registration',[CustomAuthController::class,'registration']);
Route::post('register-user',[CustomAuthController::class,'register'])->name('register-user');

Route::get('dashboard',[CustomAuthController::class,'dashboard']);

Route::get('loginsample',[CustomAuthController::class,'sampleLogin']);
