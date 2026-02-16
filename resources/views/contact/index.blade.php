@extends('layouts.app')

@section('title', 'Contact')
@section('body-class', 'page-contact')

@section('content')
@if(session('success'))
<div id="successPopup" class="success-popup" role="alert" aria-live="polite">
	<div class="success-popup-card">
		<div class="success-popup-title">Berhasil</div>
		<div class="success-popup-message">{{ session('success') }}</div>
		<button type="button" id="successPopupClose" class="btn btn-primary success-popup-btn">OK</button>
	</div>
</div>
<script>
	(function () {
		const popup = document.getElementById('successPopup');
		if (!popup) return;
		const closeBtn = document.getElementById('successPopupClose');
		const removePopup = () => popup.remove();

		popup.addEventListener('click', (event) => {
			if (event.target === popup) {
				removePopup();
			}
		});

		if (closeBtn) {
			closeBtn.addEventListener('click', removePopup);
		}

		setTimeout(removePopup, 3000);
	})();
</script>
@endif

<section class="contact-section">
	<div class="container">
		<div class="row g-4 align-items-start">
			<div class="col-lg-6">
				<div class="contact-card">
					<h1 class="contact-title">Hubungi Dasep!</h1>
					<form class="contact-form" method="POST" action="{{ route('contact.send') }}">
						@csrf

						<input name="name" type="text" class="contact-input" placeholder="Nama" required />

						<input name="email" type="email" class="contact-input" placeholder="Email" required />

						<textarea name="message" rows="4" class="contact-textarea" placeholder="Pesan" required></textarea>

						<button type="submit" class="contact-btn">Kirim</button>
					</form>

				</div>
			</div>

			<div class="col-lg-6">
				<div class="contact-social">
					<h2 class="contact-social-title">Media Sosial</h2>
					<div class="social-grid">

    <a href="https://wa.me/6283878865042" target="_blank" class="social-icon">
        <i class="fa-brands fa-whatsapp"></i>
    </a>

    <a href="https://instagram.com/username" target="_blank" class="social-icon">
        <i class="fa-brands fa-instagram"></i>
    </a>

	<a href="https://instagram.com/username" target="_blank" class="social-icon">
        <i class="fa-brands fa-tiktok"></i>
    </a>

    <a href="https://facebook.com/username" target="_blank" class="social-icon">
        <i class="fa-brands fa-facebook-f"></i>
    </a>

    <a href="https://linkedin.com/in/username" target="_blank" class="social-icon">
        <i class="fa-brands fa-linkedin-in"></i>
    </a>

</div>


					</div>
					<div class="contact-info">
						<div>daseprizalreal@gmail.com</div>
						<div>+62 838 7886 5042</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
