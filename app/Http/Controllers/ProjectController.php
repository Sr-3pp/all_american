<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
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
}
