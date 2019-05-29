<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;

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
        $slides = Slide::all();
        return $slides;
    }
}
