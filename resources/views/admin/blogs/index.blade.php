@extends('layouts.admin')

@section('title', 'Admin - Blog')
@section('page-title', 'Manajemen Blog')

@section('page-actions')
    <a href="{{ url('/admin/blog/create') }}" class="btn btn-primary">Tambah Artikel</a>
@endsection

@section('content')
<div class="panel">
    <div class="panel-header">
        <div>
            <h2 class="panel-title">Daftar Artikel</h2>
            <p class="panel-subtitle">Kelola artikel blog yang tampil di halaman publik.</p>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tanggal</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td class="fw-semibold">{{ $post->title }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->published_at?->format('d M Y') }}</td>
                    <td class="text-end">
                        <a href="{{ url('/admin/blog/' . $post->id . '/edit') }}" class="btn btn-outline-primary btn-sm">Edit</a>
                        <form action="{{ url('/admin/blog/' . $post->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin hapus artikel ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">Belum ada artikel.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
