@extends('layouts.app')

@section('title', 'Perpustakaan')
@section('body-class', 'page-library')

@section('content')
<section class="library-section">
    <div class="container">
        <div class="library-header">
            <h1 class="library-title">MAU KEMANA? <br>MARI DUDUK DULU</h1>
            <p class="library-subtitle">Terima kasih telah sudi untuk melahap buku-buku ini</p>
        </div>

        <div class="library-grid">
            @forelse ($books as $book)
                <article class="library-card">
                    <div class="library-thumb">
                        <img src="{{ $book->cover_image ? asset('storage/' . $book->cover_image) : asset('images/library/cover.jpg') }}" alt="{{ $book->title }}">
                    </div>
                    <div class="library-body">
                        <h3 class="library-card-title">{{ $book->title }}</h3>
                        <p class="library-author">Penulis : {{ $book->author }}</p>
                        <a href="{{ $book->drive_link }}" target="_blank" class="library-btn">
                            Baca Selengkapnya &gt;&gt;&gt;
                        </a>
                    </div>
                </article>
            @empty
                <p class="text-center text-muted">Belum ada buku tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
