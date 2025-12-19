<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Media;

class EventsController extends Controller
{
    // Landing page: show last 3 events
     public function index()
    {
        $medias = Media::orderBy('event_date', 'desc')->where('category_id', 2)->get();
        return view('events.index', compact('medias'));
    }

    // Show single event
    public function show($slug)
    {
        $event = Media::where('slug', $slug)->firstOrFail();
        return view('events.show', compact('event'));

    }
}