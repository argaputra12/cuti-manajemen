<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\RiwayatCutiController;

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
    return view('welcome',[
        'title' => 'Home',
        'content' => 'Ini adalah halaman utama'
    ]);
});

Route::get('/riwayatcuti', [RiwayatCutiController::class,'index']);

Route::get('/departemen', [DepartemenController::class,'index']);

Route::get('/pegawai', [PegawaiController::class,'index']);

Route::get('/tambahpegawai', [PegawaiController::class,'tambahpegawaiform']);
Route::post('/insertdata', [PegawaiController::class,'insertdata']);

