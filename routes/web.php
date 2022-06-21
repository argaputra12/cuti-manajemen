
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Middleware\IsAdmin;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ApprovalCutiController;
use App\Http\Controllers\PengajuanCutiController;
use App\Http\Controllers\UpdateUserController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profile', [DashboardController::class, 'profile'])->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');

Route::get('/pengajuan_cuti', [PengajuanCutiController::class, 'index'])->middleware('auth')->name('pengajuan_cuti');
Route::post('/pengajuan_cuti', [PengajuanCutiController::class, 'store'])->name('ajukan_cuti');

Route::get('/approvalCuti', [ApprovalCutiController::class, 'index'])->name('admin.approvalCuti')->middleware('is_admin');
Route::post('/approvalCuti.approved', [ApprovalCutiController::class, 'approved'])->name('admin.approvalCuti.approved')->middleware('is_admin');
Route::post('/approvalCuti.refused', [ApprovalCutiController::class, 'refused'])->name('admin.approvalCuti.refused')->middleware('is_admin');

Route::post('/update_user', [UpdateUserController::class, 'update'])->name('update_user');

Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
