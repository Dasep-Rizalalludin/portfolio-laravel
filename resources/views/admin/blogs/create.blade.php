@extends('layouts.admin')

@section('title', 'Tambah Artikel')
@section('page-title', 'Tambah Artikel')

@section('content')
<div class="panel">
    <div class="panel-header">
        <div>
            <h2 class="panel-title">Form Artikel</h2>
            <p class="panel-subtitle">Tulis artikel baru untuk blog.</p>
        </div>
    </div>

    <form action="{{ url('/admin/blog') }}" method="POST" enctype="multipart/form-data" class="form-grid">
        @csrf

        <div>
            <label class="form-label">Judul</label>
            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="form-label">Penulis</label>
            <input type="text" name="author" class="form-control" value="{{ old('author') }}" required>
            @error('author')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="form-label">Tanggal Publikasi</label>
            <input type="date" name="published_at" class="form-control" value="{{ old('published_at') }}" required>
            @error('published_at')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control">
            @error('image')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-span">
            <label class="form-label">Konten</label>
            <textarea name="content" rows="6" class="form-control" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ url('/admin/blog') }}" class="btn btn-light">Kembali</a>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
