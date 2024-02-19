<?php

use App\Http\Controllers\AnggotaKelompokController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\AngsuranKelompokController;
use App\Http\Controllers\AngsuranSingleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailSingleController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PejabatBumdesController;
use App\Http\Controllers\PeminjamKelompokController;
use App\Http\Controllers\PeminjamSingleController;
use App\Http\Controllers\PinjamanAnggotaController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\PinjamanKelompokController;
use App\Http\Controllers\PinjamanSingleController;
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
//
Route::get('/', function (){
    return redirect('/beranda');
});
Route::get('/angsuran-kelompok', [AngsuranKelompokController::class, 'daftarPeminjam'])->name('angsuran-kelompok.daftar-peminjam');
Route::get('/angsuran-single', [AngsuranSingleController::class, 'daftarPeminjam'])->name('angsuran-single.daftar-peminjam');
Route::get('/angsuran-kelompok/{kelompok}/pinjaman-kelompok', [AngsuranKelompokController::class, 'daftarPinjaman'])->name('angsuran-kelompok.daftar-pinjaman');
Route::get('/angsuran-single/{single}/pinjaman-single', [AngsuranSingleController::class, 'daftarPinjaman'])->name('angsuran-single.daftar-pinjaman');

Route::put('/peminjam-kelompok/{kelompok}/pinjaman-kelompok/{pinjaman_kelompok}/update-full', [PinjamanKelompokController::class, 'updateFull'])->name('pinjaman-kelompok.update-full');
Route::put('/peminjam-single/{single}/pinjaman-single/{pinjaman_single}/update-full', [PinjamanSingleController::class, 'updateFull'])->name('pinjaman-single.update-full');

Route::resource('/beranda', DashboardController::class);
Route::resource('/jabatan', ReferensiJabatanController::class);
Route::resource('/pejabat', PejabatBumdesController::class);
Route::resource('/setting', SettingController::class);
// Route::resource('/pinjaman', PinjamanController::class);
//
Route::resource('/peminjam-kelompok', PeminjamKelompokController::class);
Route::resource('/peminjam-kelompok/{kelompok}/detail-kelompok', AnggotaKelompokController::class);
Route::resource('/peminjam-kelompok/{kelompok}/pinjaman-kelompok', PinjamanKelompokController::class);
Route::resource('/peminjam-single', PeminjamSingleController::class);
Route::resource('/peminjam-single/{single}/detail-single', DetailSingleController::class);
Route::resource('/peminjam-single/{single}/pinjaman-single', PinjamanSingleController::class);
Route::resource('/inventaris', InventarisController::class);
Route::resource('/peminjam-kelompok/{kelompok}/pinjaman-kelompok/{pinjaman_kelompok}/pinjaman-anggota', PinjamanAnggotaController::class);

Route::resource('/angsuran-kelompok/{kelompok}/pinjaman-kelompok/{pinjaman_kelompok}/riwayat-angsuran-kelompok', AngsuranKelompokController::class);
Route::resource('/angsuran-single/{single}/pinjaman-single/{pinjaman_single}/riwayat-angsuran-single', AngsuranSingleController::class);




