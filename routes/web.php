<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\AnggunanController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailNisbahController;
use App\Http\Controllers\DetailPembiayaanController;
use App\Http\Controllers\DetailSimpananController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JenisPembiayaanController;
use App\Http\Controllers\JenisSimpananController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LabaController;
use App\Http\Controllers\NisbahController;
use App\Http\Controllers\PembiayaanController;
use App\Http\Controllers\SetorController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TransaksiController;
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

Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard',
    [DashboardController::class, 'index']
)->name('dashboard');

Route::middleware(['auth:sanctum', 'verified', 'jabatan:funding'])->group(function () {
});

Route::middleware(['auth:sanctum', 'verified', 'jabatan:teller,manajer'])->group(function () {

    Route::get('setor', [SetorController::class, 'index'])->name('setor');
    Route::get('setor/batch', [SetorController::class, 'batch'])->name('setor/batch');
    Route::post('setor/{simpanan}', [SetorController::class, 'setor'])->name('setor.store');
    Route::post('transaksi/tarik/{simpanan}', [TransaksiController::class, 'tarik'])->name('tarik');
    Route::post('transaksi/angsur/{pembiayaan}', [TransaksiController::class, 'angsur'])->name('angsur');
    Route::post('brakas/tarik', [TransaksiController::class, 'tarikBrankas'])->name('brankas.tarik');
    Route::post('brakas/setor', [TransaksiController::class, 'setorBrankas'])->name('brankas.setor');
    Route::post('transaksi/pemasukan', [TransaksiController::class, 'pemasukan'])->name('pemasukan');
    Route::post('transaksi/pengeluaran', [TransaksiController::class, 'pengeluaran'])->name('pengeluaran');

    Route::post('harian/', [TransaksiController::class, 'makeHarian'])->name('harian.store');
    Route::post('kas/', [TransaksiController::class, 'tambahKas'])->name('kas.tambah');

    Route::get('tambah/', [DashboardController::class, 'tambahView'])->name('tambah.index');

    // Route::get('karyawan',function(){ return Inertia::render('BMT/karyawan');});
    Route::resource('test', TestController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('anggota', AnggotaController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('karyawan', KaryawanController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);


    Route::resource('group', GroupController::class)->only([
        'index', 'destroy', 'update', 'store', 'show'
    ]);

    Route::post('/group/{group}/add/{anggota}', [GroupController::class, 'addAnggota'])->name('group.anggota.add');
    route::get('/group/takeOne/{group}', [GroupController::class, 'takeOne'])->name('group.takeOne');
    Route::delete('/group/{group}/remove/{anggota}', [GroupController::class, 'removeAnggota'])->name('group.anggota.remove');

    Route::get('simpanan/{simpanan}', [SimpananController::class, 'show'])
        ->name('simpanan.show')
        ->withTrashed();
    Route::post('simpanan/active/{simpanan}', [SimpananController::class, 'active'])
        ->name('simpanan.active')->withTrashed();

    Route::post('karyawan/active/{karyawan}', [KaryawanController::class, 'active'])
        ->name('karyawan.active')->withTrashed();
    Route::get('karyawan/{karyawan}', [KaryawanController::class, 'show'])
        ->name('karyawan.show')
        ->withTrashed();

    Route::post('anggota/active/{anggota}', [AnggotaController::class, 'active'])
        ->name('anggota.active')->withTrashed();
    Route::get('anggota/{anggota}', [AnggotaController::class, 'show'])
        ->name('anggota.show')
        ->withTrashed();

        Route::post('nisbah/active/{nisbah}', [NisbahController::class, 'active'])
        ->name('nisbah.active')->withTrashed();
    Route::get('nisbah/{nisbah}', [NisbahController::class, 'show'])
        ->name('nisbah.show')
        ->withTrashed();


    Route::get('search/simpanan', [SimpananController::class, 'search'])
        ->name('simpanan.search');
    Route::get('search/pembiayaan', [PembiayaanController::class, 'search'])
        ->name('pembiayaan.search');
    Route::get('search/anggota', [AnggotaController::class, 'search'])
        ->name('anggota.search');
        Route::get('search/nisbah', [NisbahController::class, 'search'])
        ->name('nisbah.search');
    Route::resource('simpanan', SimpananController::class)->only([
        'index', 'destroy', 'update', 'store', 'search'
    ]);


    Route::resource('laba', LabaController::class)->only([
        'index', 'destroy', 'update', 'store','show'
    ]);

    Route::resource('anggunan', AnggunanController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('cetak', CetakController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('pembiayaan', PembiayaanController::class)->only([
        'index', 'destroy', 'update', 'store', 'show','create'
    ]);
    Route::resource('jabatan', JabatanController::class)->only([
        'index', 'destroy', 'update', 'store'
    ]);
    Route::resource('transaksi', TransaksiController::class)->only([
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

    Route::get('assign-rekening-to-karyawan', [DetailSimpananController::class, 'index'])->name('simpanan.detail.index');
});
