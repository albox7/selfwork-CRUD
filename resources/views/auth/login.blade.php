

<x-layout title="Accedi">
	
	<div class="container-fluid extra-padding-container">
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6">
				<h1>Accedi</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-8 col-lg-4 mt-4 mb-5">
				<form method="POST" action="{{route('login')}}">
					@csrf
					
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
					</div>
					
					<div class="mb-4">
						<label for="password" class="form-label">Password</label>
						<input type="password" name="password" class="form-control" id="password">
					</div>
					
					<div class="mt-4">
						<button type="submit" class="btn btn-primary">Accedi</button>
					</div>

				</form>
			</div>
		</div>
	</div>

</x-layout>