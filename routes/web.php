<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\KotaController;
use App\Models\Kota;
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

Route::get('/masuk', function () {
    return view('masuk');
});

Route::get('/opentrip', function () {
    return view('opentrip');
});

Route::get('/daftar', function(){
    return view('register');
});

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/wisata/{id}', [WisataController::class, 'show']);
Route::get('/view/{id}', [WisataController::class, 'show']);

Route::middleware('admin')->group(function(){
    Route::get('/admin', [AdminDashboardController::class, 'index']);
    Route::get('/admin/kota', [KotaController::class, 'index']);

    
    // Route::get('/admin/user', function(){
    //     return view('admin.user');                                                                                                                             
    // });
});






Route::get('/login', function(){
    return view('masuk');
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


//kontrol kota
Route::get('/kota', function(){
    return view('admin.kota.index');
});

Route::get('/kota/add', function(){
    return view('admin.kota.add');
});

//kontrol user
Route::get('/user', function(){
    return view('admin.user.index');
});

Route::get('/user/add', function(){
    return view('admin.user.add');
});

Route::get('/home', function(){
    return view('home');                                                                                                                             
});


