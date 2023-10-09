<?php

use Inertia\Inertia;
use App\Models\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    $c = Client::count();
    return Inertia::render('Dashboard', [
        'clientCount' => $c
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clients', [ClientController::class, 'index'])->name('clients');
});

Route::middleware('can:manage-suppliers')->group( function() {
    Route::get('/suppliers', [SupplierController::class, 'index']);
    Route::get('/suppliers/edit/{supplier}', [SupplierController::class, 'edit']);
    Route::patch('/supplier', [SupplierController::class, 'update']);
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy']);
});

require __DIR__.'/auth.php';
