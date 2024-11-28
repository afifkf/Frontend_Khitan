<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukMetodeController;
use App\Http\Controllers\TabelUserController;
use App\Http\Controllers\IsiDataController;
use App\Http\Controllers\PilihMetodeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\LabaRugiController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\TransaksiController;
use App\Models\Keluhan;
use App\Models\ProdukMetode;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/beranda', function () {
    return view('landing/beranda');
});
// Route::get('/percobaandashboard', function () {
//     return view('landing/percobaandashboard');
// });


Route::get('/dashboard', function () {
    return view('landing/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/isidata', [IsiDataController::class, 'index'])->name('isidata');
    Route::post('/isidata/save', [IsiDataController::class,'save'])->name('isidata.save');

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');

    Route::get('/pilihmetode', [PilihMetodeController::class, 'index'])->name('pilihmetode');

    Route::get('/pilihmetode/save/{metode}', function ($metode) {
        session(['metode_terpilih' => $metode]);
        return redirect()->route('isidata');
    })->name('pilihmetode.save');

});

Route::middleware(['auth', 'Admin'])-> group(function(){
    Route::get('admin/dashboard', [HomeController::class,'index']);
    Route::get('admin/dashboard', [HomeController::class,'index'])->name('admin/dashboard');
    Route::get('admin/produkmetode', [ProdukMetodeController::class,'index'])->name('admin/produkmetode');
    Route::get('admin/produkmetode/create', [ProdukMetodeController::class,'create'])->name('admin/produkmetode/create');
    Route::post('admin/produkmetode/save', [ProdukMetodeController::class,'save'])->name('admin/produkmetode/save');
    Route::get('admin/produkmetode/edit/{id}', [ProdukMetodeController::class,'edit'])->name('admin/produkmetode/edit');
    Route::put('admin/produkmetode/edit/{id}', [ProdukMetodeController::class,'update'])->name('admin/produkmetode/update');
    Route::get('admin/produkmetode/delete/{id}', [ProdukMetodeController::class,'delete'])->name('admin/produkmetode/delete');

    Route::get('admin/tabeluser', [TabelUserController::class,'index'])->name('admin/tabeluser');

    Route::get('admin/datapasien', [DataPasienController::class,'index'])->name('admin/datapasien');

    Route::get('admin/labarugi', [LabaRugiController::class, 'LabaRugi'])->name('admin.labarugi');
    Route::get('admin/keluhan', [KeluhanController::class, 'index'])->name('admin.keluhan');
    Route::get('admin/transaksi', [TransaksiController::class, 'index'])->name('admin.transaksi');

});
require __DIR__.'/auth.php';

// Route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth', 'Admin']);
