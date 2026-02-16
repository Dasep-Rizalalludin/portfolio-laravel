@extends('layouts.admin')

@section('title', 'Admin - Buku')
@section('page-title', 'Kelola Buku')

@section('page-actions')
    <a href="{{ url('/admin/books/create') }}" class="btn btn-primary">Tambah Buku</a>
@endsection

@section('content')
<div class="panel">
    <div class="panel-header">
        <div>
            <h2 class="panel-title">Daftar Buku</h2>
            <p class="panel-subtitle">Kelola koleksi buku yang tampil di halaman perpustakaan.</p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Cover</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Link</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <td>
                        @if ($book->cover_image)
                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" style="height: 48px; width: 48px; object-fit: cover;" class="rounded">
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </td>
                    <td class="fw-semibold">{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        <a href="{{ $book->drive_link }}" target="_blank" class="text-decoration-none">Lihat Drive</a>
                    </td>
                    <td class="text-end">
                        <a href="{{ url('/admin/books/' . $book->id . '/edit') }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ url('/admin/books/' . $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm"
                                onclick="return confirm('Yakin hapus buku ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">Belum ada buku.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
