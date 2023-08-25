<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ApprovePengajuanController;




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
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [registerController::class, 'index'])->middleware('guest');
Route::post('/register', [registerController::class, 'store']);
// Route::get('/', function () {
// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['middleware' => ['auth']], function () {


    Route::get('/admin/dashboard',[AdminController::class,'index']);

    Route::get('/admin/barang',[BarangController::class,'index']);
    Route::post('/admin/barang/create',[BarangController::class,'store'])->name('barang.store');
    Route::get('/admin/barang/edit/{id}',[BarangController::class,'edit'])->name('barang.edit');
    Route::put('/admin/barang/update/{id}',[BarangController::class,'update'])->name('barang.update');
    Route::get('/admin/barang/delete/{id}',[BarangController::class,'destroy'])->name('barang.destroy');

    Route::get('/admin/pengajuan',[PengajuanController::class,'index']);
    Route::post('/admin/pengajuan/create',[PengajuanController::class,'store'])->name('pengajuan.store');
    Route::get('/admin/pengajuan/edit/{id}',[PengajuanController::class,'edit'])->name('pengajuan.edit');
    Route::put('/admin/pengajuan/update/{id}',[PengajuanController::class,'update'])->name('pengajuan.update');
    Route::get('/admin/pengajuan/delete/{id}',[PengajuanController::class,'destroy'])->name('pengajuan.destroy');

    Route::get('/admin/approve_pengajuan',[ApprovePengajuanController::class,'index']);
    Route::get('/admin/approve_pengajuan/edit/{id}',[ApprovePengajuanController::class,'edit'])->name('approve_pengajuan.edit');
    Route::put('/admin/approve_pengajuan/update/{id}',[ApprovePengajuanController::class,'update'])->name('approve_pengajuan.update');
    
});