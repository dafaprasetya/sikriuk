<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\EditUserController;
use App\Http\Controllers\TokenController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/tokenaction', [TokenController::class, 'index'])->name('gettoken');
Route::post('/gettoken', [TokenController::class, 'checkToken'])->name('checktoken');
Route::middleware(['auth', 'role:admin,user'])->group(function () {
    Route::get('/admin/profile', [AdminController::class, 'userProfile'])->name('userprofile');

    Route::post('/admin/profile/{id}', [EditUserController::class, 'editUser'])->name('postProfile');
    Route::post('/admin/profile/{id}/password', [EditUserController::class, 'editPassword'])->name('editPassword');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::post('/admin/about/{id}', [AdminController::class, 'editAbout'])->name('editAbout');
    Route::post('/admin/about/{id}/mnp', [AdminController::class, 'delPhonenMail'])->name('delPhonenMail');
    Route::get('/admin/about', [AdminController::class, 'index'])->name('about');

    Route::get('/admin/promo', [AdminController::class, 'promo'])->name('promo');
    Route::post('/admin/promo/create', [AdminController::class, 'createPromo'])->name('createPromo');
    Route::post('/admin/promo/delete/{id}', [AdminController::class, 'deletePromo'])->name('deletePromo');
    
    Route::get('/admin/menu', [AdminController::class, 'menu'])->name('menu');
    Route::post('/admin/menu/create', [AdminController::class, 'createMenu'])->name('createMenu');
    Route::post('/admin/menu/kategori/create', [AdminController::class, 'createKategori'])->name('createKategori');

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
