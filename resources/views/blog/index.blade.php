@extends('layouts.app')

@section('title', 'Blog')
@section('body-class', 'page-blog')

@section('content')
<section class="blog-section">
    <div class="container">
        <div class="blog-header">
            <h1 class="blog-title">BLOG-KU</h1>
            <p class="blog-subtitle">Jangan menyerah nanti kamu lelah</p>
        </div>

        <div class="blog-grid">
            @forelse ($posts as $post)
                <article class="blog-card">
                    <div class="blog-image">
                        <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('images/blog/madilog.jpg') }}" alt="{{ $post->title }}">
                    </div>
                    <div class="blog-body">
                        <h3 class="blog-card-title">{{ $post->title }}</h3>
                        <div class="blog-meta">{{ $post->author }} • {{ $post->published_at?->format('d F Y') }}</div>
                        <p class="blog-excerpt">{{ Str::limit(strip_tags($post->content), 100) }}</p>
                        <a href="{{ route('blog.show', $post) }}" class="blog-btn">Baca Selengkapnya &gt;&gt;&gt;</a>
                    </div>
                </article>
            @empty
                <p class="text-muted">Belum ada artikel.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
