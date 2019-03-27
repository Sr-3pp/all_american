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
                'name' => 'Build with us',
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
        $projects = [
            [
                'id' => 1,
                'name' => 'slide 1',
                'archivo' => '/img/slides/projects/slide_1.jpg'
            ],
            [
                'id' => 2,
                'name' => 'slide 2',
                'archivo' => '/img/slides/projects/slide_2.jpg'
            ],
            [
                'id' => 3,
                'name' => 'slide 3',
                'archivo' => '/img/slides/projects/slide_3.jpg'
            ],
            [
                'id' => 4,
                'name' => 'slide 4',
                'archivo' => '/img/slides/projects/slide_4.jpg'
            ],
            [
                'id' => 5,
                'name' => 'slide 5',
                'archivo' => '/img/slides/projects/slide_3.jpg'
            ],
        ];
        $list = [
            [
                'id' => 1,
                'name' => 'Concept',
                'content' => '/img/slides/projects/slide_4.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Planning',
                'content' => '/img/slides/projects/slide_3.jpg'
            ],
        ];
            return view('home', compact('slides', 'testimonials', 'projects', 'list'));
    }
}
