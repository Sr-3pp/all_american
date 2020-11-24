@extends('layouts.secondary')
@section('og-img')
<meta property="og:image" content="{{Storage::url($article->archivo)}}" />
@endsection
@section('content')

    <section s-sec="article" class="section">
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
    <social-new fecha="{{$article->fecha}}" :id="{{$article->id}}" :likes="{{json_encode($article->likes)}}" :comments="{{$article->comments}}"></social-new>
    </section>
@endsection
