<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Project;
class ProjectController extends Controller
{
    public function index(){
        $menu = [];
        $projects = Project::all();
        foreach ($projects as $key => $p) {
            array_push($menu, $p->name);
            foreach ($p->gallery as $key => $g) {
                if ($g->cover) {
                    $p->cover = $g;
                }
            }

        }
        $main = 'projects';
        $section = 'projects';
        return view('projects', compact('projects', 'menu', 'main', 'section'));
    }
}
