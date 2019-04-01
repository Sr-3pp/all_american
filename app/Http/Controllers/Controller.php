<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

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
        $services = [
            [
                'id' => 1,
                'name' => 'Design and Planning',
                'icon' => 'planning',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_1.jpg'
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => 'Preparation',
                'icon' => 'preparation',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg'
                    ]
                ]
            ],
            [
                'id' => 3,
                'name' => 'Welding',
                'icon' => 'welding',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_1.jpg'
                    ]
                ]
            ],
            [
                'id' => 4,
                'name' => 'Finishes',
                'icon' => 'polish',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg'
                    ]
                ]
            ],
            [
                'id' => 5,
                'name' => 'Painting',
                'icon' => 'painting',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_1.jpg'
                    ]
                ]
            ],
            [
                'id' => 6,
                'name' => 'Delivery',
                'icon' => 'delivery',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg'
                    ]
                ]
            ]
        ];
        $news = [
            [
                'title' => 'WORKING ON NEW RAILS',
                'fecha' => 'Febraury 05, 2019',
                'prev' =>   'We work in a professional and effective way, to meet the expectations of each project.'
            ],
            [
                'title' => 'WORKING ON NEW RAILS',
                'fecha' => 'Febraury 05, 2019',
                'prev' =>   'We work in a professional and effective way, to meet the expectations of each project.'
            ],
            [
                'title' => 'WORKING ON NEW RAILS',
                'fecha' => 'Febraury 05, 2019',
                'prev' =>   'We work in a professional and effective way, to meet the expectations of each project.'
            ]
        ];
            return view('home', compact('slides', 'testimonials', 'projects', 'services', 'news'));
    }

    public function services(){
        $services = [
            [
                'id' => 1,
                'name' => 'Design and Planning',
                'icon' => 'planning',
                'description' => 'Lorem ipsum dolor amet',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_1.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => 'Preparation',
                'icon' => 'preparation',
                'description' => 'Lorem ipsum dolor amet',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ]
                ]
            ],
            [
                'id' => 3,
                'name' => 'Welding',
                'icon' => 'welding',
                'description' => 'Lorem ipsum dolor amet',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_1.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ]
                ]
            ],
            [
                'id' => 4,
                'name' => 'Finishes',
                'icon' => 'polish',
                'description' => 'Lorem ipsum dolor amet',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ]
                ]
            ],
            [
                'id' => 5,
                'name' => 'Painting',
                'icon' => 'painting',
                'description' => 'Lorem ipsum dolor amet',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_1.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ]
                ]
            ],
            [
                'id' => 6,
                'name' => 'Delivery',
                'icon' => 'delivery',
                'description' => 'Lorem ipsum dolor amet',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'I know your deepest secret fear, I know everything',
                        'img' => '/img/slides/projects/slide_4.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ]
                ]
            ]
        ];
        return view('services', compact('services'));
    }

    public function subscribe(Request $r){
        return 1;
    }
}
