<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataSiswaController;
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

Route::prefix('siswa')->group(function() {
    Route::get('/', [DataSiswaController::class, 'index'])->name('siswa');
    Route::post('/store', [DataSiswaController::class, 'store'])->name('siswa.store');
    Route::post('/destroy/{id}', [DataSiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::post('/update/{id}', [DataSiswaController::class, 'update'])->name('siswa.update');
    Route::get('/show/{id}', [DataSiswaController::class, 'show'])->name('siswa.show');
});