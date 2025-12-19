<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Stephenjude\FilamentBlog\Models\Post;
use Stephenjude\FilamentBlog\Models\Author;
use Stephenjude\FilamentBlog\Models\Category;


class HomeController extends Controller
{
    public function index(){

        $events = Event::latest('event_date')->take(8)->get();
        $posts = Post::published()->take(8)->get();
        return view('home.index', compact('events', 'posts'));
    }

    public function index_one_page(){
        return view('home.index-one-page');
    }

    public function index2(){
        return view('home.index2');
    }

    public function index2_one_page(){
        return view('home.index2-one-page');
    }

    public function index3(){
        return view('home.index3');
    }

    public function index3_one_page(){
        return view('home.index3-one-page');
    }

    public function index_dark(){
        return view('home.index-dark');
    }
}