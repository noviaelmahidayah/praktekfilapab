<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function detail($slug){
     $post = Post::where('slug', $slug)->firstOrFail();
    return view('post.detail',['post' => $post]);
    }

    public function show($id)
    {
    $post = Post::findOrFail($id);
    return view('Post.detail', compact('post'));
    }

}

