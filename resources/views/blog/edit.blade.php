<x-layout title="Modifica post">

	<div class="container-fluid extra-padding-container">

		@if ($errors->any())
			<div class="row">
				<div class="col-12 col-md-8 col-lg-6">
					<div class="alert alert-danger">
						<ul class="error-list">
							@foreach ($errors->all() as $error)
								<li>{!! $error !!}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		@endif

		<div class="row">
			<div class="col-12 col-md-8 col-lg-6">
				<form action="{{ route('blog.update', $post->id) }}" method="POST" enctype="multipart/form-data">
					
					@csrf
					@method('PUT')

					<div class="mb-3">
						<label for="title" class="form-label">Titolo</label>
						<input name="title" value="{{ old('title', $post->title) }}" type="text" class="form-control" id="title">
					</div>

					<div class="mb-3">
						<label for="subtitle" class="form-label">Sottotitolo</label>
						<input name="subtitle" value="{{ old('subtitle', $post->subtitle) }}" type="text" class="form-control" id="subtitle">
					</div>

					<div class="mb-3">
						<div class="row">
							<div class="col-auto">
								<img class="img-thumb" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
							</div>
							<div class="col">
								<label for="image" class="form-label">Immagine</label>
								<input name="image" type="file" class="form-control" id="image">
							</div>		
						</div>
					</div>
					
					<div class="mb-5">
						<label for="article" class="form-label">Articolo</label>
						<textarea name="article" class="form-control" id="article" cols="30" rows="6">{{ old('article', $post->article) }}</textarea>
					</div>
					
					<div class="d-flex gap-2">
						<button type="submit" class="btn btn-primary-custom">Salva modifiche</button>
						<a href="/" class="btn btn-primary-cancel">Annulla</a>
					</div>

				</form>
			</div>
		</div>
	</div>

</x-layout>