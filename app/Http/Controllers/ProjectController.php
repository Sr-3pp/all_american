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
                        'id' => 1,
                        'name' => 'Foto_ 1',
                        'archivo' => 'img/default.jpg'
                    ]
                ]
            ],
            [
                'name' => 'El nombre',
                'portada' => 'img/default.jpg',
                'gallery' => [
                    [
                        'id' => 1,
                        'name' => 'Foto_ 1',
                        'archivo' => 'img/default.jpg'
                    ]
                ]
            ],
        ];
        $menu = ['DECORATIVE PIECES', 'COUNTERTOPS', 'RAILS'];
        return view('projects', compact('projects', 'menu'));
    }
}
