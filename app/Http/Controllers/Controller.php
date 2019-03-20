<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {
        $slides = [
            [
                'id' => 1,
                'name' => 'slide 1',
                'archivo' => '/img/slides/slide_1.jpg'
            ],
            [
                'id' => 2,
                'name' => 'slide 2',
                'archivo' => '/img/slides/slide_1.jpg'
            ],
        ];
        $testimonials = [
            [
                'id' => 1,
                'name' => 'slide 1',
                'archivo' => '/img/default_slide.jpg'
            ],
            [
                'id' => 2,
                'name' => 'slide 2',
                'archivo' => '/img/default_slide.jpg'
            ],
        ];
            return view('home', compact('slides', 'testimonials'));
    }
}
