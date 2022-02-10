<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AnggunanController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DetailAngsuranController;
use App\Http\Controllers\DetailNisbahController;
use App\Http\Controllers\DetailSimpananController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisAnggotaController;
use App\Http\Controllers\JenisPembiayaanController;
use App\Http\Controllers\JenisSimpananController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\NisbahController;
use App\Http\Controllers\PembiayaanController;
use App\Http\Controllers\SimpananController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // Route::get('karyawan',function(){ return Inertia::render('BMT/karyawan');});
    Route::resources([
        'anggota' => AnggotaController::class,
        'jenis-anggota' => JenisAnggotaController::class,
        'simpanan' => SimpananController::class,
        'anggunan' => AnggunanController::class,
        'cetak' => CetakController::class,
        'pembiayaan' => PembiayaanController::class,
        'pembiayaan.detail' => DetailAngsuranController::class,
        'simpanan.detail' => DetailSimpananController::class,
        'karyawan' => KaryawanController::class,
        'jabatan' => JabatanController::class,
        'jenis-simpanan' => JenisSimpananController::class,
        'jenis-pembiayaan' => JenisPembiayaanController::class,
        'nisbah' => NisbahController::class,
        'nisbah.detail' => DetailNisbahController::class,
    ], ['parameters' => [
        'anggota' => 'anggota'
    ]]);
});
