<?php

use App\Models\Direction;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SelectClassController;
use App\Models\Active;
use App\Http\Controllers\ActiveController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminSelectClassController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RepresentativeController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\DirectionController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\SpecializationController;


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

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['checkSession'])->group(function () {

    Route::get('/admin', function () { return view('admin.main');})->name('admin')->middleware('isAdmin');;
    Route::get('/main', function () { return view('main.main'); })->name('main');
    Route::get('/directions/change-password', [LoginController::class, 'showChangePasswordForm'])->name('directions.change-password-form');
    Route::post('/directions/change-password', [LoginController::class, 'changePassword'])->name('directions.changePassword');

    Route::get('/selectclass', [SelectClassController::class, 'index'])->name('selectclass');
    Route::get('/codes/create', [SelectClassController::class, 'create'])->name('codes.create');
    Route::post('/codes', [SelectClassController::class, 'store'])->name('codes.store');

    Route::post('/show', [ActiveController::class, 'index'])->name('index');
    Route::get('/actives/{id}/edit', [ActiveController::class, 'edit'])->name('actives.edit');
    Route::put('/actives/{id}', [ActiveController::class, 'update'])->name('actives.update');
    Route::delete('/actives/{active}', [ActiveController::class, 'destroy'])->name('actives.destroy');

    Route::post('/showarchive', [ActiveController::class, 'archiveIndex'])->name('archive.index');
    Route::get('/selectarchive', [SelectClassController::class, 'archiveIndex'])->name('selectarchive');
    Route::put('/codes/{id}', [SelectClassController::class, 'toArchive'])->name('codes.toArchive');
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

    Route::get('/selectstatus', [SelectClassController::class, 'statusIndex'])->name('selectstatus');
    Route::post('/status', [StateController::class, 'Index'])->name('status.index');
    Route::post('/upload-students-data', [StateController::class, 'uploadStudentsData'])->name('upload-students-data');
    Route::get('/edit-status/{id}', [StateController::class, 'editStatus'])->name('edit.status');
    Route::put('/update-status/{id}', [StateController::class, 'updateStatus'])->name('update.status');

    Route::get('/selectstats', [SelectClassController::class, 'statIndex'])->name('selectstats');
    Route::post('/stats', [StatController::class, 'index'])->name('stat.index');

    Route::get('/coordinators', [CoordinatorController::class, 'index'])->name('coordinators.index');
    Route::post('/upload-coordinator', [CoordinatorController::class, 'uploadCoordinator'])->name('upload-coordinator');
    Route::get('/edit-coordinator/{id}', [CoordinatorController::class, 'edit'])->name('edit-coordinator');
    Route::put('/update-coordinator/{id}', [CoordinatorController::class, 'update'])->name('update-coordinator');
    Route::get('/create-coordinator', [CoordinatorController::class, 'create'])->name('create-coordinator');
    Route::post('/store-coordinator', [CoordinatorController::class, 'store'])->name('store-coordinator');
    Route::delete('/delete-coordinator/{id}', [CoordinatorController::class, 'destroy'])->name('delete-coordinator');

    Route::get('/specializations', [SpecializationController::class, 'index'])->name('specializations.index');
    Route::post('/specializations', [SpecializationController::class, 'store'])->name('specializations.store');
    Route::get('/specializations/{id}/edit', [SpecializationController::class, 'edit'])->name('specializations.edit');
    Route::put('/specializations/{id}', [SpecializationController::class, 'update'])->name('specializations.update');
    Route::delete('/specializations/{id}/delete', [SpecializationController::class, 'destroy'])->name('specializations.destroy');

    Route::middleware(['isAdmin'])->group(function () {
        Route::get('/admin/directions', [DirectionController::class, 'index'])->name('directions.index');
        Route::post('/admin/directions', [DirectionController::class, 'store'])->name('directions.store');    
        Route::get('/aselectclass', [AdminSelectClassController::class, 'index'])->name('aselectclass');
        Route::post('/admin_show', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/admin/selectarchive', [AdminSelectClassController::class, 'archiveIndex'])->name('admin.selectarchive');
        Route::get('/admin/codes/create', [AdminSelectClassController::class, 'create'])->name('admin.codes.create');
        Route::put('/admin/codes/{id}', [AdminSelectClassController::class, 'toArchive'])->name('admin.codes.toArchive');
        Route::get('/admin/import-active', [AdminController::class, 'importActive'])->name('admin.import-active');
        Route::post('/admin/upload-active', [AdminController::class, 'uploadActive'])->name('admin.upload-active');
        Route::get('/admin/export-index', [AdminController::class, 'exportActiveIndex'])->name('admin.export-index');
        Route::post('/admin/export-active', [AdminController::class, 'exportActive'])->name('admin.export-active');
        Route::get('/admin/selectstats', [AdminSelectClassController::class, 'statIndex'])->name('admin.selectstats');
        Route::get('/admin/selectstatus', [AdminSelectClassController::class, 'statusIndex'])->name('admin.selectstatus');
        Route::post('/admin/codes', [AdminSelectClassController::class, 'store'])->name('admin.codes.store');
    });

});