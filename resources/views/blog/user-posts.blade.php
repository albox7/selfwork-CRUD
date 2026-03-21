<x-layout title="Post di {{ $user->name }}">

	<div class="container-fluid extra-padding-container">

        <div class="row mb-5">
			<div class="col-12">
				<h1>Tutti i post di {{ $user->name }}</h1>
			</div>
		</div>

		<div class="row">
			
            {{-- {{ dd($user->posts) }} --}}

			@foreach ($user->posts as $post)
				<div class="col-12 col-md-4 col-lg-3 mb-4">
					<div class="card h-100 justify-content-between">
						<a href="{{ route('blog.show', $post->id) }}">
							<img class="img-fluid" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
							<div class="card-body d-flex flex-column">
								<h4 class="card-title">{{ $post->title }}</h4>
								<p class="card-text">{{ $post->subtitle }}</p>
							</div>
						</a>
						<div class="card-footer">
							<small>Postato da {{ $user->name }}</small>
						</div>
					</div>
				</div>
			@endforeach

		</div>
	</div>

</x-layout>