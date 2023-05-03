<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\admin\AdminAboutController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\admin\AdminKotaController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\KategoriArticleController;
use App\Http\Controllers\admin\AdminSupirController;
use App\Http\Controllers\admin\AdminWisataController;
use App\Http\Controllers\admin\AdminBookingController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminKendaraanController;
use App\Http\Controllers\admin\AdminGuideController;
use App\Http\Controllers\admin\AdminTeamController;

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//client






Route::get('/privatetrip', function () {
    return view('privatetrip');
});
Route::get('/singletrip', function () {
    return view('single');
});
Route::get('/opentrip', function () {
    return view('opentrip');
});
Route::get('/pdf', function () {
    return view('pdf');
});
Route::get('/blogisi', function () {
    return view('blogisi');
});





Route::get('/step', function () {
    return view('step');
});




Route::get('/ticket', function () {
    return view('tiket');
});





Route::get('/article', [ArticleController::class, 'index_client']);
Route::get('/article/show/{slug}', [ArticleController::class, 'show_client']);


Route::get('/abouts', [AdminAboutController::class, 'index_client']);



Route::middleware('admin')->group(function(){
    Route::get('/admin', [AdminDashboardController::class, 'index']);
    Route::get('/admin/kota', [AdminKotaController::class, 'index']);
    Route::get('/admin/kota/add', [AdminKotaController::class, 'show']);
    Route::post('/admin/kota/add', [AdminKotaController::class, 'store']);
    Route::post('/admin/kota/edit/{id}', [AdminKotaController::class, 'update']);
    Route::post('/kota/delete/{id}', [AdminKotaController::class, 'destroy']);

    Route::get('/kota/kelola/{id}', [AdminKotaController::class, 'titik_jemput']);
    Route::post('/kota/kelola/add/{id}', [AdminKotaController::class, 'addPickup']);
    Route::post('/kota/kelola/edit/{id}', [AdminKotaController::class, 'editPickup']);
    Route::post('/kota/kelola/delete/{id}', [AdminKotaController::class, 'deletePickup']);

    Route::get('/admin/wisata', [AdminWisataController::class, 'index']);
    Route::get('/admin/wisata/add', [AdminWisataController::class, 'create']);
    Route::post('/admin/wisata/add', [AdminWisataController::class, 'store']);
    Route::get('/admin/wisata/edit/{id}', [AdminWisataController::class, 'edit']);
    Route::post('/admin/wisata/edit/{id}', [AdminWisataController::class, 'update']);

    Route::post('/admin/wisata/delete/{id}', [AdminWisataController::class, 'destroy']);

    Route::delete('/admin/wisata/delete/itenerary/{id}', [AdminWisataController::class, 'destroy_itenerary']);

    Route::post('/admin/wisata/jemput/add/{id}', [AdminWisataController::class, 'addJemput']);


    Route::get('/admin/wisata/faq/{slug}', [AdminWisataController::class, 'faq']);
    Route::post('/admin/wisata/faq/{slug}', [AdminWisataController::class, 'addFaq']);

    Route::delete('/admin/wisata/faq/delete/{id}', [AdminWisataController::class, 'deleteFaq']);

    Route::post('/admin/wisata/aktif/{id}', [AdminWisataController::class, 'aktif']);
    Route::post('/admin/wisata/nonaktif/{id}', [AdminWisataController::class, 'nonaktif']);


    //admin guide\
    Route::get('/guide', [AdminGuideController::class, 'index']);
    Route::post('/admin/guide/edit/{id}', [AdminGuideController::class, 'update']);
    Route::post('admin/guide/delete/{id}', [AdminGuideController::class, 'destroy']);
    Route::post('/admin/guide/add',[AdminGuideController::class, 'store']);


    //admin about
    Route::get('/team', [AdminTeamController::class, 'index']);
    Route::post('admin/team/edit/{id}', [AdminTeamController::class, 'update']);
    Route::post('admin/team/delete/{id}', [AdminTeamController::class, 'destroy']);
    Route::post('admin/team/add', [AdminTeamController::class, 'store']);






    Route::get('/user', [AdminUserController::class, 'index']);
    Route::post('/user/delete/{id}', [AdminUserController::class, 'destroy']);


    Route::get('/supir', [AdminSupirController::class, 'index']);
    Route::post('/supir/delete/{id}', [AdminSupirController::class, 'destroy']);
    Route::post('/admin/supir/edit/{id}', [AdminSupirController::class, 'update']);
    Route::post('/admin/supir/add', [AdminSupirController::class, 'store']);

    Route::get('/kendaraan', [AdminKendaraanController::class, 'index']);
    Route::get('/kendaraan/onDuty', [AdminKendaraanController::class, 'onDuty']);
    Route::post('/kendaraan/delete/{id}', [AdminKendaraanController::class, 'destroy']);
    Route::post('/kendaraan/edit/{id}', [AdminKendaraanController::class, 'update']);
    Route::post('/kendaraan/add', [AdminKendaraanController::class, 'store']);


    //booking
    Route::get('/admin/booking', [AdminBookingController::class, 'index']);
    Route::get('/admin/booking/confirmation', [AdminBookingController::class, 'confirmation']);
    Route::post('/admin/booking/confirmation/{id}', [AdminBookingController::class, 'confirm']);




  


    Route::post('/upload_image_tiny', [ArticleController::class, 'upload_image_tiny']);


    

    Route::get('/admin/article', [ArticleController::class, 'index']);
    Route::get('/article/add', [ArticleController::class, 'create']);
    Route::post('/article/add', [ArticleController::class, 'store']);

    Route::get('/article/edit/{slug}', [ArticleController::class, 'edit']);
    Route::post('/article/edit/{slug}', [ArticleController::class, 'update']);

    Route::get('/article/kategori', [KategoriArticleController::class, 'index']);
    Route::post('/article/kategori', [KategoriArticleController::class, 'store']);
    Route::post('/article/kategori/edit/{id}', [KategoriArticleController::class, 'update']);
    Route::post('/article/kategori/delete/{id}', [KategoriArticleController::class, 'destroy']);

    Route::post('/article/delete/{slug}', [ArticleController::class, 'destroy']);


    //about

    Route::get('/admin/about', [AdminAboutController::class, 'index']);
    Route::post('/admin/about/add', [AdminAboutController::class, 'store']);
    Route::post('/admin/about/update', [AdminAboutController::class, 'update']);
    
});

