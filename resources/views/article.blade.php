@extends('layouts.secondary')

@section('content')

    <section s-sec="article" class="section">
        <article class="new-info">
            <p>{{$article->fecha}}</p>
            <p>
                <icon name="like"></icon>
                {{count($article->likes)}}
            </p>
            <p>
                <icon name="coment"></icon>
                {{count($article->comments)}}
            </p>
        </article>
        <hr>
        <figure class="header">
            <img width="100%" src="{{Storage::url($article->archivo)}}" alt="">
            <figcaption>
                <h3>
                    {{$article->title}}
                </h3>
            </figcaption>
        </figure>
        <article class="new-content">
            {!! $article->content !!}
        </article>
    </section>
@endsection
