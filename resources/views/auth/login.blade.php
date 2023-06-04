<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link href="{{ asset('storage/node_modules/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('storage/css/Login.css') }}" rel="stylesheet">
</head>
<body>
	<div class="wrapper"> <!-- Fixes Footer to Bottom -->
		<!-- Nav -->
		<header>

		</header>
		<!-- Content -->
		<main>
			<div class="parallax-bg-img" style="background-image: url(' {{ asset('storage/res/img/bg/BG.png') }} ');" id="content-container">
				<div class="container-fluid" id="login-form-container">
					<div class="col" id="form-content-container">
						<div class="row">
							<img src="{{ asset('storage/res/img/logo/cembo-logo.png') }}" id="logo">
						</div>
						<form action="{{ route('login') }}" method="POST" autocomplete="off">
						@csrf
						<div class="row" id="login-field-container">
							<div class="col">
		
								<div class="row" id="field">
									<input type="text" name="auth" placeholder="Barangay I.D.">
								</div>
								<div class="row" id="field">
									<input type="password" name="password" placeholder="Password">
								</div>
								@if ($errors->any())
								<div class="text-danger">
									@foreach ($errors->all() as $error)
									{{ $error }}
									@endforeach
								</div>
								@endif
							</div>
						</div>
						<div class="row">
							<div class="row" id="btn-container">
								<div class="col">
									<button type="submit" id="login-btn">Login</button>
								</div>
								<div class="col">
									<button type="button" id="register-btn"><a href="/register" style="text-decoration: none;color: white;">Register</a></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Footer -->
		<footer class="page-footer">

		</footer>
	</div>
	<script src="{{ asset('storage/js/Login.js') }}"></script>
	<script src="{{ asset('storage/node_modules/@popperjs/core/dist/umd/popper.min.js') }}"></script>
	<script src="{{ asset('storage/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>

</html>