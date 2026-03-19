<?php

namespace App\Http\Controllers;
use App\Models\Blog;

class PublicController extends Controller
{
	public function Home() {

		// Mostra i post (l'ltimo inserito per primo)
		$posts = Blog::latest()->get();
		
		// Ritorna la vista e passa i post dentro a $posts
		return view('home', ['posts' => $posts]);
	}
}
