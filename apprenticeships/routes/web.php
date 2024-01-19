<?php

use App\Models\Direction;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', [LoginController::class, 'showLoginForm'])->name('show-login-form');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/admin', function () {
    return view('admin.main');
});

Route::get('/main', function () {
    return view('main.main');
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
