<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/',[HomeController::class, 'index'])->name('home');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/user/store',[AuthController::class,'store'])->name('register.store');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');


Route::middleware('auth:user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('deals',[DealController::class, 'index'])->name('deals');
    Route::post('deal/store',[DealController::class, 'store'])->name('deal.store');

    Route::get('profile',[ProfileController::class, 'index'])->name('profile');
    Route::post('profile/account/update',[ProfileController::class, 'updateAccount'])->name('account.update');
    Route::post('profile/update-password',[ProfileController::class, 'updatePassword'])->name('account.password');
});
