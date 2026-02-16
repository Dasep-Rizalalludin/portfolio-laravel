@extends('layouts.app')

@section('title', 'About')
@section('body-class', 'page-about')

@section('content')
<section class="about-section">
	<div class="container">
		<div class="row g-4 align-items-center">
			<div class="col-lg-7">
				<div class="about-card">
					<h2 class="about-title">{{ $content?->about_title ?? 'Tentang Saya' }}</h2>
					<p class="about-desc">
						aku masih orang yang sama—yang sedang belajar berdamai dengan sunyi dan riuh di kepala. kadang kuat, kadang juga pura-pura kuat, hahaha. o ya, aku hanya ingin menikmati kopi dengan tenang yang perlahan dingin dan menyelesaikan hal-hal yang tertunda. btw maaf jika tulisan ini terasa berantakan, ya… begitulah isi kepalaku—tidak rapi, tapi nyata.
					</p>
				</div>

				<div class="about-actions">
					<a href="{{ asset('cv/DASEP RIZALALLUDIN_CV.pdf') }}" class="btn about-btn-primary" download>Download CV</a>
					<a href="#" class="btn about-btn-secondary">Gallery</a>
					<a href="{{ url('/contact') }}" class="btn about-btn-secondary">Contact</a>
				</div>

				<div class="about-education">
					<h3 class="about-subtitle">RIWAYAT PENDIDIKAN</h3>
					<ul class="edu-list">
						<li>SDN Cisarua</li>
						<li>SMPN 1 Kalapanunggal</li>
						<li>SMK Nuurul Bayan</li>
						<li>Universitas Nusa Putra</li>
					</ul>
				</div>
			</div>

			<div class="col-lg-5">
				<div class="about-list-grid">
					<div>
						<h3 class="about-subtitle">HOBI</h3>
						<ul class="edu-list">
							<li>Membaca</li>
							<li>Menulis</li>
							<li>Berfilsafat</li>
						</ul>
					</div>

					<div>
						<h3 class="about-subtitle">MAKANAN FAVORIT</h3>
						<ul class="edu-list">
							<li>Apa saja asal masakan ibu</li>
						</ul>
					</div>

					<div>
						<h3 class="about-subtitle">WISH LIST</h3>
						<ul class="edu-list">
							<li>Melahap buku setiap hari</li>
							<li>Ngopi dengan berani</li>
							<li>menggulingkah rezim</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
