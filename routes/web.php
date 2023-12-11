<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\IssueLibraryCardController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/student-corner', [StudentController::class, 'index'])->name('student-corner');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student-create');
    Route::post('/student/store', [StudentController::class, 'store'])->name('student-store');
    Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student-edit');
    Route::put('/student/{id}/update', [StudentController::class, 'update'])->name('student-update');
    Route::delete('/student/{id}/delete', [StudentController::class, 'destroy'])->name('student-delete');

    Route::get('/book-categories-corner', [BookCategoryController::class, 'index'])->name('book-categories-corner');
    Route::get('/book-categories/create', [BookCategoryController::class, 'create'])->name('book-categories-create');
    Route::post('/book-categories/store', [BookCategoryController::class, 'store'])->name('book-categories-store');
    Route::get('/book-categories/{id}/edit', [BookCategoryController::class, 'edit'])->name('book-categories-edit');
    Route::put('/book-categories/{id}/update', [BookCategoryController::class, 'update'])->name('book-categories-update');
    Route::delete('/book-categories/{id}/delete', [BookCategoryController::class, 'destroy'])->name('book-categories-delete');


    Route::get('/books-corner', [BookController::class, 'index'])->name('books-corner');
    Route::get('/books/create', [BookController::class, 'create'])->name('books-create');
    Route::post('/books/store', [BookController::class, 'store'])->name('books-store');
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books-edit');
    Route::put('/books/{id}/update', [BookController::class, 'update'])->name('books-update');
    Route::delete('/books/{id}/delete', [BookController::class, 'destroy'])->name('books-delete');

    Route::get('/issue-library-cards-corner', [IssueLibraryCardController::class, 'index'])->name('issue-library-cards-corner');
    Route::get('/issue-library-cards/create', [IssueLibraryCardController::class, 'create'])->name('issue-library-cards-create');
    Route::post('/issue-library-cards', [IssueLibraryCardController::class, 'store'])->name('issue-library-cards-store');
    Route::get('/issue-library-cards/{id}/edit', [IssueLibraryCardController::class, 'edit'])->name('issue-library-cards-edit');
    Route::put('/issue-library-cards/{id}', [IssueLibraryCardController::class, 'update'])->name('issue-library-cards-update');
    Route::delete('/issue-library-cards/{id}', [IssueLibraryCardController::class, 'destroy'])->name('issue-library-cards-delete');
});