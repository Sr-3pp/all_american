<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Slides;
use App\Material;
use App\Faqs;
use App\Skills;
use App\Votes;
use App\Category;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function index()
    {
        $slides = Slides::all();
        foreach ($slides as $key => $value) {
            $value->extra = json_decode($value->extra);
        }
        $main = 'home';
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
            return view('home', compact('slides', 'testimonials', 'projects', 'services', 'news', 'main'));
    }

    public function services(){
        $menu = ['Design and Planning', 'Preparation', 'Welding', 'Finishes', 'Painting', 'Delivery'];
        $materials = Material::all();

        $finishes = Category::where('kind', 'finish')->get();
        foreach ($finishes as $key => $c) {
            $c->finishes;
        }
        $mills = Category::where('kind', 'mill')->get();
        foreach ($mills as $key => $c) {
            $c->mills;
        }

        $section = false;
        $main = 'services';
        return view('services', compact('menu', 'materials', 'mills', 'finishes', 'section', 'main'));
    }

    public function goService($section){
        $menu = ['Design and Planning', 'Preparation', 'Welding', 'Finishes', 'Painting', 'Delivery'];
        $materials = Material::all();

        $finishes = Category::where('kind', 'finish')->get();
        foreach ($finishes as $key => $c) {
            $c->finishes;
        }
        $mills = Category::where('kind', 'mill')->get();
        foreach ($mills as $key => $c) {
            $c->mills;
        }
        $main = 'services';
        return view('services', compact('menu', 'materials', 'mills', 'finishes', 'section', 'main'));
    }
    
    public function subscribe(Request $r){
        return 1;
    }

    public function about(){
        $list=[
            [
                'name' => 'Our Mission',
                'content' => 'Being a company committed to efficiently solve the needs of our
                customers by providing quality services, with useful and effective
                strategies, we work in a responsible manner, and we are proud of our
                quality in each job, Our main commitment is with our customers.'
            ],
            [
                'name' => 'Our Vission',
                'content' => 'Being a company committed to efficiently solve the needs of our
                customers by providing quality services, with useful and effective
                strategies, we work in a responsible manner, and we are proud of our
                quality in each job, Our main commitment is with our customers.'
            ],
            [
                'name' => 'Our Philosophy',
                'content' => 'Being a company committed to efficiently solve the needs of our
                customers by providing quality services, with useful and effective
                strategies, we work in a responsible manner, and we are proud of our
                quality in each job, Our main commitment is with our customers.'
            ]
        ];

        $skills = Skills::all();
        $main = 'about';
        return view('about', compact('list', 'skills', 'main'));
    }

    public function contact(){
        $main = 'contact';
        return view('contact', compact('main'));
    }
    public function panel(){
        return view('auth.panel');
    }


    public function getMaterials(){
        $materials = Material::all();

        foreach ($materials as $key => $m) {
            $m->gauges;
        }

        return $materials;
    }

    public function getFaqs(){
        $faqs = Faqs::all();

        return $faqs;
    }
    public function getSkills(){
        $skills = Skills::all();

        return $skills;
    }

    public function saveValoration(Request $r){
            $data = $r->all();
            $valoration = Votes::create($data);

            return 1;
    }

    public function getShearTables(){
        $materials = Material::all();

        foreach ($materials as $key => $m) {
            $m->gauges;
        }

        return $materials;
    }
    
    public function testing(){
        $slides = Slides::all();
        foreach ($slides as $key => $value) {
            $value->extra = json_decode($value->extra);
            dd($value->extra);
        }
        return $slides;
    }
}
