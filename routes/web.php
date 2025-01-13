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
use App\Http\Controllers\QueryController;

Route::get('/', function () {
    return view('main');
});

Route::resource('books', BookController::class)->except(['create', 'show']);
Route::resource('customers', CustomerController::class)->except(['create', 'show']);
Route::resource('borrows', BorrowController::class)->except(['create', 'show']);
Route::resource('authors', AuthorController::class)->except(['create', 'show']);
Route::resource('classifications', ClassificationController::class)->except(['create', 'show']);
Route::resource('editions', EditionController::class)->except(['create', 'show']);
Route::resource('providers', ProviderController::class)->except(['create', 'show']);
Route::resource('purchases', PurchaseController::class)->except(['create', 'show']);

Route::get('/queries/books', [QueryController::class, 'indexBook'])->name('queries.books');
Route::get('/queries/borrows', [QueryController::class, 'indexBorrow'])->name('queries.borrows');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
