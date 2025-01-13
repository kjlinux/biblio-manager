<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ClassificationController;

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

Route::resource('books', BookController::class)->except(['create', 'show']);
Route::resource('customers', CustomerController::class)->except(['create', 'show']);
Route::resource('borrows', BorrowController::class)->except(['create', 'show']);
Route::resource('authors', AuthorController::class)->except(['create', 'show']);
Route::resource('classifications', ClassificationController::class)->except(['create', 'show']);
Route::resource('editions', EditionController::class)->except(['create', 'show']);
Route::resource('providers', ProviderController::class)->except(['create', 'show']);
Route::resource('purchases', PurchaseController::class)->except(['create', 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
