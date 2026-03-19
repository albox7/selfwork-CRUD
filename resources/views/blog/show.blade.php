<x-layout title="{{ $post->title }}">

	{{-- @dd($post->title); --}}

	<div class="container-fluid extra-padding-container">
		
		<div class="row">
			<div class="col mb-5">
				
				@if(Auth::id() == $post->user_id)
					
					<div class="d-flex gap-2">
						<button type="button" class="btn btn-danger-custom" data-bs-toggle="modal" data-bs-target="#deleteModal">
        					Elimina
    					</button>
						<a href="{{ route('blog.edit', $post->id) }}" class="btn btn-primary-custom">Modifica post</a>
					</div>

					{{-- Modale di conferma cancellazione START --}}
					<div class="modal fade" id="deleteModal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h3 class="modal-title">
										Elimina post
									</h3>
									<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
								</div>
								<div class="modal-body">
									<p>
										Vuoi eliminare questo post? 
										<br>
										Se lo elimini non sarà più recuperabile.
									</p>
								</div>
								<div class="modal-footer">
									
									<form action="{{ route('blog.delete', $post->id) }}" method="POST">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger-custom">
											Elimina post
										</button>
									</form>
									
									<button type="button" class="btn btn-primary-cancel" data-bs-dismiss="modal">
										Annulla
									</button>

								</div>
							</div>
						</div>
					</div>
					{{-- Modale END --}}

				@endif
			</div>
		</div>
		
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 post">
				<h1>{{ $post->title }}</h1>
				<h3>{{ $post->subtitle }}</h3>
				<p>{{ $post->article }}</p>
				<small class="d-block mb-5">Postato da {{ $post->user->name }}</small>
				<a href="{{ '/' }}">&lsaquo;&nbsp; Indietro</a>
			</div>
			<div class="col-12 col-md-8 col-lg-6">
				<img class="img-fluid img-post" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
			</div>
		</div>
	</div>

</x-layout>