<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthorController;

class AuthorController extends Controller
{
  public function index()
    {
        $featured_post = Post::first();
        $post_list = post::where('published', false)->get();
        return view('authors.index', compact('featured_post','post_list'));
    }



public function show($id)
{
    $author = User::findOrFail($id);

    // Ambil hanya post milik penulis ini yang dipublikasikan
    $posts = $author->posts()
        ->whereNotNull('published_at') // atau sesuaikan dengan kondisi publish
        ->latest()
        ->get();

    return view('authors.show', compact('author', 'posts'));
}


}