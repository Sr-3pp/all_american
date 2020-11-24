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
<<<<<<< HEAD
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
=======
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
>>>>>>> 88a2655ce9ffa1c1a090bc2b2731a8e31feb061b
    }
}
