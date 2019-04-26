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
                'img' => '/img/slides/projects/slide_4.jpg',
                'description' => 'We provide complete custom metal fabrication services, from planning to delivery
                                in your business or home, we will work and trace from the beginning the best way
                                to achieve the objectives of your project, anticipating any inconvenience that may
                                arise, we distinguish ourselves by our reputation and that we are a committed and
                                responsible company.',
                'sections' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'icon' => 'planning',
                        'img' => '/img/slides/projects/slide_4.jpg',
                        'description' => 'Lorem ipsum dolor amet',
                        'content' => 'I know your deepest secret fear, I know everything',
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
                        'name' => 'Material',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_1.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                        'lists' => [
                            0 => [
                                [
                                    'name' => 'Material',
                                    'content' => 'full-content',
                                    'description' => 'Part of content...',
                                    'img' => '/img/slides/projects/slide_4.jpg',
                                ],
                                [
                                    'name' => 'Material',
                                    'content' => 'full-content',
                                    'description' => 'Part of content...',
                                    'img' => '/img/slides/projects/slide_3.jpg',
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 4,
                        'name' => 'Estimate',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                ]
            ],
            [
                'id' => 2,
                'name' => 'Preparation',
                'icon' => 'preparation',
                'description' => 'Lorem ipsum dolor amet',
                'sections' => [
                    [
                        'id' => 1,
                        'name' => 'Shear',
                        'content' => 'Material cutting service, adjusted to the
                                        specific measures that you need. We offer
                                        shearing services, since it is a fast and efficient
                                        way to cut metal sheets, you can get
                                        custom size cuts either for specific cut only
                                        or future work of material forming, welding,
                                        polishing or painting.',
                        'img' => '/img/slides/projects/slide_4.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                        'subsections' => [
                            0 => [
                                'name' => 'sub name',
                                'content' => 'I know your deepest secret fear, I know everything',
                                'img' => '/img/slides/projects/slide_4.jpg',
                                'icon' => 'planning',
                                'description' => 'Lorem ipsum dolor amet',
                            ],
                            1 => [
                                'name' => 'HOW TO WORK WITH THE “GAUGES” SISTEM?',
                                'content' => 'I know your deepest secret fear, I know everything',
                                'img' => '',
                                'icon' => 'planning',
                                'description' => 'Lorem ipsum dolor amet',
                                'table' => [
                                    [
                                        'material' => 'STAINLESS STEEL',
                                        'gauges' => [
                                            0 => [
                                                'gauge' => '28',
                                                'thick' => '0.015'
                                            ],
                                            0 => [
                                                'gauge' => '26',
                                                'thick' => '0.018'
                                            ],
                                        ] 
                                    ],
                                    [
                                        'material' => 'ALuminium',
                                        'gauges' => [
                                            0 => [
                                                'gauge' => '22',
                                                'thick' => '0.025'
                                            ],
                                            0 => [
                                                'gauge' => '20',
                                                'thick' => '0.032'
                                            ],
                                        ] 
                                    ]
                                ]
                            ],
                            2 => [
                                'name' => 'MORE CUT SYSTEM SERVICE',
                                'content' => 'I know your deepest secret fear, I know everything',
                                'img' => '/img/slides/projects/slide_4.jpg',
                                'icon' => 'planning',
                                'description' => 'Lorem ipsum dolor amet',
                                'lists' => [
                                    [
                                        'name' => 'PLasma',
                                        'content' => 'Plasma cutting is a process that uses a nozzle, with a hole for the circulation
                                                        of the ionized gas at high temperatures, in such a way that a beam is obtained
                                                        that can be used to cut sections of metals such as carbon steel, steel stainless
                                                        steel, aluminum and other conductive metals of electricity. Through the use of
                                                        this technique, the plasma arc and the gas eliminate the molten material.',
                                    ],
                                    [
                                        'name' => 'WATERJET',
                                        'content' => 'Plasma cutting is a process that uses a nozzle, with a hole for the circulation
                                                        of the ionized gas at high temperatures, in such a way that a beam is obtained
                                                        that can be used to cut sections of metals such as carbon steel, steel stainless
                                                        steel, aluminum and other conductive metals of electricity. Through the use of
                                                        this technique, the plasma arc and the gas eliminate the molten material.',
                                    ],
                                ]
                            ]
                        ]
                    ],
                    [
                        'id' => 2,
                        'name' => 'Forming Break',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                    ],
                    [
                        'id' => 3,
                        'name' => 'Machine Mill',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/slides/projects/slide_3.jpg',
                        'icon' => 'planning',
                        'description' => 'Lorem ipsum dolor amet',
                        'subsections' => [
                            [
                                'name' => 'Benefits',
                                'content' => 'A milling machine provides many advantages when doing drill or cut milling,
                                as a computerized system allows cutting or drilling with precision in any
                                direction, within three dimensions.',
                                'img' => '/img/slides/projects/slide_4.jpg',
                                'icon' => 'planning',
                                'description' => 'Lorem ipsum dolor amet',
                            ],
                            [
                                'name' => 'Categories / Examples',
                                'content' => 'A milling machine provides many advantages when doing drill or cut milling,
                                as a computerized system allows cutting or drilling with precision in any
                                direction, within three dimensions.',
                                'img' => '/img/slides/projects/slide_4.jpg',
                                'icon' => 'planning',
                                'description' => 'Lorem ipsum dolor amet',
                            ],
                        ]
                    ]
                ]
            ],
            [
                'id' => 3,
                'name' => 'Welding',
                'icon' => 'welding',
                'description' => 'Lorem ipsum dolor amet',
                'sections' => [
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
                'sections' => [
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
                'sections' => [
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
                'sections' => [
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

    public function projects(){
        $projects = [
            [
                'name' => 'El nombre',
                'portada' => 'img/default.jpg',
                'gallery' => [
                    [
                        'name' => 'Foto_ 1',
                        'archivo' => 'img/default.jpg'
                    ]
                ]
            ]
        ];
        return view('projects', compact('projects'));
    }
    
    public function subscribe(Request $r){
        return 1;
    }
}
