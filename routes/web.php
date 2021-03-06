<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AnggunanController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DetailNisbahController;
use App\Http\Controllers\DetailPembiayaanController;
use App\Http\Controllers\DetailSimpananController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\JabatanController;
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

Route::middleware(['auth:sanctum', 'verified', 'jabatan:manajer'])->group(function () {
    // Route::get('karyawan',function(){ return Inertia::render('BMT/karyawan');});
    Route::resource('anggota', AnggotaController::class)->only([
        'index', 'destroy', 'update', 'store'
    ])->parameter('anggota', 'anggota');
    Route::resource('karyawan', KaryawanController::class)->only([
        'index', 'destroy', 'update', 'store', 'show'
    ]);


    Route::resource('group', GroupController::class)->only([
        'index', 'destroy', 'update', 'store', 'show'
    ]);
    Route::post('/group/{group}/add/{anggota}',[GroupController::class,'addAnggota'])->name('group.anggota.add');
    Route::delete('/group/{group}/remove/{anggota}',[GroupController::class,'removeAnggota'])->name('group.anggota.remove');


    Route::resource('simpanan', SimpananController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('anggunan', AnggunanController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('cetak', CetakController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('pembiayaan', PembiayaanController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('jabatan', JabatanController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('jenis-simpanan', JenisSimpananController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('jenis-pembiayaan', JenisPembiayaanController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('nisbah', NisbahController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);

    Route::resource('nisbah/detail', DetailNisbahController::class)->only([
        'destroy', 'update'
    ])->shallow()->names(['destroy' => 'nisbah.detail.destroy', 'update' => 'nisbah.detail.update']);
    Route::post('nisbah/{nisbah}/detail', [DetailNisbahController::class, 'store'])->name('nisbah.detail.store');
    Route::get('nisbah/{nisbah}/detail', [DetailNisbahController::class, 'index'])->name('nisbah.detail.index');

    Route::resource('pembiayaan/detail', DetailPembiayaanController::class)->only([
        'destroy', 'update'
    ])->shallow()->names(['destroy' => 'pembiayaan.detail.destroy', 'update' => 'pembiayaan.detail.update']);
    Route::post('pembiayaan/{pembiayaan}/detail', [DetailPembiayaanController::class, 'store'])->name('pembiayaan.detail.store');
    Route::get('pembiayaan/{pembiayaan}/detail', [DetailPembiayaanController::class, 'index'])->name('pembiayaan.detail.index');

    Route::resource('simpanan/detail', DetailSimpananController::class)->only([
        'destroy', 'update'
    ])->shallow()->names(['destroy' => 'simpanan.detail.destroy', 'update' => 'simpanan.detail.update']);
    Route::post('simpanan/{simpanan}/detail', [DetailSimpananController::class, 'store'])->name('simpanan.detail.store');
    Route::get('simpanan/{simpanan}/detail', [DetailSimpananController::class, 'index'])->name('simpanan.detail.index');
});
