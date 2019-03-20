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
<<<<<<< HEAD
                'name' => 'slide 1',
                'archivo' => '/img/slides/slide_1.jpg'
            ],
            [
                'id' => 2,
                'name' => 'slide 2',
                'archivo' => '/img/slides/slide_1.jpg'
=======
                'name' => 'slide 1'
            ],
            [
                'id' => 2,
                'name' => 'slide 2'
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
            ],
        ];
        return view('home', compact('slides'));
    }
}
