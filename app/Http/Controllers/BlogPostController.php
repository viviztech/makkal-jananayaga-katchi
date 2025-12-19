<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Models\Category;

class BlogPostController extends Controller
{
    // Landing page: show last 3 events
     public function index()
    {
        $posts = Post::published()->paginate(3);
        return view('news.index', compact('posts'));
    }

    // Show single event
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('news.show', compact('post'));

    }

}
