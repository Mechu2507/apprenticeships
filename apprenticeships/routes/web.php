<?php

use App\Models\Direction;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SelectClassController;
use App\Models\Active;
use App\Http\Controllers\ActiveController;
use App\Http\Controllers\PdfController;


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

Route::get('/admin', function () { return view('admin.main');});

Route::get('/main', function () { return view('main.main'); });

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/selectclass', [SelectClassController::class, 'index'])->name('selectclass');
Route::get('/codes/create', [SelectClassController::class, 'create'])->name('codes.create');
Route::post('/codes', [SelectClassController::class, 'store'])->name('codes.store');
Route::get('/selectarchive', [SelectClassController::class, 'archiveIndex'])->name('selectarchive');

Route::post('/show', [ActiveController::class, 'index'])->name('index');
Route::post('/showarchive', [ActiveController::class, 'archiveIndex'])->name('archive.index');
Route::get('/actives/{id}/edit', [ActiveController::class, 'edit'])->name('actives.edit');
Route::put('/actives/{id}', [ActiveController::class, 'update'])->name('actives.update');
Route::delete('/actives/{active}', [ActiveController::class, 'destroy'])->name('actives.destroy');


Route::get('/import-active', [ActiveController::class, 'importActive'])->name('import-active');
Route::post('/upload-active', [ActiveController::class, 'uploadActive'])->name('upload-active');

Route::post('/generate-pdf', [PdfController::class, 'generatePdf'])->name('generate.pdf');
Route::post('/generate-single-pdf', [PdfController::class, 'generateSinglePdf'])->name('generate.single.pdf');


Route::get('/temppdf', [ActiveController::class, 'tempPDF'])->name('tempPDF');