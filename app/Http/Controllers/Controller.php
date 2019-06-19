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
use App\Project;
use App\Category;
use App\Forming;
use App\Shared;

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
                        'img' => '/img/services/planning_card.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/planning_card.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/planning_card.jpg'
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
                        'img' => '/img/services/preparation_card.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/preparation_card.jpg'
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
                        'img' => '/img/services/welding_card.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/welding_card.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/welding_card.jpg'
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
                        'img' => '/img/services/polish_cards.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/polish_cards.jpg'
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
                        'img' => '/img/services/concept.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/concept.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'SI que si',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/concept.jpg'
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
                        'img' => '/img/services/delivery_card.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'IM a spy, in the house of love',
                        'img' => '/img/services/delivery_card.jpg'
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

        $p = Project::all()->take(5);
        $projects = [];
            foreach ($p as $key => $value) {
                foreach ($value->gallery as $ke2 => $c) {
                    if($c->cover == 1){
                        array_push($projects, $c);
                    }
                }
            }
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

    public function SharedProject(Request $r){
        $data = $r->all();
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('shared');
        }

        $shared = Shared::create($data);

        return $shared;
        
    }

    public function sendForming(Request $r){
        $data = (array) json_decode($r->string);        
        $object = json_encode($data);
        $forming = Forming::create([
            'object' => $object
        ]); 

        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('shared');
            foreach ($data['contact'] as $key => $v) {
                if(isset($v->ref)){
                    $shared[$v->ref] = $v->value;
                }
            }
            $shared['archivo'] = $data['archivo'];
            $shared['forming_id'] = $forming->id;
            $sh = Shared::create($shared);

            $forming->shared;
        }

        return $forming;
    }

    public function formingMaterials(){
        $ma = Material::all();
        $materials= [];
        foreach ($ma as $key => $m) {
            if(count($m->gauges) != 0){
                array_push($materials, $m);
            }
        }

        return $materials;
    }
    
    public function testing(){
        $slides = Forming::find(6);
        dd(json_decode($slides->object));
        foreach ($slides as $key => $value) {
            $value->extra = json_decode($value->extra);
            dd($value->extra);
        }
        return $slides;
    }
}
