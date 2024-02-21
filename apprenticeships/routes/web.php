<?php

use App\Models\Direction;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SelectClassController;
use App\Models\Active;
use App\Http\Controllers\ActiveController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\DirectionController;

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

Route::get('/', [LoginController::class, 'showLoginForm'])->name('show-login-form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/directions/change-password', [LoginController::class, 'showChangePasswordForm'])->name('directions.change-password-form');
Route::post('/directions/change-password', [LoginController::class, 'changePassword'])->name('directions.changePassword');

Route::get('/admin', function () { return view('admin.main');})->name('admin');

Route::get('/main', function () { return view('main.main'); })->name('main');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/selectclass', [SelectClassController::class, 'index'])->name('selectclass');
Route::get('/codes/create', [SelectClassController::class, 'create'])->name('codes.create');
Route::post('/codes', [SelectClassController::class, 'store'])->name('codes.store');
Route::get('/selectarchive', [SelectClassController::class, 'archiveIndex'])->name('selectarchive');
Route::put('/codes/{id}', [SelectClassController::class, 'toArchive'])->name('codes.toArchive');
Route::get('/selectstatus', [SelectClassController::class, 'statusIndex'])->name('selectstatus');
Route::get('/selectstats', [SelectClassController::class, 'statIndex'])->name('selectstats');

Route::post('/show', [ActiveController::class, 'index'])->name('index');
Route::post('/showarchive', [ActiveController::class, 'archiveIndex'])->name('archive.index');
Route::get('/actives/{id}/edit', [ActiveController::class, 'edit'])->name('actives.edit');
Route::put('/actives/{id}', [ActiveController::class, 'update'])->name('actives.update');
Route::delete('/actives/{active}', [ActiveController::class, 'destroy'])->name('actives.destroy');

Route::get('/import-active', [ActiveController::class, 'importActive'])->name('import-active');
Route::post('/upload-active', [ActiveController::class, 'uploadActive'])->name('upload-active');

Route::get('/export-index', [ActiveController::class, 'exportActiveIndex'])->name('export-index');
Route::post('/export-active', [ActiveController::class, 'exportActive'])->name('export-active');

Route::post('/generate-pdf', [PdfController::class, 'generatePdf'])->name('generate.pdf');
Route::post('/generate-single-pdf', [PdfController::class, 'generateSinglePdf'])->name('generate.single.pdf');

Route::get('/representatives', [RepresentativeController::class, 'index'])->name('representatives.index');
Route::post('/representatives', [RepresentativeController::class, 'store'])->name('representatives.store');
Route::get('/representatives/{id}/edit', [RepresentativeController::class, 'edit'])->name('representatives.edit');
Route::put('/representatives/{id}', [RepresentativeController::class, 'update'])->name('representatives.update');
Route::delete('/representatives/{id}/delete', [RepresentativeController::class, 'destroy'])->name('representatives.destroy');

Route::post('/status', [StateController::class, 'Index'])->name('status.index');
Route::put('/update-status', [StateController::class, 'updateStatus'])->name('update.status');

Route::post('/stats', [StatController::class, 'index'])->name('stat.index');

Route::get('/admin/directions', [DirectionController::class, 'index'])->name('directions.index');
Route::post('/admin/directions', [DirectionController::class, 'store'])->name('directions.store');