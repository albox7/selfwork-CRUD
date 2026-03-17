<x-layout title="{{ $post->title }}">

	<div class="container-fluid extra-padding-container">
		<div class="row">
			<div class="col-12 col-md-8 col-lg-6 post">
				<h1>{{ $post->title }}</h1>
				<h3>{{ $post->subtitle }}</h3>
				<p>{{ $post->article }}</p>
				<a href="{{ '/' }}">&lsaquo;&nbsp; Indietro</a>
			</div>
			<div class="col-12 col-md-8 col-lg-6">
				<img class="img-fluid img-post" src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
			</div>
		</div>
	</div>

</x-layout>