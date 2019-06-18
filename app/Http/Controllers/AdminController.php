<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slides;
use App\Category;
use App\Project;
use App\Material;
use App\Calibre;
use App\Finish;
use App\Faqs;
use App\Skills;
use App\Mills;
use App\Gallery;
use Storage;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('auth/panel');
    }

    public function getSlides(){
        $slides = Slides::all();
        foreach ($slides as $key => $value) {
            $value->extra = json_decode($value->extra);
        }
        return $slides;
    }

    public function saveSlides(Request $r){
        $data = $r->all();
        if ($r->hasFile('archivo')) {
            $data['archivo'] = $r->archivo->store('slides');
        }
        $slide = Slides::create($data);
        $slide->extra = json_decode($slide->extra);
        
        return $slide;
    }

    public function addSlides(Request $r, $id){
        if($r->hasFile('pics')){
            foreach ($r->pics as $key => $p) {
                $pic = Gallery::create([
                    'name' => $id,
                    'project_id' => $id,
                    'archivo' => $p->store('projects/'.$id)
                ]);
            }
            $project = Project::find($id);
            return $project->gallery;
        }
    }

    public function updateSlide(Request $r, $id){
        $slide = Slides::find($id);
        $data = $r->all();
        if ($r->hasFile('archivo')) {
            Storage::delete($slide->archivo);
            $data['archivo'] = $r->archivo->store('slides');
        }
        $slide->update($data);
        
        return $slide;

    }

    public function deleteSlide($id){
        $slide = Slides::find($id);
        $slide->delete();

        return 1;
    }

    public function getProjects(){
        $projects = Project::all();
        foreach ($projects as $key => $p) {
            foreach ($p->gallery as $key => $g) {
                if ($g->cover) {
                    $p->cover = $g;
                }
            }

        }
        return $projects;
    }

    public function getCats($key){
        $categories = Category::where('kind', $key)->get();
        return $categories;
    }

    public function updateProject(Request $r, $id){

    }

    public function saveProject(Request $r){
        $data = $r->all();        
        $proy = Project::create($data);

        if($r->hasFile('pics')){
            foreach ($data['pics'] as $key => $pic) {
                if($key == 0){
                    $cover= 1;
                }else{
                    $cover = 0;
                }
                $picture = $pic->store('projects/'.$proy->id);
                $pic = Gallery::create([
                    'project_id' => $proy->id,
                    'cover' => $cover,
                    'archivo' => $picture,
                    'name' => $proy->name
                ]);
            }
        }
        return $this->getProjects();
    }

    public function getCategories(){
        $cats =Category::all();

        return $cats;
    }
    public function saveCat(Request $r){
        $data = $r->all();
        $cat = Category::create($data);

        return $cat;
    }


    public function saveMaterial(Request $r){
        $data = $r->all();
        if($r->hasFile('img')){
            $data['img'] = $r->img->store('materials');
        }
        
        $material = Material::create($data);
        
        foreach (json_decode($r->gauges) as $key => $g) {
            $d = [];
            $d['gauge'] = $g[0];
            $d['thick'] = $g[1];
            $d['material_id'] = $material->id;
            $calibre = Calibre::create($d);
        }
        $material->gauges;
        return $material;
    }

    public function removeMaterial($id){
        $mat = Material::find($id);
        Storage::delete($mat->img);
        foreach ($mat->gauges as $key => $g) {
            $g->delete();
        }
        $mat->delete();

        return 1;
    }

    public function removeGauge($id){
        $g = Calibre::find($id);
        $g->delete();
        return 1;
    }

    public function getFinishes(){
        $finishes = Category::where('kind', 'finish')->get();
        foreach ($finishes as $key => $c) {
            $c->finishes;
        }
        return $finishes;
    }

    public function saveFinish(Request $r){
        $data = $r->all();

        if ($r->hasFile('archivo')) {
            $data['archivo'] = $r->archivo->store('finishes');
        }

        $finish = Finish::create($data);

        return  $this->getFinishes();
    }

    public function deleteFinish($id){
        $f = Finish::find($id);
        Storage::delete($f->archivo);
        $f->delete();
        return 1;
    }
    
    public function saveFaq(Request $r){
        $data = $r->all();
        $faq = Faqs::create($data);

        return $faq;
    }
    
    public function deleteFaq($id){
        $f = Faqs::find($id);
        $f->delete();
        return 1;
    }
    
    public function getMills(){
        $categories = Category::where('kind', 'mill')->get();
        foreach ($categories as $key => $c) {
            $c->mills;
        }
        return $categories;
    }

    public function saveMill(Request $r){
        $data = $r->all();
        if ($r->hasFile('svg')) {
            $data['svg'] = $r->svg->store('mills');
        }

        $mill = Mills::create($data);

        return $this->getMills();;
    }
    public function deleteMill($id){
        $m = Mills::find($id);
        Storage::delete($m->svg);
        $m->delete();
        return 1;
    }
    
    public function saveSkill(Request $r){
        $data = $r->all();
        $skill = Skills::create($data);

        return $skill;
    }
    
    public function deleteSkill($id){
        $s = Skills::find($id);
        $s->delete();
        return 1;
    }


}
