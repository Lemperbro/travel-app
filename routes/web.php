<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

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

Route::get('/masuk', function () {
    return view('masuk');
});

Route::get('/opentrip', function () {
    return view('opentrip');
});

Route::get('/daftar', function(){
    return view('register');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/wisata/{id}', [WisataController::class, 'show']);
Route::get('/view/{id}', [WisataController::class, 'show']);

Route::get('/admin', function(){
    return view('admin.index');                                                                                                                             
});




Route::get('/about', function(){
    return view('about');
});

Route::get('/login', [LoginController::class, 'index']);

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

Route::get('/blog', function(){
    return view('blog');                                                                                                                             
});
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

