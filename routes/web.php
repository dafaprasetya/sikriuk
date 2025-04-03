<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\EditUserController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\SuperAdminController;
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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/kemitraan', [Maincontroller::class,'kemitraan'])->name('kemitraan');
Route::get('/blog/{slug}', [Maincontroller::class, 'blogDetail'])->name('blogDetail');
Route::get('/profil', [Maincontroller::class, 'profile'])->name('profile');
Route::get('/menu', [Maincontroller::class, 'menu'])->name('menumain');
Route::get('/blog', [Maincontroller::class, 'blog'])->name('blogmain');

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
    Route::post('/admin/menu/{id}/delete', [AdminController::class, 'deleteMenu'])->name('deleteMenu');
    Route::post('/admin/menu/kategori/{id}/delete', [AdminController::class, 'deleteKategori'])->name('deleteKategori');
    Route::post('/admin/menu/kategori/create', [AdminController::class, 'createKategori'])->name('createKategori');
    Route::post('/admin/menu/{id}/update', [AdminController::class, 'updateMenu'])->name('updateMenu');

    Route::get('/admin/pencapaian', [AdminController::class, 'pencapaian'])->name('pencapaian');
    Route::post('/admin/pencapaian/create', [AdminController::class, 'createPencapaian'])->name('createPencapaian');
    Route::post('/admin/pencapaian/{id}/delete', [AdminController::class, 'deletePencapaian'])->name('deletePencapaian');
    Route::post('/admin/pencapaian/{id}/update', [AdminController::class, 'updatePencapaian'])->name('updatePencapaian');

    Route::get('/admin/calonmitra', [AdminController::class, 'calonMitra'])->name('calonMitra');
    Route::get('/admin/calonmitra/{id}', [AdminController::class, 'detailCalonMitra'])->name('detailCalonMitra');
    Route::post('/admin/calonmitra/{id}/chat', [AdminController::class, 'editCalonMitra'])->name('editCalonMitra');
    Route::post('/admin/calonmitra/{id}/chat/delete', [AdminController::class, 'deleteCalonMitra'])->name('deleteCalonMitra');

    Route::get('/admin/gerobak',[AdminController::class, 'gerobak'])->name('gerobak');
    Route::post('/admin/gerobak/create',[AdminController::class, 'createGerobak'])->name('createGerobak');
    Route::post('/admin/gerobak/create/benefit',[AdminController::class, 'createBenefitGerobak'])->name('createBenefitGerobak');
    Route::post('/admin/gerobak/{id}/edit',[AdminController::class, 'editGerobak'])->name('editGerobak');
    Route::post('/admin/gerobak/{id}/delete',[AdminController::class, 'deleteGerobak'])->name('deleteGerobak');
    Route::post('/admin/gerobak/{id}/delete/benefit',[AdminController::class, 'deleteBenefit'])->name('deleteBenefit');

    Route::get('/admin/stepmitra',[AdminController::class, 'stepByStep'])->name('stepByStep');
    Route::post('/admin/stepmitra/create',[AdminController::class, 'createStepByStep'])->name('createStepByStep');
    Route::post('/admin/stepmitra/{id}/edit',[AdminController::class, 'editStepByStep'])->name('editStepByStep');
    Route::post('/admin/stepmitra/{id}/delete',[AdminController::class, 'deleteStepByStep'])->name('deleteStepByStep');

    Route::get('/admin/testimoni',[AdminController::class, 'testimoni'])->name('testimoni');
    Route::post('/admin/testimoni/create',[AdminController::class, 'createTestimoni'])->name('createTestimoni');
    Route::post('/admin/testimoni/{id}/edit',[AdminController::class, 'editTestimoni'])->name('editTestimoni');
    Route::post('/admin/testimoni/{id}/delete',[AdminController::class, 'deleteTestimoni'])->name('deleteTestimoni');

    Route::get('/admin/keunggulan',[AdminController::class, 'keunggulan'])->name('keunggulan');
    Route::post('/admin/keunggulan/create',[AdminController::class, 'createKeunggulan'])->name('createKeunggulan');
    Route::post('/admin/keunggulan/{id}/edit',[AdminController::class, 'editKeunggulan'])->name('editKeunggulan');
    Route::post('/admin/keunggulan/{id}/delete',[AdminController::class, 'deleteKeunggulan'])->name('deleteKeunggulan');

    Route::get('/admin/syarat',[AdminController::class, 'syarat'])->name('syarat');
    Route::post('/admin/syarat/create',[AdminController::class, 'createSyarat'])->name('createSyarat');
    Route::post('/admin/syarat/{id}/edit',[AdminController::class, 'editSyarat'])->name('editSyarat');
    Route::post('/admin/syarat/{id}/delete',[AdminController::class, 'deleteSyarat'])->name('deleteSyarat');

    Route::get('/admin/faq',[AdminController::class, 'faq'])->name('faq');
    Route::post('/admin/faq/create',[AdminController::class, 'createFaq'])->name('createFaq');
    Route::post('/admin/faq/{id}/edit',[AdminController::class, 'editFaq'])->name('editFaq');
    Route::post('/admin/faq/{id}/delete',[AdminController::class, 'deleteFaq'])->name('deleteFaq');

    Route::get('/admin/blog',[AdminController::class, 'blog'])->name('blog');
    Route::post('/admin/blog/create',[AdminController::class, 'createBlog'])->name('createBlog');
    Route::post('/admin/blog/{id}/edit',[AdminController::class, 'editBlog'])->name('editBlog');
    Route::post('/admin/blog/{id}/delete',[AdminController::class, 'deleteBlog'])->name('deleteBlog');

    Route::get('/admin/lokasi',[AdminController::class, 'lokasi'])->name('lokasi');
    Route::post('/admin/lokasi/create',[AdminController::class, 'createLokasi'])->name('createLokasi');
    Route::post('/admin/lokasi/{id}/edit',[AdminController::class, 'editLokasi'])->name('editLokasi');
    Route::post('/admin/lokasi/{id}/delete',[AdminController::class, 'deleteLokasi'])->name('deleteLokasi');

    Route::get('/admin/proposal',[AdminController::class, 'proposal'])->name('proposal');
    Route::post('/admin/Proposal/create',[AdminController::class, 'createProposal'])->name('createProposal');
    Route::post('/admin/Proposal/{id}/delete',[AdminController::class, 'deleteProposal'])->name('deleteProposal');

    Route::get('/admin/user/list',[SuperAdminController::class, 'listuser'])->name('listuser');
    Route::post('/admin/user/{id}/delete',[SuperAdminController::class, 'deleteUser'])->name('deleteUser');
    Route::post('/admin/user/{id}/edit',[SuperAdminController::class, 'editUser'])->name('editUser');

    Route::get('/admin/security',[SuperAdminController::class, 'tokenAction'])->name('security');
    Route::get('/admin/security/token',[SuperAdminController::class, 'tokenAction'])->name('token');
    Route::post('/admin/security/token/edit',[SuperAdminController::class, 'editToken'])->name('editToken');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dummycalonmitra', [MainController::class,'dummyCalonMitra'])->name('dummyCalonMitra');

Route::post('/send/calonmitra', [MainController::class,'sendCalonMitra'])->name('sendCalonMitra');
