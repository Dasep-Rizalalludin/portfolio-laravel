@extends('layouts.admin')

@section('title', 'Tambah Buku')
@section('page-title', 'Tambah Buku')

@section('content')
<div class="panel">
    <div class="panel-header">
        <div>
            <h2 class="panel-title">Form Buku</h2>
            <p class="panel-subtitle">Tambahkan buku baru ke koleksi.</p>
        </div>
    </div>

    <form action="{{ url('/admin/books') }}" method="POST" enctype="multipart/form-data" class="form-grid">
        @csrf

        <div>
            <label class="form-label">Judul Buku</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div>
            <label class="form-label">Penulis</label>
            <input type="text" name="author" class="form-control" required>
        </div>

        <div class="form-span">
            <label class="form-label">Link Google Drive</label>
            <input type="url" name="drive_link" class="form-control" required>
        </div>

        <div class="form-span">
            <label class="form-label">Cover Buku</label>
            <input type="file" name="cover_image" class="form-control">
            <small class="text-muted">Format gambar JPG/PNG, maks 2MB.</small>
        </div>

        <div class="form-actions">
            <a href="{{ url('/admin/books') }}" class="btn btn-light">Kembali</a>
            <button class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
