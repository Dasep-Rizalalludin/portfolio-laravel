@extends('layouts.admin')

@section('title', 'Edit Buku')
@section('page-title', 'Edit Buku')

@section('content')
<div class="panel">
    <div class="panel-header">
        <div>
            <h2 class="panel-title">Perbarui Buku</h2>
            <p class="panel-subtitle">Ubah detail buku yang sudah ada.</p>
        </div>
    </div>

    <form action="{{ url('/admin/books/' . $book->id) }}" method="POST" enctype="multipart/form-data" class="form-grid">
        @csrf
        @method('PUT')

        <div>
            <label class="form-label">Judul Buku</label>
            <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
        </div>

        <div>
            <label class="form-label">Penulis</label>
            <input type="text" name="author" class="form-control" value="{{ $book->author }}" required>
        </div>

        <div class="form-span">
            <label class="form-label">Link Google Drive</label>
            <input type="url" name="drive_link" class="form-control" value="{{ $book->drive_link }}" required>
        </div>

        <div class="form-span">
            <label class="form-label">Cover Buku</label>
            <input type="file" name="cover_image" class="form-control">
            @if ($book->cover_image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" style="max-height: 120px;" class="rounded">
                </div>
            @endif
        </div>

        <div class="form-actions">
            <a href="{{ url('/admin/books') }}" class="btn btn-light">Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection
