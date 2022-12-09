<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\RatingKasirController;
use App\Http\Controllers\TestQueueEmails;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('barang/cetak_barang', [BarangController::class, 'document']);
Route::get('kasir/cetak_kasir', [KasirController::class, 'document']);
Route::get('ratingkasir/cetak_ratingkasir', [RatingKasirController::class, 'document']);
Route::get('/sending-queue-emails', [TestQueueEmails::class,'index']);


Route::resource('barang', BarangController::class);
Route::resource('kasir', KasirController::class)->except(['show']);
Route::resource('ratingkasir', RatingKasirController::class)->except(['show']);