Route::middleware('auth')->group(function(){

Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/checkout/{slug}', [CheckoutController::class, 'show']);
Route::post('/checkout/{slug}/payment', [CheckoutController::class, 'store']);

// Route::get('/checkout/{slug}/payment', [CheckoutController::class, 'payment']);
Route::post('/checkout/callback', [CheckoutController::class, 'callback']);
Route::get('/tagihan', [CheckoutController::class, 'tagihan']);
Route::get('/booking', [CheckoutController::class, 'booking']);
Route::get('/cobadownload/{doc_no}', [CheckoutController::class, 'ticket']);
Route::post('/comment/{doc_no}', [CheckoutController::class, 'Sendtesti']);
 

//contact
Route::get('/contact', [ContactController::class, 'index']);
// Route::post('/contacts', [ContactController::class, 'Email']);
Route::post('/contacts', [ContactController::class, 'sendEmail']);
Route::get('/contacts', [ContactController::class, 'sendEmail']);


//profile
Route::get('/profile', [ProfileController::class, 'index']);
Route::post('/profile/update', [ProfileController::class, 'update']);
Route::get('/profile/change-password', [ProfileController::class, 'changePassword']);
Route::post('/profile/change-password', [ProfileController::class, 'changePassword']);


//review
Route::post('/review/send', [DashboardController::class, 'review']);




});

Route::middleware('guest')->group(function(){

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);


Route::get('/forgot-password',[ResetPasswordController::class, 'index'])->name('password.request');
Route::post('/forgot-password', [ResetPasswordController::class, 'store'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'reset'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'update_password'])->name('password.update');






});


Route::middleware('guest', 'auth' , 'admin')->group(function(){



});

Route::get('/', [DashboardController::class, 'index']);
Route::get('/wisata' , [WisataController::class, 'index']);
Route::get('/wisata/perfect' , [WisataController::class, 'perfect']);
Route::get('/wisata/type/{type}' , [WisataController::class, 'type']);
Route::get('/destinasi/{id:slug}', [WisataController::class, 'showDestination']);
Route::get('/wisata/{id:slug}', [IsiController::class, 'show']);


Route::get('/testimoni', [DashboardController::class, 'testi_store']);


//kota
Route::get('/kota', [KotaController::class, 'index']);






Route::get('/coba', function(){
    return view('admin.booking.confirmation');
});

Route::get('/duty', function(){
    return view('admin.kendaraan.duty');
});






Route::get('/home', function(){
    return view('home');                                                                                                                             
});


Route::get('/pdf', function(){
    return view('pdf');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::get('/wel', function(){
    return view('welcome');
});

Route::get('/new', function(){
    return view('kendaraan');
});





