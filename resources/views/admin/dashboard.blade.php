@extends('layouts.admin')

@section('title', 'Admin - Dashboard')
@section('page-title', 'Dashboard')

@section('page-actions')
    <a href="{{ url('/admin/books/create') }}" class="btn btn-primary">Tambah Buku</a>
@endsection

@section('content')
<div class="stat-grid">
    <div class="stat-card">
        <h3>{{ $bookCount }}</h3>
        <p>Total Buku</p>
    </div>
    <div class="stat-card">
        <h3>{{ $userCount }}</h3>
        <p>Pengguna Terdaftar</p>
    </div>
    <div class="stat-card">
        <h3>{{ $recentBooks->count() }}</h3>
        <p>Buku Terbaru (5 terakhir)</p>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h2 class="panel-title">Navigasi Cepat</h2>
            <p class="panel-subtitle">Akses fitur utama admin panel dengan mudah.</p>
        </div>
    </div>

    <div class="quick-actions">
        <a href="{{ url('/admin/books') }}" class="quick-action">
            <div class="fw-semibold">Perpustakaan</div>
            <div class="text-muted small">Kelola daftar buku</div>
        </a>
        <a href="{{ url('/admin/blog') }}" class="quick-action">
            <div class="fw-semibold">Blog</div>
            <div class="text-muted small">Kelola artikel blog</div>
        </a>
    </div>
</div>

<div class="panel">
    <div class="panel-header">
        <div>
            <h2 class="panel-title">Buku Terbaru</h2>
            <p class="panel-subtitle">Update terakhir pada koleksi perpustakaan.</p>
        </div>
        <a href="{{ url('/admin/books') }}" class="btn btn-outline-secondary btn-sm">Lihat Semua</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Drive</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($recentBooks as $book)
                <tr>
                    <td class="fw-semibold">{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <a href="{{ $book->drive_link }}" target="_blank" class="text-decoration-none">Lihat</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted py-4">Belum ada buku.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
