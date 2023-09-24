<?php

use App\Http\Controllers\DashboardPenggunaanUnit;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NamaDriverController;
use App\Http\Controllers\NomorUnitController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\sop_controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () { return view('dashboard.index'); })->middleware('auth');
Route::get('/dashboard/learn-more', function () { return view('dashboard.information_dashboard.learn_more'); })->middleware('auth');
Route::get('/dashboard/panduan-penggunaan-unit', function () { return view('dashboard.information_dashboard.panduan_lpu'); })->middleware('auth');
Route::resource('/inbox', InboxController::class)->middleware('auth');
Route::resource('/dashboard/penggunaan-unit', DashboardPenggunaanUnit::class)->middleware('auth');

Route::get('/admin-management', function () { return view('dashboard.AdminManagement.index'); })->middleware('admin');
Route::get('/admin-management', function () {
    $namaDriverController = new NamaDriverController();
    $dataNamaDriver = $namaDriverController->getData();
    
    $nomorUnitController = new NomorUnitController();
    $dataNomorUnit = $nomorUnitController->getData();
    
    $registerController = new RegisterController();
    $dataUser = $registerController->getData();

    return view('dashboard.AdminManagement.index', compact('dataNamaDriver', 'dataNomorUnit', 'dataUser'));
})->middleware('admin');
Route::resource('/admin-management/create-nama-driver', NamaDriverController::class)->middleware('admin');
Route::resource('/admin-management/create-nomor-unit', NomorUnitController::class)->middleware('admin');
Route::delete('/admin-management/delete-nama-driver/{nama_driver}', [NamaDriverController::class, 'destroy'])->middleware('admin');
Route::delete('/admin-management/delete-nomor-unit/{nomor_unit}', [NomorUnitController::class, 'destroy'])->middleware('admin');
Route::delete('/admin-management/delete-user/{user}', [RegisterController::class, 'destroy'])->middleware('admin');
Route::delete('/admin-management/delete-penggunaan-unit/{penggunaan_unit}', [DashboardPenggunaanUnit::class, 'destroy'])->middleware('admin');

Route::get('/admin-data', function() { return view('dashboard.AdminData.index'); });
Route::get('/admin-data', [DashboardPenggunaanUnit::class, 'admindata']);

Route::get('/admin-data/eksport', [DashboardPenggunaanUnit::class, 'exportPDF'])->name('export.pdf')->middleware('admin');

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::resource('/dashboard/standar-operasional-prosedur', sop_controller::class)->middleware('auth');
Route::get('/standar-operasional-prosedur', [sop_controller::class, 'view'])->middleware('admin');
Route::get('/standar-operasional-prosedur/create', [sop_controller::class, 'create'])->middleware('admin');
Route::post('/standar-operasional-prosedur/create', [sop_controller::class, 'store'])->middleware('admin');
Route::delete('/standar-operasional-prosedur/{sop}', [sop_controller::class, 'destroy'])->middleware('admin');
