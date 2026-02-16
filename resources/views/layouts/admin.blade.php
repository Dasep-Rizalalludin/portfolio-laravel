<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title', 'Admin Dashboard')</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
	<div class="admin-shell">
		<aside class="admin-sidebar d-none d-lg-flex">
			<div>
				<div class="admin-brand">Lelaki Dan Hal -Hal...</div>
				<div class="admin-badge">Website Control</div>
			</div>

			<nav class="admin-nav">
				<a href="{{ url('/admin') }}" class="{{ request()->is('admin') ? 'active' : '' }}">Dashboard</a>
				<a href="{{ url('/admin/books') }}" class="{{ request()->is('admin/books*') ? 'active' : '' }}">Manajemen Buku</a>
				<a href="{{ url('/admin/blog') }}" class="{{ request()->is('admin/blog*') ? 'active' : '' }}">Manajemen Blog</a>
				<a href="{{ url('/home') }}">Lihat Website</a>
			</nav>

			<div class="admin-user">
				<div class="fw-semibold">{{ auth()->user()->name ?? 'Admin' }}</div>
				<div class="text-muted small">{{ auth()->user()->email ?? 'admin@site.local' }}</div>
				<form method="POST" action="{{ url('/logout') }}" class="mt-3">
					@csrf
					<button class="btn btn-light btn-sm">Logout</button>
				</form>
			</div>
		</aside>

		<div class="offcanvas offcanvas-start admin-offcanvas d-lg-none" tabindex="-1" id="adminMenu" aria-labelledby="adminMenuLabel">
			<div class="offcanvas-header">
				<div>
					<div class="admin-brand" id="adminMenuLabel">Lelaki Dan Hal -Hal...</div>
					<div class="admin-badge">Website Control</div>
				</div>
				<button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
			</div>
			<div class="offcanvas-body">
				<nav class="admin-nav">
					<a href="{{ url('/admin') }}" class="{{ request()->is('admin') ? 'active' : '' }}">Dashboard</a>
					<a href="{{ url('/admin/books') }}" class="{{ request()->is('admin/books*') ? 'active' : '' }}">Manajemen Buku</a>
					<a href="{{ url('/admin/blog') }}" class="{{ request()->is('admin/blog*') ? 'active' : '' }}">Manajemen Blog</a>
					<a href="{{ url('/home') }}">Lihat Website</a>
				</nav>

				<div class="admin-user mt-4">
					<div class="fw-semibold">{{ auth()->user()->name ?? 'Admin' }}</div>
					<div class="text-muted small">{{ auth()->user()->email ?? 'admin@site.local' }}</div>
					<form method="POST" action="{{ url('/logout') }}" class="mt-3">
						@csrf
						<button class="btn btn-light btn-sm">Logout</button>
					</form>
				</div>
			</div>
		</div>

		<div class="admin-main">
			<header class="admin-topbar">
				<div class="admin-topbar-mobile w-100 d-lg-none">
					<div class="d-flex align-items-center justify-content-between">
						<div>
							<div class="admin-brand">Lelaki Dan Hal -Hal...</div>
							<div class="admin-badge">Website Control</div>
						</div>
						<button class="btn admin-menu-toggle" type="button" data-bs-toggle="offcanvas" data-bs-target="#adminMenu" aria-controls="adminMenu" aria-label="Buka menu">
							<span class="admin-hamburger" aria-hidden="true"></span>
						</button>
					</div>
				</div>

				<div class="admin-topbar-desktop d-none d-lg-flex align-items-center justify-content-between w-100">
					<div>
						<h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
						<div class="page-meta">{{ now()->format('d M Y') }}</div>
					</div>
					<div class="d-flex align-items-center gap-2">
						@yield('page-actions')
					</div>
				</div>
			</header>

			<main class="admin-content">
				<div class="admin-content-actions d-lg-none">
					@yield('page-actions')
				</div>
				@if (session('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
				@endif
				@yield('content')
			</main>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
