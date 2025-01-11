<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/books', function () {
    return view('books.manage');
})->name('books');

Route::get('/customers', function () {
    return view('customers.manage');
})->name('customers');

Route::get('/borrows', function () {
    return view('borrows.manage');
})->name('borrows');

Route::get('/authors', function () {
    return view('authors.manage');
})->name('authors');

Route::get('/classifications', function () {
    return view('classifications.manage');
})->name('classifications');

Route::get('/editions', function () {
    return view('editions.manage');
})->name('editions');

Route::get('/providers', function () {
    return view('providers.manage');
})->name('providers');

Route::get('/purchases', function () {
    return view('purchases.manage');
})->name('purchases');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
