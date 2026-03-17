<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;


class BlogController extends Controller
{
	public function CreatePost() {
		return view('blog.create');
	}
	
	public function StorePost(BlogRequest $request) {

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

	public function ShowPost($id) {
		$post = Blog::findOrFail($id);
		return view('blog.show', ['post' => $post]);
	}
}
