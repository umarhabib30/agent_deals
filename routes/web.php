<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDealController;
use App\Http\Controllers\Admin\AdminUserController;
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
Route::get('terms',function(){ return view('frontend.terms'); })->name('terms');
Route::get('privacy',function(){ return view('frontend.privacy'); })->name('privacy');

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/authenticate',[AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/user/store',[AuthController::class,'store'])->name('register.store');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');


Route::middleware('auth:user')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('deals',[DealController::class, 'index'])->name('deals');
    Route::post('deal/store',[DealController::class, 'store'])->name('deal.store');
    Route::get('deal/details/{id}',[DealController::class, 'details'])->name('deal.details');

    Route::get('profile',[ProfileController::class, 'index'])->name('profile');
    Route::post('profile/account/update',[ProfileController::class, 'updateAccount'])->name('account.update');
    Route::post('profile/update-password',[ProfileController::class, 'updatePassword'])->name('account.password');
});


Route::get('admin/login',[AdminAuthController::class, 'login'])->name('admin.login');
Route::post('admin/authenticate',[AdminAuthController::class, 'authenticate'])->name('admin.authenticate');
Route::get('admin/logout',[AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function(){
    Route::get('admin/dashboard',[AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('admin/deals',[AdminDealController::class, 'index'])->name('admin.deals');
    Route::get('admin/deal/details/{id}',[AdminDealController::class, 'details'])->name('admin.deal.details');
    Route::get('admin/deal/edit/{id}',[AdminDealController::class, 'edit'])->name('admin.deal.edit');
    Route::post('admin/deal/update',[AdminDealController::class, 'update'])->name('admin.deal.update');

    Route::get('admin/users',[AdminUserController::class, 'index'])->name('admin.users');
    Route::get('admin/user/edit/{id}',[AdminUserController::class, 'edit'])->name('admin.user.edit');
    Route::post('admin/user/update',[AdminUserController::class, 'update'])->name('admin.user.update');
    Route::post('admin/user/password/update',[AdminUserController::class, 'updatePassword'])->name('admin.user.password');
    Route::get('admin/user/delete/{id}',[AdminUserController::class, 'delete'])->name('admin.user.delete');
});
