<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConfirmController;

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
Route::get('/', [ContactController::class, 'index'])->name('index');
Route::post('/thanks', [ContactController::class, 'store']);

Route::get('/admin', [AdminController::class, 'index'])->middleware('auth')->name('admin.index');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');
Route::get('/admin/export', [AdminController::class, 'export'])
    ->middleware('auth')
    ->name('admin.export');
Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::delete('/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
Route::match(['get', 'post'], '/contact/back', [ContactController::class, 'back'])->name('contacts.back');
Route::get('/contact', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/confirm', [ContactController::class, 'confirm'])->name('confirm');
Route::post('/send', [ContactController::class, 'store'])->name('contacts.send');
Route::get('/thanks', function () {
    return view('contacts.thanks');
});