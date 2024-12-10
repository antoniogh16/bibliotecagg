<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\PersonalController;
use App\Models\Loan;
use App\Models\Cliente;
use App\Models\Book;


Route::post('auth/register', [AuthController::class, 'create'])->name('auth.register');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');


Route::middleware(['auth:sanctum'])->group(function () {
    Route::resource('genres', GenreController::class);
    Route::resource('books', BookController::class);
    Route::resource('clientes', ClienteController::class);
    Route::resource('loans', LoanController::class);
    Route::resource('personals', PersonalController::class);
    Route::get('booksall', [BookController::class, 'all'])->name('books.all');
    Route::get('booksbygenre', [BookController::class, 'BooksByGenre'])->name('books.bygenre');
    Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout');
});
