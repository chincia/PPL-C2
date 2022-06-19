<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\KeuntunganController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfilTokoController;
use Illuminate\Support\Facades\Route;

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
//--------------------------------- A L L    A C T O R ---------------------------------//
//auth
Route::get('/login',[AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/post_login', [AuthController::class, 'post_login']);
Route::post('/post_register', [AuthController::class, 'post_register']);
Route::get('/logout', [AuthController::class, 'logout']);

//profil_toko
Route::get('/', [ProfilTokoController::class, 'indexpelanggan']);
Route::get('/profil_toko', [ProfilTokoController::class, 'index']);
Route::get('/profil_toko/pelanggan', [ProfilTokoController::class, 'indexpelanggan']);
Route::get('/profil_toko/create', [ProfilTokoController::class, 'create']);
Route::post('/profil_toko/insert', [ProfilTokoController::class, 'insert']);
Route::get('/profil_toko/edit', [ProfilTokoController::class, 'edit']);
Route::post('/profil_toko/update', [ProfilTokoController::class, 'update']);

//karyawan
Route::get('/karyawan', [KaryawanController::class, 'index']);
Route::get('/karyawan/create', [KaryawanController::class, 'create']);
Route::post('/karyawan/insert', [KaryawanController::class, 'insert']);
Route::get('/karyawan/detail/{id}', [KaryawanController::class, 'detail']);
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update']);

//pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan/create', [PelangganController::class, 'create']);
Route::post('/pelanggan/insert', [PelangganController::class, 'insert']);
Route::get('/pelanggan/detail/{id}', [PelangganController::class, 'detail']);
Route::get('/pelanggan/edit/{id}', [PelangganController::class, 'edit']);
Route::post('/pelanggan/update/{id}', [PelangganController::class, 'update']);

//barang
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang/katalog', [BarangController::class, 'katalog']);
Route::get('/barang/pelanggan', [BarangController::class, 'katalogpelanggan']);
Route::get('/barang/create', [BarangController::class, 'create']);
Route::post('/barang/insert', [BarangController::class, 'insert']);
Route::get('/barang/detail/{id}', [BarangController::class, 'detail']);
Route::get('/barang/pelanggandetail/{id}', [BarangController::class, 'detailpelanggan']);
Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
Route::post('/barang/update/{id}', [BarangController::class, 'update']);

//artikel
Route::get('/artikel', [ArtikelController::class, 'index']);
Route::get('/artikel/artikel', [ArtikelController::class, 'artikel']);
Route::get('/artikel/pelanggan', [ArtikelController::class, 'artikelpelanggan']);
Route::get('/artikel/pelanggandetail/{id}', [ArtikelController::class, 'detailpelanggan']);
Route::get('/artikel/create', [ArtikelController::class, 'create']);
Route::post('/artikel/insert', [ArtikelController::class, 'insert']);
Route::get('/artikel/detail/{id}', [ArtikelController::class, 'detail']);
Route::get('/artikel/edit/{id}', [ArtikelController::class, 'edit']);
Route::post('/artikel/update/{id}', [ArtikelController::class, 'update']);

//penjualan
Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/penjualan/create', [PenjualanController::class, 'create']);
Route::post('/penjualan/insert', [PenjualanController::class, 'insert']);
Route::get('/penjualan/edit/{id}', [PenjualanController::class, 'edit']);
Route::post('/penjualan/update/{id}', [PenjualanController::class, 'update']);




//-----------------------------------------------------------------------------//
//--------------------------------- A D M I N ---------------------------------//
//admin-dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'admin_dashboard'])->name('admin-dashboard');

//admin-admin
Route::get('/admin/admin', [AdminController::class, 'index']);
Route::get('/admin/create', [AdminController::class, 'create']);
Route::post('/admin/insert', [AdminController::class, 'insert']);
Route::get('/admin/detail/{id}', [AdminController::class, 'detail']);
Route::get('/admin/edit/{id}', [AdminController::class, 'edit']);
Route::post('/admin/update/{id}', [AdminController::class, 'update']);

//admin-keuangan
Route::get('/keuangan', [KeuanganController::class, 'index']);
Route::get('/keuangan/create', [KeuanganController::class, 'create']);
Route::post('/keuangan/insert', [KeuanganController::class, 'insert']);
Route::get('/keuangan/edit/{id}', [KeuanganController::class, 'edit']);
Route::post('/keuangan/update/{id}', [KeuanganController::class, 'update']);

//admin-grafik
Route::get('/grafik_keuangan', [GrafikController::class, 'index']);

//admin-keuntungan
Route::get('/keuntungan', [KeuntunganController::class,'index']);

//-----------------------------------------------------------------------------//
//--------------------------------- K A R Y A W A N ---------------------------------//
Route::get('/karyawan/dashboard', [DashboardController::class, 'karyawan_dashboard'])->name('karyawan-dashboard');