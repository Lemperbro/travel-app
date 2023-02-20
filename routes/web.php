<?php

use App\Models\Kota;
use App\Models\Wisata;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IsiController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\AdminKotaController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\AdminSupirController;
use App\Http\Controllers\admin\AdminWisataController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminKendaraanController;
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


Route::get('/masuk', function () {
    return view('masuk');
});

Route::get('/about', function () {
    return view('about');
});


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

Route::get('/testimoni', function () {
    return view('testimoni');
});

Route::get('/testimonimore', function () {
    return view('nore');
});

Route::get('/destinasi', function () {
    return view('destination');
});

Route::get('/step', function () {
    return view('step');
});






Route::get('/', [DashboardController::class, 'index']);
Route::get('/wisata/{id}', [WisataController::class, 'show']);
Route::get('/view/{id}', [WisataController::class, 'show']);

Route::middleware('admin')->group(function(){
    Route::get('/admin', [AdminDashboardController::class, 'index']);
    Route::get('/admin/kota', [AdminKotaController::class, 'index']);
    Route::get('/admin/kota/add', [AdminKotaController::class, 'show']);
    Route::post('/admin/kota/add', [AdminKotaController::class, 'store']);
    Route::post('/admin/kota/edit/{id}', [AdminKotaController::class, 'update']);
    Route::post('/kota/delete/{id}', [AdminKotaController::class, 'destroy']);

    Route::get('/admin/wisata', [AdminWisataController::class, 'index']);
    Route::get('/admin/wisata/add', [AdminWisataController::class, 'create']);
    Route::post('/admin/wisata/add', [AdminWisataController::class, 'store']);
    Route::get('/admin/wisata/edit/{id}', [AdminWisataController::class, 'edit']);
    Route::post('/admin/wisata/edit/{id}', [AdminWisataController::class, 'update']);

    Route::post('/admin/wisata/delete/{id}', [AdminWisataController::class, 'destroy']);
    Route::post('/admin/wisata/jemput/add/{id}', [AdminWisataController::class, 'addJemput']);



    Route::get('/user', [AdminUserController::class, 'index']);
    Route::post('/user/delete/{id}', [AdminUserController::class, 'destroy']);


    Route::get('/supir', [AdminSupirController::class, 'index']);
    Route::post('/supir/delete/{id}', [AdminSupirController::class, 'destroy']);
    Route::post('/admin/supir/edit/{id}', [AdminSupirController::class, 'update']);
    Route::post('/admin/supir/add', [AdminSupirController::class, 'store']);

    Route::get('/kendaraan', [AdminKendaraanController::class, 'index']);
    Route::post('/kendaraan/delete/{id}', [AdminKendaraanController::class, 'destroy']);
    Route::post('/kendaraan/edit/{id}', [AdminKendaraanController::class, 'update']);
    Route::post('/kendaraan/add', [AdminKendaraanController::class, 'store']);





    
    // Route::get('/admin/user', function(){
    //     return view('admin.user');                                                                                                                             
    // });
});

Route::middleware('auth')->group(function(){

Route::post('/logout', [LoginController::class, 'logout']);

});

Route::middleware('guest')->group(function(){

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);




});
Route::middleware('guest', 'auth' , 'admin')->group(function(){



});

Route::get('/isi/{id}', [IsiController::class, 'show']);





//kontrol kota
// Route::get('/kota', function(){
//     return view('admin.kota.index');
// });

// Route::get('/kota/add', function(){
//     return view('admin.kota.add');
// });

// //kontrol user
// // Route::get('/user', function(){
// //     return view('admin.user.index');
// // });

// Route::get('/user/add', function(){
//     return view('admin.user.add');
// });

Route::get('/blog', function(){
    return view('blog');                                                                                                                             
});

Route::get('/coba', function(){
    $wisata = Wisata::with(['kota','equipment', 'jemput', 'fasilitas', 'itenerary'  => function($query){
        $query->where('wisata_id', 7)->get();
    }])->where('id', 7)->get();

    foreach($wisata as $wisatas){

    foreach($wisatas->fasilitas as $fasilitas){

        $inclusion = explode('|', $fasilitas->inclusion);
        
    }
}
    return view('admin.wisata.coba',[
        'data' => $wisata,
        'inclusion' => $inclusion,
        'tittle' => 'Kelola Wisata',
        'kota' => Kota::all(),
        'coba' => ['satu', 'dua','tiga','empat', 'lima'],
    ]);                                                                                                                             
});


