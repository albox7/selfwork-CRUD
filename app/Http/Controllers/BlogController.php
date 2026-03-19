<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogUpdateRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;



class BlogController extends Controller
{
	public function CreatePost() {
		return view('blog.create');
	}
	
	public function StorePost(BlogRequest $request) {

		//dd($request);

		$imagePath = null;

		if ($request->hasFile('image')) {
			$imagePath = $request->file('image')->store('media', 'public');
		}

		Blog::create([
			'title' => $request->title,
			'subtitle' => $request->subtitle,
			'image' => $imagePath,
			'article' => $request->article,
			'user_id' => Auth::id(),
		]);

		return redirect()->route('blog.create')->with('message', 'Post inserito con successo!');
	}

	// Mostra tutti i post
	public function ShowPost($id) {
		$post = Blog::findOrFail($id);
		return view('blog.show', ['post' => $post]);
	}

	// Mostra il post specifico pronto per la modifica
	public function EditPost($id) {
		$post = Blog::findOrFail($id);
		return view('blog.edit', ['post' => $post]);
	}

	// Modifica il post
	public function UpdatePost(BlogUpdateRequest $request, $id) {
		
		$post = Blog::findOrFail($id);

		//dd($post);

		$imagePath = $post->image;

		if ($request->hasFile('image')) {
			Storage::disk('public')->delete($post->image);
			$imagePath = $request->file('image')->store('media', 'public');
		}

		$post->update([
			'title' => $request->title,
			'subtitle' => $request->subtitle,
			'image' => $imagePath,
			'article' => $request->article,
		]);

		return redirect()->route('home')->with('message', 'Post aggiornato con successo!');
	}

	// Cancella il post
	public function DeletePost($id) {
		$post = Blog::findOrFail($id);

		//dd($post);

		Storage::disk('public')->delete($post->image);
		$post->delete();
		return redirect()->route('home')->with('message', 'Post eliminato con successo!');
	}
}
