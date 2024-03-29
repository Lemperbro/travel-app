<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\kota\KotaController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\ExtraController;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\auth\ProfileController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\admin\SessionController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\wisata\WisataController;
use App\Http\Controllers\admin\AdminKotaController;
use App\Http\Controllers\admin\AdminTeamController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\article\ArticleController;
use App\Http\Controllers\admin\AdminAboutController;
use App\Http\Controllers\admin\AdminGuideController;
use App\Http\Controllers\admin\AdminSupirController;
use App\Http\Controllers\admin\AdminTermsController;
use App\Http\Controllers\booking\CheckoutController;
use App\Http\Controllers\admin\AdminWisataController;
use App\Http\Controllers\admin\AdminBookingController;
use App\Http\Controllers\auth\ResetPasswordController;

use App\Http\Controllers\admin\AdminCarouselController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminKendaraanController;
use App\Http\Controllers\article\KategoriArticleController;

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













Route::post('/checkout/callback', [CheckoutController::class, 'callback']);



Route::get('/article', [ArticleController::class, 'index_client']);
Route::get('/article/show/{slug}', [ArticleController::class, 'show_client']);


Route::get('/abouts', [AdminAboutController::class, 'index_client']);


Route::get('/terms', [AdminTermsController::class, 'index_client']);




Route::middleware('admin')->group(function () {

    //notification 
    Route::post('/admin/notification/read_all', [NotificationController::class, 'read_all_admin']);
    Route::post('/notification/read_all', [NotificationController::class, 'read_all']);
    Route::post('/admin/notification/{id}', [NotificationController::class, 'update_admin']);
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

    Route::post('/admin/wisata/faq/delete/{id}', [AdminWisataController::class, 'deleteFaq']);

    Route::post('/admin/wisata/aktif/{id}', [AdminWisataController::class, 'aktif']);
    Route::post('/admin/wisata/nonaktif/{id}', [AdminWisataController::class, 'nonaktif']);

    //session
    Route::get('/admin/wisata/{slug}/session', [SessionController::class, 'index']);
    Route::post('/admin/wisata/{slug}/session/deleteAll', [SessionController::class, 'delete_all']);
    Route::post('/admin/wisata/{id}/{type}/delete', [SessionController::class, 'destroy']);
    Route::get('/admin/wisata/{slug}/{type}/add', [SessionController::class, 'create']);
    Route::post('/admin/wisata/{slug}/{type}/add', [SessionController::class, 'store']);
    Route::get('/admin/wisata/{slug}/{type}/edit', [SessionController::class, 'edit']);
    Route::post('/admin/wisata/{slug}/{type}/{id}/edit', [SessionController::class, 'update']);



    //admin guide\
    Route::get('/guide', [AdminGuideController::class, 'index']);
    Route::get('/guide/onDuty', [AdminGuideController::class, 'onDuty']);
    Route::post('/admin/guide/edit/{id}', [AdminGuideController::class, 'update']);
    Route::post('admin/guide/delete/{id}', [AdminGuideController::class, 'destroy']);
    Route::post('/admin/guide/add', [AdminGuideController::class, 'store']);


    //admin teams
    Route::get('/team', [AdminTeamController::class, 'index']);
    Route::post('admin/team/edit/{id}', [AdminTeamController::class, 'update']);
    Route::post('admin/team/delete/{id}', [AdminTeamController::class, 'destroy']);
    Route::post('admin/team/add', [AdminTeamController::class, 'store']);


    //about

    Route::get('/admin/about', [AdminAboutController::class, 'index']);
    Route::post('/admin/about/add', [AdminAboutController::class, 'store']);
    Route::post('/admin/about/update', [AdminAboutController::class, 'update']);





    Route::get('/user', [AdminUserController::class, 'index']);
    Route::post('/user/delete/{id}', [AdminUserController::class, 'destroy']);
    Route::post('/user/MakeAdmin/{id}', [AdminUserController::class, 'MakeAdmin']);


    Route::get('/supir', [AdminSupirController::class, 'index']);
    Route::get('/supir/onDuty', [AdminSupirController::class, 'onDuty']);
    Route::post('/supir/delete/{id}', [AdminSupirController::class, 'destroy']);
    Route::post('/admin/supir/edit/{id}', [AdminSupirController::class, 'update']);
    Route::post('/admin/supir/add', [AdminSupirController::class, 'store']);

    Route::get('/kendaraan', [AdminKendaraanController::class, 'index']);
    Route::get('/kendaraan/onDuty', [AdminKendaraanController::class, 'onDuty']);
    Route::post('/kendaraan/delete/{id}', [AdminKendaraanController::class, 'destroy']);
    Route::post('/kendaraan/edit/{id}', [AdminKendaraanController::class, 'update']);
    Route::post('/kendaraan/add', [AdminKendaraanController::class, 'store']);


    //booking
    Route::post('/admin/reschedule/{doc_no}', [AdminBookingController::class, 'reschedule']);
    Route::get('/admin/booking', [AdminBookingController::class, 'index']);
    Route::get('/admin/booking/confirmation', [AdminBookingController::class, 'confirmation']);
    Route::get('/admin/booking/cancel', [AdminBookingController::class, 'cancel']);
    Route::post('/admin/booking/cancel/{id}', [AdminBookingController::class, 'cancel_action']);
    Route::post('/admin/booking/confirmation/{id}', [AdminBookingController::class, 'confirm']);
    Route::get('/admin/booking/confirmation/{id}', [AdminBookingController::class, 'confirm']);
    Route::post('/admin/booking/confirmation/cancel/{id}', [AdminBookingController::class, 'tolak']);






    Route::post('/upload_image_froala', [ArticleController::class, 'upload_image_froala']);




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




    Route::get('/admin/about', [AdminAboutController::class, 'index']);
    Route::post('/admin/about/add', [AdminAboutController::class, 'store']);
    Route::post('/admin/about/update', [AdminAboutController::class, 'update']);


    //event
    Route::get('/event/{id}', [EventController::class, 'index']);
    Route::post('/event/aktif/{id}/{tipe}', [EventController::class, 'aktif']);
    Route::post('/event/nonaktif/{id}/{tipe}', [EventController::class, 'nonaktif']);

    Route::get('/event/edit/{id}/{tipe}', [EventController::class, 'edit']);
    Route::post('/event/edit/{id}/{tipe}', [EventController::class, 'update']);

    //extra
    Route::get('/extra/{id}', [ExtraController::class, 'index']);
    Route::get('/extra/add/{id}', [ExtraController::class, 'create']);
    Route::post('/extra/add/{id}', [ExtraController::class, 'store']);
    Route::post('/extra/edit_redirect/{id}', [ExtraController::class, 'edit_redirect']);
    Route::get('/extra/edit/{id}', [ExtraController::class, 'edit']);
    Route::post('/extra/edit/{id}', [ExtraController::class, 'update']);
    Route::post('/extra/delete/{id}', [ExtraController::class, 'destroy']);

    //terms
    Route::get('/admin/terms', [AdminTermsController::class, 'index']);
    Route::post('/admin/terms/add', [AdminTermsController::class, 'store']);
    Route::post('/admin/terms/update', [AdminTermsController::class, 'update']);


    //report
    Route::get('/admin/report', [ReportController::class, 'index']);

    //carousel
    Route::get('/carousels',[AdminCarouselController::class, 'index']);
    Route::get('/carousels/edit/{index}',[AdminCarouselController::class, 'edit']);
    Route::post('/carousels/edit/{index}',[AdminCarouselController::class, 'update']);
});

