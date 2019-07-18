<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Newsletter;
use App\Like;
use App\Comment;
use Storage;
use Carbon\Carbon;

class NewsController extends Controller
{
    public function getNews(){
        $news = Article::all();

        foreach ($news as $key => $n) {
            $n->likes;
            $n->comments;
            $n->content = json_decode($n->content);
            $fecha = Carbon::parse($n->created_at);

            $n->fecha = $fecha->format('M d Y');
        }

        return $news;
    }

    public function getNew($id){
        $article = Article::find($id);
        $article->likes;
        $article->comments;
        $article->content = json_decode($article->content);
        $fecha = Carbon::parse($article->created_at);

        $article->fecha = $fecha->format('M d Y');

        $main = 'services';

        return view('article', compact('article', 'main'));
    }

    public function likeNew($id){
        $like = Like::create([
            'article_id' => $id
        ]);

        return $like;
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

        $new->delete();

        return 1;
    }

    public function updateNew(Request $r, $id){
        $new = Article::find($id);
        $data = $r->all();
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('news');
        }

        $new->update($data);

        return 1;

    }
}
