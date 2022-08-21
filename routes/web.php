<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\adminController;
use App\Http\Controllers\daftaradminController;
use App\Http\Controllers\daftarmasyarakatController;
use App\Http\Controllers\pengaduanController;
use App\Http\Controllers\pengaduanadminController;
use App\Http\Controllers\tanggapanuserController;
use App\Http\Controllers\tanggapanController;
use App\Http\Controllers\laporanController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\sudahController;
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

Auth::routes();
Route::group(['middleware' => ['user']], function () {
    Route::resource('pengaduan/home', pengaduanController::class);
    Route::resource('tanggapanuser', tanggapanuserController::class);
});
Route::group(['middleware' => ['admin']], function () {
    Route::resource('admin/home', adminController::class);
    Route::resource('admin/pengaduan', pengaduanadminController::class);
    Route::resource('admin/index-sudah', sudahController::class);
    // Route::get('admin/index-sudah', [sudahController::class, 'index'])->name('sudah');
    // Route::get('admin/index-sudah', 'sudahController::class@index')->name('sudah');
    // Route::resource('admin/tanggapan', tanggapanadminController::class);
    Route::resource('admin/tanggapan', tanggapanController::class);
    Route::resource('admin/daftar-admin', daftaradminController::class);
    Route::resource('admin/daftar-masyarakat', daftarmasyarakatController::class);
    Route::get('/dashboard', [dashboardController::class, 'index'])->name('dashboard');
    Route::get('admin/laporan', [laporanController::class, 'index']);
    Route::get('admin/pdf/', [laporanController::class, 'pdf']);
    // Route::get('/pdf', 'dashboardController@index')->name('dashboard');
});
Route::get('/home', 'HomeController::class@index')->name('home');
