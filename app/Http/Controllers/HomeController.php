<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = [
            [
                'id' => 1,
                'name' => 'slide 1'
            ],
            [
                'id' => 2,
                'name' => 'slide 2'
            ],
        ];
        return view('home', compact('slides'));
    }
}
