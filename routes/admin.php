<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AdminLoginController::class, 'viewLogin'])->name('login.view');
Route::post('admin-login', [AdminLoginController::class, 'login'])->name('login');
Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');

Route::prefix('passwords')->group(function () {
    Route::get('forget-password', [ForgotPasswordController::class, 'getEmail'])->name('forget.password');
    Route::post('forget-password', [ForgotPasswordController::class, 'postEmail'])->name('forget.password.store');

    Route::get('reset-password/{token}', [ResetPasswordController::class, 'getPassword'])->name('reset.password');
    Route::post('reset-password', [ResetPasswordController::class, 'updatePassword'])->name('reset.password.store');
});
Route::middleware('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // Tickets routes
    Route::prefix('tickets')->as('ticket.')->group(function () {
        Route::resource('/', TicketController::class);
    });
    Route::put('/ticket/update/{id}', [TicketController::class, 'update'])->name('ticket.update');
    Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::get('/ticket/delete/{id}', [TicketController::class, 'destroy'])->name('ticket.delete');
});
