<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use App\Slides;
use App\Material;
use App\Comment;
use App\Faqs;
use App\Skills;
use App\Votes;
use App\Project;
use App\Forming;
use App\FinishChart;
use App\FinishCategory;
use App\Finish;
use App\PowderCoat;
use App\Patina;
use App\Shared;
use App\Newsletter;
use App\Inbox;
use App\MillType;
use App\Mills;

use Mail;
use App\Mail\Newnew;
use App\Mail\ContactMail;
use App\Mail\WelcomeMail;

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
                'archivo' => 'img/default_slide.jpg'
            ],
            [
                'id' => 2,
                'name' => 'slide 2',
                'archivo' => 'img/default_slide.jpg'
            ],
        ];
        $services = [
            [
                'id' => 1,
                'name' => 'Design & Planning',
                'icon' => 'planning',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Concept',
                        'content' => 'Generating an idea and bringing it to reality is what we do, create and define concepts.',
                        'img' => '/img/services/service_1.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Planning',
                        'content' => 'We devise and take the best path to reach your goals efficiently and as quickly as possible.',
                        'img' => '/img/services/service_2.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Material',
                        'content' => 'Choosing the right material for each project is very important, we care about providing excellence both in the visual aesthetics of the project and the quality of it, therefore you can trust that we will take care of finding and guaranteeing the use of quality materials for your project',
                        'img' => '/img/services/material.jpg'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Original Design',
                        'content' => 'Original designs, creative concepts, functional tools. When you look for Custom metal Fabriation we know that you want to find new, fresh and original ideas, We manufacture unique designs adapted to your needs.',
                        'img' => '/img/services/horientation.jpg'
                    ],
                    [
                        'id' => 6,
                        'name' => 'Estimate',
                        'content' => 'Planificaremos the costs of your project taking into account, allocation of efforts, cost of resources, work time etc.',
                        'img' => '/img/services/estimate.jpg'
                    ],
                ]
            ],
            [
                'id' => 2,
                'name' => 'Preparation',
                'icon' => 'preparation',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Shear',
                        'content' => 'Material cutting service, adjusted to the specific measures that you need. We offer shearing services, since it is a fast and efficient way to cut metal sheets, you can get custom size cuts either for specific cut only or future work of material forming, welding, polishing or painting.',
                        'img' => '/img/services/shear.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Forming Break',
                        'content' => 'Material cutting service, adjusted to the specific measures that you need. We offer shearing services...',
                        'img' => '/img/services/forming_break.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Machine Mill',
                        'content' => 'A milling machine provides many advantages when doing drill or cut milling, as a computerized system allows cutting or drilling with precision in any direction, within three dimensions.',
                        'img' => '/img/services/machine_mill.jpg'
                    ],
                ]
            ],
            [
                'id' => 3,
                'name' => 'Welding',
                'icon' => 'welding',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'MIG',
                        'content' => 'This system, being more versatile, saves time and resources since welding is clean and its application is fast.',
                        'img' => '/img/services/mig.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'TIG',
                        'content' => 'Gas Tungstan Arc Welding (SMAW) TIG welding techniques offer the possibility of welding in any position and in any type of metal parts such as aluminum, copper, magnesium, nickel and other more specific parts such as Zirconium and titanium as well.',
                        'img' => '/img/services/tig.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Stick',
                        'content' => 'Generating an idea and bringing it to reality is what we do, create and define concepts.',
                        'img' => '/img/services/stick.jpg'
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
                        'name' => 'Mirror Finish #8',
                        'content' => '"Mirror" bright finish or polish, is the case of the polishing process, the purpose for this exact process is to unify the surface, leave it smooth with a shine. In the polishing process we have already achieved that the sanded surface is unified, reinforced and brightened to a great extent.',
                        'img' => '/img/services/finish_8.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Finish #7',
                        'content' => 'This finish consists of a highly reflective surface polished and with a slight haze, where the lines are still visible. The piece is polished with a belt of grain 280 -320, this is achieved by constant polishing operations to get that glossy finish similar to the finish # 8 without getting to the final finish of it.',
                        'img' => '/img/services/finish_8.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Finish #6',
                        'content' => 'Also called satin or hairline is a smooth finish, it is polished through fine grain sandpaper, (240 - 320) this has fine grain lines but a lower reflectivity lower than a # 7 finish for example.',
                        'img' => '/img/services/finish_6.jpg'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Brush Finish #4',
                        'content' => 'The short and parallel polishing lines extend uniformly throughout the material. This surface is obtained by using belts or abrasive belts, it is one of the most popular finishes in the industry for its aesthetic appearance.',
                        'img' => '/img/services/finish_4.jpg'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Vibration',
                        'content' => 'This is a multidirectional finish, this pattern of vibrant grain, uniform texture, random grain lines and little reflective.',
                        'img' => '/img/services/vibration.jpg'
                    ],
                    [
                        'id' => 6,
                        'name' => 'Sandblasted',
                        'content' => 'It consists of the projection of abrasive particles on the piece to be treated. The sandblasting process is an effective way to clean and remove unwanted layers of material.',
                        'img' => '/img/services/sandblasted.jpg'
                    ],
                    [
                        'id' => 7,
                        'name' => 'Timesaver',
                        'content' => 'It consists of the projection of abrasive particles on the piece to be treated. The sandblasting process is an effective way to clean and remove unwanted layers of material.',
                        'img' => '/img/services/timesaver.jpg'
                    ],
                ]
            ],
            [
                'id' => 5,
                'name' => 'Painting',
                'icon' => 'painting',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Wet Painting',
                        'content' => 'Generating an idea and bringing it to reality is what we do, create and define concepts.',
                        'img' => '/img/services/wet_painting.jpg'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Finishes',
                        'content' => 'The finish shown here are just some examples, you can ask for any finish you require. You can che k more finish examples on button below.',
                        'img' => '/img/services/chart.jpg'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Powder Coat',
                        'content' => 'It is a coating with clear benefits in relation to liquid and non-solvent paint. It has proven resistance to chemical agents, impact and corrosion, ensuring the durability of the treated piece.',
                        'img' => '/img/services/powder.jpg'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Patina',
                        'content' => 'The patina is aware that forms on the surface of metals, is produced by oxidation or by chemical processes that give the piece of metal a rustic, antique and decorative appearance.',
                        'img' => '/img/services/patina.jpg'
                    ],
                ]
            ],
            [
                'id' => 6,
                'name' => 'Delivery',
                'icon' => 'delivery',
                'list' => [
                    [
                        'id' => 1,
                        'name' => 'Delivery',
                        'content' => 'We pride ourselves on being a company that In addition to our quality products, we have services delivered to',
                        'img' => '/img/services/service_6.jpg'
                    ]
                ]
            ]
        ];
    
        $news = app('App\Http\Controllers\NewsController')->getNews();

        $p = Project::all()->take(7);
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
        $fs = [];
        $finishes = FinishCategory::all();
        
        foreach ($finishes as $key => $f) {
            array_push($fs, $f->name);
            foreach ($f->finishes as $key => $c) {
                foreach ($c->types as $key => $t) {
                    $t->bases = json_decode($t->bases);
                }
            }
        }
        $menu = [
            [
                'name' => 'Design and Planning',
                'sub' => ['Concept', 'Planning', 'Material', 'Original Design', 'Estimate']
            ],
            [
                'name' => 'Fabrication',
                'sub' => ['Shear', 'Forming Break', 'Machine Mill']
            ],
            [
                'name' => 'Welding',
                'sub' => ['mig', 'tig', 'stick']
            ],
            [
                'name' => 'Finish',
                'sub' => $fs
            ],
            [
                'name' => 'Painting',
                'sub' => ['Wet Painting', 'Finish Chart', 'Powder Coat', 'Patina']
            ],
            [
                'name' => 'Delivery',
                'sub' => []
            ]
        ];
        $materials = Material::all();

        $paints = $this->getPaints();


        $mills = Mills::all();
        foreach ($mills as $key => $c) {
            $c->mills;
        }
        $section = false;
        $main = 'services';
        return view('services', compact('menu', 'materials', 'mills', 'paints','finishes', 'section', 'main'));
    }

    public function goService($section){
        $fs = [];
        $finishes = FinishCategory::all();
        
        foreach ($finishes as $key => $f) {
            array_push($fs, $f->name);
            foreach ($f->finishes as $key => $c) {
                foreach ($c->types as $key => $t) {
                    $t->bases = json_decode($t->bases);
                }
            }
        }
        $menu = [
            [
                'name' => 'Design and Planning',
                'sub' => ['Concept', 'Planning', 'Material', 'Horientation', 'Original Design', 'Estimate']
            ],
            [
                'name' => 'Preparation',
                'sub' => ['Shear', 'Forming Break', 'Machine Mill']
            ],
            [
                'name' => 'Welding',
                'sub' => ['mig', 'tig', 'stick']
            ],
            [
                'name' => 'Polish',
                'sub' => $fs
            ],
            [
                'name' => 'Painting',
                'sub' => ['Wet Painting', 'Finish Chart', 'Powder Coat']
            ],
            [
                'name' => 'Delivery',
                'sub' => ['test']
            ]
        ];
        $materials = Material::all();
        $paints = $this->getPaints();


        $mills = Mills::all();
        foreach ($mills as $key => $c) {
            $c->mills;
        }

        $main = 'services';
        return view('services', compact('menu', 'materials', 'mills', 'paints', 'finishes', 'section', 'main'));
    }
    
    public function subscribe(Request $r){
        try {
            $sub = Newsletter::create([
                'email' => $r->email
            ]);
            Mail::to($r->email)->send(new WelcomeMail($r->email));
            
        } catch (\Throwable $th) {
            return $th;
        }
        return 1;
    }

    public function unsuscribe($user){
        $user = Newsletter::where('email', $user)->first();
        $user->delete();

        return view('unsuscribed');
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

    public function join(){
        $menu = [
            [
                'name' => 'Who we are?',
                'link' => '/about-us'
            ],
            [
                'name' => 'Join our team',
                'link' => '/about-us/join-us'
            ],
            [
                'name' => 'FAQ list',
                'link' => '/about-us/faqs'
            ],
            [
                'name' => 'Last News',
                'link' => '/last-news'
            ]
        ];
        $main = 'about';
        $section = false;
        return view('join', compact('menu', 'main', 'section'));
    }
    public function faqs(){
        $menu = [
            [
                'name' => 'Who we are?',
                'link' => '/about-us'
            ],
            [
                'name' => 'Join our team',
                'link' => '/about-us/join-us'
            ],
            [
                'name' => 'FAQ list',
                'link' => '/about-us/faqs'
            ],
            [
                'name' => 'Last News',
                'link' => '/last-news'
            ]
        ];
        $main = 'about';
        $section = false;

        $faqs = Faqs::all();
        return view('faqs', compact('menu', 'main', 'section', 'faqs'));
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

    public function getPaints(){
        $fc = FinishChart::all();
        $pc = PowderCoat::all();
        $p = Patina::all();
        
        if(!$fc->isEmpty()){
            foreach ($fc as $key => $a) {
                $a->attributes = json_decode($a->attributes);
            }
        }
       
        if(!$pc->isEmpty()){
            $colors = [];
            foreach ($pc as $key => $a) {
                $a->attributes = json_decode($a->attributes);
                array_push($colors, $a->name);
            }
            $cols = array_unique($colors);
            $coats = [];
            foreach ($cols as $key => $co) {
                foreach ($pc as $k => $a) {
                    if($a->name == $co){
                        $coats[$co][$k] = $a; 
                    }
                }
            }
        }
        
        if(!$p->isEmpty()){
            $groups = [];
            foreach ($p as $key => $a) {
                $a->attributes = json_decode($a->attributes);
                array_push($groups, $a->name);
            }
            $grps = array_unique($groups);
            $patinas = [];

            foreach ($grps as $key => $co) {
                foreach ($p as $k => $a) {
                    if($a->name == $co){
                        $patinas[$co][$k] = $a; 
                    }
                }
            }
        }
      

        $paints = [
            'finish Chart' => $fc,
            'powder coat' => $coats,
            'patina' => $patinas,
            'length' => 3
        ];

        return $paints;
    }

    public function sendContact(Request $r){
        $data = $r->all();

        $contact = Inbox::create($data);

        Mail::to(['lalo@allamericanfinishing.com', 'no_reply@allamericanfinishing.com'])->send(new ContactMail($contact));

        return 1;
    }

    public function setComment(Request $r){
        $data = $r->all();
        $comment = Comment::create($data);
        $comment->comment = json_decode($comment->comment);
        return $comment;
    }
    
    public function testing($mail){
        $new = 'popo';
        $s = 'user';
        try {
            Mail::to([$mail, 'no_reply@allamericanfinishing.com'])->send(new Newnew($s, $new));
            echo 'sent';
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}

