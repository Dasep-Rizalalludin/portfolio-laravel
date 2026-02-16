<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LibraryController; // ✅ WAJIB
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\BookController; // (opsional tapi rapi)
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\AuthController;
use App\Models\Book;
use App\Models\User;

// Welcome
Route::get('/', function () {
    return view('welcome');
});

// Publik
Route::get('/home', function () {
    return view('home.index');
});

Route::get('/about', function () {
    return view('about.index');
});

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blogPost}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', function () {
    return view('contact.index');
});

// Library (Publik)
Route::get('/library', [LibraryController::class, 'index']);

// Admin
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        $bookCount = Book::count();
        $userCount = User::count();
        $recentBooks = Book::latest()->take(5)->get();

        return view('admin.dashboard', compact('bookCount', 'userCount', 'recentBooks'));
    })->name('admin.dashboard');

    Route::get('/books', [BookController::class, 'index']);
    Route::get('/books/create', [BookController::class, 'create']);
    Route::post('/books', [BookController::class, 'store']);
    Route::get('/books/{id}/edit', [BookController::class, 'edit']);
    Route::put('/books/{id}', [BookController::class, 'update']);
    Route::delete('/books/{id}', [BookController::class, 'destroy']);

    Route::get('/blog', [BlogPostController::class, 'index']);
    Route::get('/blog/create', [BlogPostController::class, 'create']);
    Route::post('/blog', [BlogPostController::class, 'store']);
    Route::get('/blog/{blogPost}/edit', [BlogPostController::class, 'edit']);
    Route::put('/blog/{blogPost}', [BlogPostController::class, 'update']);
    Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy']);

});

//EMAIL
use App\Http\Controllers\ContactController;

Route::post('/contact/send', [ContactController::class, 'send'])
     ->name('contact.send');

// Auth
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Redirect /login to /admin/login
Route::get('/login', fn() => redirect('/admin/login'));
Route::post('/login', fn() => redirect('/admin/login'));
