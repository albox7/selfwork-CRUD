<!DOCTYPE html>
<html lang="it">
	
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>{{ $title ?? 'UNIONE BOTANICA - Unità in Armonia' }}</title>
		<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
		@vite('resources/css/app.css')
	</head>

	<body>


		{{-- NAVBAR --}}
		<nav id="navbar" class="navbar navbar-expand-lg">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{ route('home') }}">
					<img src="{{asset('logo-unione-botanica.svg')}}" alt="Unione Botanica - Diversità in armonia">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav ms-auto">
						
						<li class="nav-item">
							<a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" {{ request()->routeIs('home') ? 'aria-current="page"' : '' }} href="{{ route('home') }}">Home</a>
						</li>

						<li class="nav-item">
        					<a class="nav-link {{ request()->routeIs('blog.create') ? 'active' : '' }}" href="{{ route('blog.create') }}">Nuovo post</a>
    					</li>

						@auth
							<li class="nav-item">
								<form action="{{ route('logout') }}" method="POST">
									@csrf
									<button type="submit" class="btn nav-link">Esci</button>
								</form>
							</li>
						@endauth

						@guest
    						<li class="nav-item">
        						<a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" {{ request()->routeIs('login') ? 'aria-current="page"' : '' }} href="{{ route('login') }}">Accedi</a>
    						</li>
    						<li class="nav-item">
        						<a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}" {{ request()->routeIs('register') ? 'aria-current="page"' : '' }} href="{{ route('register') }}">Registrati</a>
    						</li>
						@endguest



					</ul>
				</div>
			</div>
		</nav>



		{{-- CONTENUTO --}}
		<main>
			{{ $slot }}
		</main>



		{{-- FOOTER --}}
		<footer>
			&copy; {{ date('Y') }} - UNIONE BOTANICA - Unità in Armonia
		</footer>

		@vite('resources/js/app.js')
	</body>
</html>
