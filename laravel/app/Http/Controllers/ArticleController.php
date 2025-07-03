<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class ArticleController extends Controller
{
    public function index()
    {
        $featured_post = Post::first();
        $post_list = post::where('published', true)->get();
        return view('articles.index', compact('post_list'));
    }
}
