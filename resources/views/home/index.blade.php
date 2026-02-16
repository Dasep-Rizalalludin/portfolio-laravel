@extends('layouts.app')

@section('body-class', 'page-home')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">

            <!-- TEXT -->
            <div class="col-lg-6 hero-text">
                <h1 class="hero-name">
                    DASEP<br>RIZALLUDIN
                </h1>

                <p class="hero-desc">
                    Ia lahir di Sukabumi 8 Juli. Seorang lelaki beruntung yang kalo apa-apa suka sendiri, tapi kenyataan nya sering merepotkan orang lain. Hehe... Dalam menjalani hidupnya yang jauh dari orang tua. Baginya itu tidak masalah. Selagi bisa bernafas, dan masih bisa melihat senyum ibu. Sungguh hidup nya tetap baik-baik saja. Tidak bisa setebal skripsi menceritakan kisahnya, yang terpenting dia tidak tenggelam di lautan matamu. Oh iya, dia pun tidak akan berhenti di sini, dia akan selalu menulis hal yang memang seharusnya tidak di pikirkan. Dan mohon maaf jika bahasanya tidak baku seperti surat ke para pejabat, hehe... Jadi seperti itulah kira-kiranya. Oke deh, Terima kasih sudah berkunjung. Sampai jumpa di takdir selanjutnya.
                </p>

                <div class="hero-buttons">
                    <a href="{{ url('/about') }}" class="btn btn-hero-primary me-3">About Me</a>
                    <a href="{{ url('/blog') }}" class="btn btn-hero-secondary">Blog</a>
                </div>
            </div>

            <!-- IMAGE -->
            <div class="col-lg-6 text-center hero-image">
                <img src="{{ asset('images/fp.png') }}" alt="Profile">
            </div>

        </div>
    </div>
</section>
@endsection
