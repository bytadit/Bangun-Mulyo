<?php

use App\Http\Controllers\AnggotaKelompokController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\AngsuranKelompokController;
use App\Http\Controllers\AngsuranSingleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PejabatBumdesController;
use App\Http\Controllers\PeminjamKelompokController;
use App\Http\Controllers\PeminjamSingleController;
use App\Http\Controllers\PinjamanAnggotaController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\ReferensiJabatanController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function (){
    return redirect('/beranda');
});

Route::resource('/beranda', DashboardController::class);
Route::resource('/jabatan', ReferensiJabatanController::class);
Route::resource('/pejabat', PejabatBumdesController::class);
Route::resource('/setting', SettingController::class);
Route::resource('/pinjaman', PinjamanController::class);
Route::resource('/peminjam-kelompok', PeminjamKelompokController::class);
Route::resource('/peminjam-kelompok/{kelompok}/anggota-kelompok', AnggotaKelompokController::class);
Route::resource('/peminjam-single', PeminjamSingleController::class);
Route::resource('/inventaris', InventarisController::class);
Route::resource('/peminjam-kelompok/{kelompok}/anggota-kelompok/{anggota}/pinjaman-anggota', PinjamanAnggotaController::class);
Route::resource('/angsuran-kelompok/{kelompok}/anggota-kelompok/{anggota}/angsuran-anggota', AngsuranKelompokController::class);
Route::resource('/angsuran-single', AngsuranSingleController::class);




