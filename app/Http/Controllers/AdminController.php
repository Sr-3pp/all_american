<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slides;
use Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('auth/panel');
    }

    public function getSlides(){
        $slides = Slides::all();
        return $slides;
    }

    public function saveSlides(Request $r){
        $data = $r->all();
        if ($r->hasFile('archivo')) {
            $data['archivo'] = $r->archivo->store('slides');
        }
        $slide = Slides::create($data);
        
        return $slide;
    }
}
