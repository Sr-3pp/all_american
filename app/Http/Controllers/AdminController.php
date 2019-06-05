<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slides;
use App\Category;
use App\Project;
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
        $categories = Category::all();
        foreach ($categories as $key => $c) {
            $c->projects;
        }
        return $categories;
    }

    public function getProyCats(){
        $categories = Category::where('kind', 'project')->get();
        return $categories;
    }

    public function updateProject(Request $r, $id){

    }

    public function saveProject(Request $r){
        $data = $r->all();
        $proy = Project::create($data);
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
}
