<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekController;
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


Route::middleware('auth')->group(function () {
    Route::get('/', fn() => redirect()->route('dashboard'));

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
        Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
        Route::post('/karyawan/create', [KaryawanController::class, 'store'])->name('karyawan.store');
        Route::get('/karyawan/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
        Route::get('/update/karyawan/{karyawan}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
        Route::put('/update/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
        Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'delete'])->name('karyawan.delete');

        Route::get('/department', [DepartmentController::class, 'index'])->name('department.index');
        Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
        Route::post('/department/create', [DepartmentController::class, 'store'])->name('department.store');
        Route::get('/department/edit', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::get('/update/department/{department}', [DepartmentController::class, 'edit'])->name('department.edit');
        Route::put('/update/department/{department}', [DepartmentController::class, 'update'])->name('department.update');
        Route::delete('/department/{department}', [DepartmentController::class, 'destroy'])->name('department.delete');

        Route::get('/proyek', [ProyekController::class, 'index'])->name('proyek.index');
        Route::get('/proyek/create', [ProyekController::class, 'create'])->name('proyek.create');
        Route::post('/proyek', [ProyekController::class, 'store'])->name('proyek.store');
        Route::get('/proyek/{proyek}/edit', [ProyekController::class, 'edit'])->name('proyek.edit');
        Route::put('/proyek/{proyek}', [ProyekController::class, 'update'])->name('proyek.update');
        Route::delete('/proyek/{proyek}', [ProyekController::class, 'delete'])->name('proyek.delete');

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
        Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
        Route::get('/laporan/{laporan}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
        Route::put('/laporan/{laporan}', [LaporanController::class, 'update'])->name('laporan.update');
        Route::delete('/laporan/delete/{laporan}', [LaporanController::class, 'delete'])->name('laporan.delete');

    });
});


require __DIR__.'/auth.php';
