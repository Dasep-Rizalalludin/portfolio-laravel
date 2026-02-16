@extends('layouts.app')

@section('title', $blogPost->title)

@section('content')
<section class="blog-section">
    <div class="container">
        <div class="blog-header">
            <h1 class="blog-title">{{ $blogPost->title }}</h1>
            <p class="blog-subtitle">{{ $blogPost->author }} - {{ $blogPost->published_at?->format('d F Y') }}</p>
        </div>

        <div class="blog-card">
            <div class="blog-body">
                <div>{!! nl2br(e($blogPost->content)) !!}</div>
            </div>
        </div>
    </div>
</section>
@endsection
