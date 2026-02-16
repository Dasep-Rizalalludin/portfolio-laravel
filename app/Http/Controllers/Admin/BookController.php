<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'drive_link' => 'required|url',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['title', 'author', 'drive_link']);

        if ($request->hasFile('cover_image')) {
            $data['cover_image'] = $request->file('cover_image')->store('book-covers', 'public');
        }

        Book::create($data);

        return redirect('/admin/books')->with('success', 'Buku berhasil ditambahkan');
    }
    
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'drive_link' => 'required|url',
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $book = Book::findOrFail($id);
        $data = $request->only(['title', 'author', 'drive_link']);

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('book-covers', 'public');
        }

        $book->update($data);

        return redirect('/admin/books')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }
        $book->delete();

        return redirect('/admin/books')->with('success', 'Buku berhasil dihapus');
    }
}
