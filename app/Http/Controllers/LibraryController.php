<?php

namespace App\Http\Controllers;

use App\Models\Book;

class LibraryController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('library.index', compact('books'));
    }
}
