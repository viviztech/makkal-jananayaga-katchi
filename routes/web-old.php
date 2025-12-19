<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\BlogPostController;
use App\Livewire\MemberJoinForm;
use App\Livewire\CreatePost;
use App\Models\Media;



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localize' ]
    ],
    function() {

        Route::get('/', function() {
            $latest_news = Media::orderBy('event_date', 'desc')->where('category_id', 3)->take(6)->get();
            $press_releases = Media::orderBy('event_date', 'desc')->where('category_id', 1)->take(6)->get();
            $events = Media::orderBy('event_date', 'desc')->where('category_id', 2)->take(6)->get();
            $interviews = Media::orderBy('event_date', 'desc')->where('category_id', 4)->take(6)->get();
            return view('welcome', compact('latest_news', 'press_releases', 'events', 'interviews'));
        });

        Route::get('test', function(){
            return view('pages.test');
        });
        // Route::get('/', [HomeController::class, 'index'])
        //      ->name('index');

        Route::get('/events', [EventsController::class, 'index'])
            ->name('events');
            
        Route::get('/events/{slug}', [EventsController::class, 'show'])
            ->name('events.show');

        Route::get('/ideology', [PagesController::class, 'ideology'])
            ->name('ideology');

        Route::get('/history', [PagesController::class, 'history'])
            ->name('history');
    }

);




