<?php

use App\Http\Controllers\JenisController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\inventory;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

// Route utama yang mengarahkan ke halaman welcome dengan judul aplikasi
Route::get('/', function () {
    return view('welcome', ['title' => 'Aplikasi penjualan barang']);
});

// Route untuk halaman home
Route::get('home', function () {
    return view('home');
});

// Rute untuk manajemen data Jenis Barang
Route::get('jenis', [JenisController::class, 'index'])->name('jenis.index');  // Menampilkan daftar jenis barang
Route::get('jenis/create', [JenisController::class, 'create'])->name('jenis.create');  // Form untuk menambah jenis barang
Route::get('jenis/{id_jenis}/edit', [JenisController::class, 'edit'])->name('jenis.edit');  // Form untuk mengedit jenis barang
Route::post('jenis', [JenisController::class, 'store'])->name('jenis.store');  // Menyimpan jenis barang baru
Route::put('jenis/{id_jenis}', [JenisController::class, 'update'])->name('jenis.update');  // Memperbarui data jenis barang
Route::delete('jenis/{id_jenis}', [JenisController::class, 'destroy'])->name('jenis.destroy');  // Menghapus jenis barang

// Rute untuk manajemen data Transaksi Pembelian
Route::get('Pembelian', [PembelianController::class, 'index'])->name('Pembelian.index');  // Menampilkan daftar transaksi pembelian
Route::get('Pembelian/create', [PembelianController::class, 'create'])->name('Pembelian.create');  // Form untuk membuat transaksi baru
Route::get('Pembelian/{id_Pembelian}/edit', [PembelianController::class, 'edit'])->name('Pembelian.edit');  // Form untuk mengedit transaksi
Route::post('Pembelian', [PembelianController::class, 'store'])->name('Pembelian.store');  // Menyimpan transaksi baru
Route::put('Pembelian/{id_Pembelian}', [PembelianController::class, 'update'])->name('Pembelian.update');  // Memperbarui transaksi
Route::delete('Pembelian/{id_Pembelian}', [PembelianController::class, 'destroy'])->name('Pembelian.destroy');  // Menghapus transaksi

// Rute untuk manajemen data Lokasi
Route::get('location', [LocationController::class, 'index'])->name('location.index');  // Menampilkan daftar lokasi
Route::get('location/create', [LocationController::class, 'create'])->name('location.create');  // Form untuk menambah lokasi
Route::post('location', [LocationController::class, 'store'])->name('location.store');  // Menyimpan lokasi baru
Route::get('location/{location_id}/edit', [LocationController::class, 'edit'])->name('location.edit');  // Form untuk mengedit lokasi
Route::put('location/{location_id}', [LocationController::class, 'update'])->name('location.update');  // Memperbarui data lokasi
Route::delete('location/{location_id}', [LocationController::class, 'destroy'])->name('location.destroy');  // Menghapus lokasi

// Rute untuk manajemen data Pengguna
Route::get('pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');  // Menampilkan daftar pengguna
Route::get('pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');  // Form untuk menambah pengguna
Route::post('pengguna', [PenggunaController::class, 'store'])->name('pengguna.store');  // Menyimpan data pengguna baru
Route::get('pengguna/{pengguna_id}/edit', [PenggunaController::class, 'edit'])->name('pengguna.edit');  // Form untuk mengedit data pengguna
Route::put('pengguna/{pengguna_id}', [PenggunaController::class, 'update'])->name('pengguna.update');  // Memperbarui data pengguna
Route::delete('pengguna/{pengguna_id}', [PenggunaController::class, 'destroy'])->name('pengguna.destroy');  // Menghapus pengguna

// Rute untuk manajemen data Inventory
Route::get('inventory', [inventory::class, 'index'])->name('inventory.index');  // Menampilkan daftar inventory
Route::get('inventory/create', [inventory::class, 'create'])->name('inventory.create');  // Form untuk menambah item inventory
Route::post('inventory', [inventory::class, 'store'])->name('inventory.store');  // Menyimpan item inventory baru
Route::get('inventory/{id}/edit', [inventory::class, 'edit'])->name('inventory.edit');  // Form untuk mengedit inventory
Route::put('inventory/{id}', [inventory::class, 'update'])->name('inventory.update');  // Memperbarui item inventory
Route::delete('inventory/{id}', [inventory::class, 'destroy'])->name('inventory.destroy');  // Menghapus item inventory

// Rute untuk halaman dan proses autentikasi pengguna
Route::get('/login', [AuthController::class, 'loginForm'])->name('auth.loginForm');  // Form login
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');  // Proses login
Route::post('/', [AuthController::class, 'logout'])->name('auth.logout');  // Proses logout
Route::post('/signup', [AuthController::class, 'signup'])->name('auth.signup');  // Proses registrasi pengguna baru
Route::get('/signup', [AuthController::class, 'signUpForm'])->name('auth.signUpForm');  // Form registrasi

// Rute untuk manajemen data Transaksi
Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');  // Menampilkan daftar transaksi
Route::get('transaction/create', [TransactionController::class, 'create'])->name('transaction.create');  // Form untuk membuat transaksi baru
Route::post('transaction', [TransactionController::class, 'store'])->name('transaction.store');  // Menyimpan transaksi baru
Route::get('transaction/{transaction_id}/edit', [TransactionController::class, 'edit'])->name('transaction.edit');  // Form untuk mengedit transaksi
Route::put('transaction/{transaction_id}', [TransactionController::class, 'update'])->name('transaction.update');  // Memperbarui transaksi
Route::delete('transaction/{transaction_id}', [TransactionController::class, 'destroy'])->name('transaction.destroy');  // Menghapus transaksi
