<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerjalananController;
use App\Http\Controllers\simpanPerjalanan;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', [PerjalananController::class, 'index']);
Route::get('/form', [PerjalananController::class, 'form']);
Route::get('/dashboard2', [UserController::class, 'userDashboard']);

Route::get('/register', [UserController::class, 'registerPage']);
Route::post('/registerPage', [UserController::class, 'userRegister']);
Route::post('/simpanPerjalanan', [perjalananController::class, 'simpanPerjalanan']);
Route::post('/postLogin', [UserController::class, 'Login']);
Route::get('/', [UserController::class, 'halamanLogin'])->name('login');
Route::get('/urutkan',[perjalananController::class,'urutkanPerjalanan']);
Route::post('/logout', [UserController::class, 'LogOut']);
Route::get('/cari', [PerjalananController::class, 'cariPerjalanan']);
Route::get('/urut', [perjalananController::class, 'urutkanPerjalanan']);
