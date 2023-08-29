<?php

use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ItemPesananController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\OutletController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\MejaController;
use App\Http\Controllers\Backend\PenggunaController;
use App\Http\Controllers\Backend\PesananController;
use App\Http\Controllers\Backend\PegawaiController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Pesanan;
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

// Route::get('/', function () {
//     return view('welcome');
// });




// Route::get('/about', function () {
//     return view('frontend.about');
// });

// Route::get('/service', function () {
//     return view('frontend.service');
// });

// Route::get('/menu', function () {
//     return view('frontend.menu');
// });

// Route::get('/contact', function () {
//     return view('frontend.contact');
// });

Route::get('/', [FrontendController::class, 'index']);


Route::get('/dashboard', [BackendController::class, 'index'])->middleware('auth');

// LOGIN ADMIN
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// MANAJEMEN
Route::group(['middleware' => 'checkRole:admin'], function () {
  Route::resource('/data-meja', MejaController::class)->middleware('auth');
  Route::resource('/data-outlet', OutletController::class)->middleware('auth');
  Route::resource('/data-kategori', KategoriController::class)->middleware('auth');
  Route::resource('/data-pengguna', PenggunaController::class)->middleware('auth');
  Route::resource('/data-pegawai', PegawaiController::class)->middleware('auth');
});
Route::group(['middleware' => 'checkRole:admin,outlet'], function () {
  Route::resource('/data-menu', MenuController::class)->middleware('auth');
  Route::resource('/data-pesanan', PesananController::class)->middleware('auth');
  Route::resource('/item-pesanan', ItemPesananController::class)->middleware('auth');
});



Route::get('/get-menu-data/{id}', [FrontendController::class, 'getMenuData']);
Route::get('/get-meja', [FrontendController::class, 'getPesanan']);
Route::post('/get-pesanan', [FrontendController::class, 'getMejaPesanan']);
Route::post('/get-menu', [FrontendController::class, 'getDataMenu']);
Route::get('/get-cart/{id}', [FrontendController::class, 'getDataCart']);
Route::get('/pesan/{id}', [FrontendController::class, 'pilih_outlet']);
Route::get('/pilih_menu/{id}', [FrontendController::class, 'pilih_menu']);
Route::delete('hapus-item/{id}', [FrontendController::class, 'hapus_item']);

Route::post('konfirmasi-pemesanan/{id}', [FrontendController::class, 'konfirmasi_pemesanan']);
// Route::get('/notifikasi/{id}',[FrontendController::class,'notifikasi']);
