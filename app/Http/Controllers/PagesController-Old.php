<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        return view('pages.about');
    }

    public function ideology(){
        return view('pages.ideology');
    }

    public function history(){
        return view('pages.history');
    }

    public function administration(){
        return view('administration');
    }

    public function elected_members(){
        return view('elected-members');
    }

    public function party_representatives(){
        return view('party-representatives');
    }
    
    public function kalathil_siruthaigal(){
        return view('kalathil-siruthaigal');
    }

    public function not_found(){
        return view('404');
    }

    public function contact(){
        return view('contact');
    }

}