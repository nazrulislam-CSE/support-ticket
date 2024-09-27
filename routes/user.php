<?php

use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\StaffController;
use App\Http\Controllers\User\ClientController;
use App\Http\Controllers\User\SupplierController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\ReceiveController;
use App\Http\Controllers\User\ExpenseController;
use App\Http\Controllers\User\TicketController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('home');
    Route::get('logout', [DashboardController::class, 'logout'])->name('user.logout');

    // Tickets routes
    Route::prefix('tickets')->as('ticket.')->group(function () {
        Route::resource('/', TicketController::class);
    });
    Route::put('/ticket/update/{id}', [TicketController::class, 'update'])->name('ticket.update');
    Route::get('/ticket/edit/{id}', [TicketController::class, 'edit'])->name('ticket.edit');
    Route::get('/ticket/delete/{id}', [TicketController::class, 'destroy'])->name('ticket.delete');

    // Staff routes
    Route::prefix('staffs')->as('staff.')->group(function () {
        Route::resource('/', StaffController::class);
    });

    // Client routes
    Route::prefix('client')->as('client.')->group(function () {
        Route::resource('/', ClientController::class);
    });

    // Supplier routes
    Route::prefix('supplier')->as('supplier.')->group(function () {
        Route::resource('/', SupplierController::class);
    });

    // Account routes
    Route::prefix('account')->as('account.')->group(function () {
        Route::resource('/', AccountController::class);
    });

    // Account routes
    Route::prefix('receive')->as('receive.')->group(function () {
        Route::resource('/', ReceiveController::class);
    });

     // Account routes
     Route::prefix('expense')->as('expense.')->group(function () {
        Route::resource('/', ExpenseController::class);
    });
});
