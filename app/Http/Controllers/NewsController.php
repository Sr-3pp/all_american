<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Newsletter;
use App\Like;
use App\Comment;
use Storage;
use Carbon\Carbon;
use Mail;
use App\Mail\Newnew;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{

    public function index(){
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
	$news = $this->getNews();
        return view('news', compact('menu', 'main', 'section', 'news'));
    }

    public function getNews(){
        $news = Article::all();

        foreach ($news as $key => $n) {
            $n->likes;
            $n->comments;
            foreach ($n->comments as $key => $c) {
                $c->comment = json_decode($c->comment);
            }
            $n->content = json_decode($n->content);
            $fecha = Carbon::parse($n->created_at);

            $n->fecha = $fecha->format('M d Y');
        }


        return $news;
    }

    public function getSubs(){
        $subs = Newsletter::all();

        return $subs;
    }

    public function getNew($id){
        $article = Article::find($id);
        $article->likes;
        $article->comments;
        foreach ($article->comments as $key => $com) {
            $com->newsletter;
        }
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

    public function checkMail(Request $r){
        $user = Newsletter::where('email', $r->email)->first();

        if($user){
           return $user;
        }else{
            return 0;
        }
    }

    public function commentNew(Request $r, $id){
        $data = $r->all();
        $comment = Comment::create($data);
        $comment->newsletter;
        return $comment;
    }

    /* public function __construct()
    {
        $this->middleware('admin');
    } */

    public function createNew(Request $r){
        $data = $r->all();
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('news');
        }

        $subs = Newsletter::all();
        $new = Article::create($data);
        $new->likes;
        $new->comments;
        $new->content = json_decode($new->content);
        $fecha = Carbon::parse($new->created_at);

        $new->fecha = $fecha->format('M d Y');
        
        foreach ($subs as $key => $s) {
            Mail::to($s->email)->send(new Newnew($s, $new));
        }

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