Route::middleware('auth')->group(function () {

    Route::get('/reschedule/{doc_no}', [CheckoutController::class, 'reschedule'])->name('reschedule.redirect');
    //notification
    Route::post('/notification/{id}', [NotificationController::class, 'update_client']);

    Route::post('/logout', [LoginController::class, 'logout']);
    Route::get('/checkout/{slug}', [CheckoutController::class, 'show']);
    Route::post('/checkout/{slug}', [CheckoutController::class, 'show']);
    Route::post('/checkout/{slug}/payment', [CheckoutController::class, 'store']);

    // Route::get('/checkout/{slug}/payment', [CheckoutController::class, 'payment']);
    Route::get('/tagihan', [CheckoutController::class, 'tagihan']);
    Route::post('/booking/cancel/{doc_no}', [CheckoutController::class, 'cancel']);
    Route::get('/booking', [CheckoutController::class, 'booking']);
    Route::get('/tiket/{doc_no}', [CheckoutController::class, 'ticket']);
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

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);


    Route::get('/forgot-password', [ResetPasswordController::class, 'index'])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'update_password'])->name('password.update');
});


Route::middleware('guest', 'auth', 'admin')->group(function () {
});

Route::get('/', [DashboardController::class, 'index']);
Route::get('/wisata', [WisataController::class, 'index']);
Route::get('/wisata/perfect', [WisataController::class, 'perfect']);
Route::get('/wisata/type/{type}', [WisataController::class, 'type']);
Route::get('/destinasi/{id:slug}', [WisataController::class, 'showDestination']);
Route::get('/wisata/{id:slug}', [WisataController::class, 'isi']);


Route::get('/testimoni', [DashboardController::class, 'testi_store']);


//kota
Route::get('/kota', [KotaController::class, 'index']);





Route::get('jajal1', function(){
    return view('admin.booking.emailRefund');
});
