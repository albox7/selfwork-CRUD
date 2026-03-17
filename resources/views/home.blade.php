<x-layout title="Home">

	<div class="container-fluid extra-padding-container">
		<div class="row mb-5">
			<div class="col-12">
				<h1>Coltiviamo ciò che scompare</h1>
			</div>
			<div class="col-12 col-md-6 col-lg-6">
				<p>Siamo una libera associazione di appassionati di botanica, uniti dalla stessa curiosità per il mondo vegetale e dalla volontà di condividerla con chiunque voglia avvicinarsi alla natura con occhi nuovi.</p>
				<p>Crediamo che le piante abbiano molto da insegnarci: pazienza, resilienza, adattamento. Ogni foglia, ogni radice, ogni fiore racconta una storia millenaria di sopravvivenza e bellezza silenziosa.</p>
			</div>
			<div class="col-12 col-md-6 col-lg-6">
				<p>In questo spazio troverai articoli, curiosità e approfondimenti scritti con passione dai membri della nostra comunità. Non siamo scienziati in camice bianco, ma persone comuni che hanno scoperto il piacere di sporcarsi le mani di terra e di non smettere mai di imparare.</p>
				<p><a href="{{ route('register') }}">Unisciti a noi</a>, il giardino è grande e c'è posto per tutti.</p>
			</div>
		</div>

		<div class="row">
			@foreach ($posts as $post)
					<div class="col-12 col-md-4 col-lg-3 mb-4">
						<a href="{{ route('blog.show', $post->id) }}">
							<div class="card h-100">
								<img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}">
								<div class="card-body">
									<h4 class="card-title">{{ $post->title }}</h4>
									<p class="card-text">{{ $post->subtitle }}</p>
								</div>
							</div>
						</a>
					</div>
			@endforeach
		</div>

	</div>
	

</x-layout>