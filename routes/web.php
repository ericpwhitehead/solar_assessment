<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices');
Route::post('/invoices', [InvoiceController::class, 'save_and_send']);
Route::post('/save_draft', [InvoiceController::class, 'save_draft'])->name('save_draft');
Route::post('/update_invoice', [InvoiceController::class, 'update_invoice'])->name('update_invoice');
Route::post('/delete_invoice', [InvoiceController::class, 'delete'])->name('delete');

Route::post('/paid_invoice', [InvoiceController::class, 'paid'])->name('paid');
