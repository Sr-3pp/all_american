<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Project;
class ProjectController extends Controller
{
    public function index(){
        $projects = Category::where('kind', 'project')->get();
        $menu = [];
        foreach ($projects as $key => $c) {
            $c->projects;
            array_push($menu, $c->name);
            foreach ($c->projects as $key => $p) {
               foreach ($p->gallery as $key => $value) {
                    if($value->cover == 1){
                        $p->cover = $value;
                    }
               }
            }
        }
        $main = 'projects';
        $section = 'projects';
        return view('projects', compact('projects', 'menu', 'main', 'section'));
    }
}
