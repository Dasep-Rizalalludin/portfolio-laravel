<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogPostController extends Controller
{
    public function index()
    {
        $posts = BlogPost::orderByDesc('published_at')->get();

        return view('admin.blogs.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'content' => ['required', 'string'],
            'author' => ['required', 'string', 'max:120'],
            'published_at' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('blog', 'public');
        }

        BlogPost::create($data);

        return redirect('/admin/blog')->with('status', 'Artikel berhasil ditambahkan.');
    }

    public function edit(BlogPost $blogPost)
    {
        return view('admin.blogs.edit', compact('blogPost'));
    }

    public function update(Request $request, BlogPost $blogPost)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:160'],
            'content' => ['required', 'string'],
            'author' => ['required', 'string', 'max:120'],
            'published_at' => ['required', 'date'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            if ($blogPost->image_path) {
                Storage::disk('public')->delete($blogPost->image_path);
            }
            $data['image_path'] = $request->file('image')->store('blog', 'public');
        }

        $blogPost->update($data);

        return redirect('/admin/blog')->with('status', 'Artikel berhasil diperbarui.');
    }

    public function destroy(BlogPost $blogPost)
    {
        if ($blogPost->image_path) {
            Storage::disk('public')->delete($blogPost->image_path);
        }

        $blogPost->delete();

        return redirect('/admin/blog')->with('status', 'Artikel berhasil dihapus.');
    }
}
