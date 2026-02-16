@extends('layouts.app')

@section('title', 'Welcome')
@section('body-class', 'page-welcome')

@section('content')
<div class="nexora-layout">
    <div class="grain-overlay"></div>

    <nav class="navbar-minimal">
        <div class="nav-left">
            <span class="brand-name">Bung Dasep</span>
        </div>
    </nav>

    <section class="welcome-hero">
        <div class="container hero-content">
            <h1 class="welcome-main-title">WELCOME</h1>
            
            <p class="welcome-desc">
                <span class="desc-left">Website ini lahir dari jeda—</span>
                <span class="desc-right">antara lelah, ingin tahu, dan keinginan untuk tetap hidup.</span>
            </p>

            <div class="welcome-actions">
                <a href="{{ url('/home') }}" class="btn-masuk">Mulai</a>
            </div>

            <div class="hero-illustration">
                </div>

            <div class="trusted-by">
                <p>Ruang kecil: Tempat Bertahan Dan Tumbuh.</p>
            </div>
        </div>
    </section>
</div>
@endsection