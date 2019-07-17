<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Newsletter;
use App\Like;
use App\Comment;

class NewsController extends Controller
{
    public function getNews(){
        $news = Article::all();

        foreach ($news as $key => $n) {
            $n->likes;
            $n->comments;
        }

        return $news;
    }

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function createNew(Request $r){
        $data = $r->all();
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('news');
        }

        $new = Article::create($data);

        return $new;
    }
    
    public function deleteNew($id){
        $new = Article::find($id);

        Storage::delete($new->archivo);

        foreach ($new->likes as $key => $l) {
            $l->delete();
        }
        foreach ($new->comments as $key => $l) {
            $l->delete();
        }

        return 1;
    }
}
