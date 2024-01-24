<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Laravel</title>

		{{-- Volt CSS --}}
		<link type="text/css" href="{{ asset('theme/volt.css') }}" rel="stylesheet">

		{{-- Bootstrap icons --}}
		<link type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
		
	</head>

	<body>

		<header class="header-global">
			<nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary pt-4 navbar-dark">
				<div class="container position-relative">
					<div class="d-flex align-items-center ms-auto">
						<a href="{{ route('login') }}" class="btn btn-outline-white d-inline-flex align-items-center me-md-3">
							<i class="icon icon-xs me-2 bi bi-arrow-right-square"></i>
							Login
						</a>
					</div>
				</div>
			</nav>
		</header>

		<main>

			<section class="section-header overflow-hidden pt-12 pt-lg-12 pb-10 pb-lg-10 bg-primary text-white">
				<div class="container">
					<div class="row">
						<div class="col-12 text-center">
							<h2 class="lead fw-normal text-muted mb-5">Welcome to</h2>
							<h1 class="fw-bolder">Quick Customer Survey Responses</h1>
						</div>
					</div>
				</div>
			</section>

		</main>

		{{-- Core --}}
		<script src="{{ asset('vendor/@popperjs/popper.min.js') }}"></script>
		<script src="{{ asset('vendor/bootstrap/bootstrap.min.js') }}"></script>

		{{-- Smooth scroll --}}
		<script src="{{ asset('vendor/smooth-scroll/smooth-scroll.min.js') }}"></script>

		{{-- Volt JS --}}
		<script src="{{ asset('theme/volt.js') }}"></script>

	</body>

</html>