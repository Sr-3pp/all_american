@extends('layouts.general')

@section('content')
    <section class="main active" s-sec="about">
        <div class="cont blue">
            <article class="sub">
                <div class="headline">
                    <h1 class="subtitle">Last News</h1>
                    <icon name="star_bar"></icon>
		</div>
		<div class="cont">
			<div class="detail">
				<div class="info news">
					<div class="flex-news">
					@foreach($news as $n)
						<a href="/new/{{$n->id}}" class="new">
							<figure class="cover">
								<img src="{{ Storage::url($n->archivo) }}" alt="">
							</figure>
							<span class="s-text">
								{{$n->date}}
	    						</span> 
							<span class="content">
								<h3 class="category">
									{{$n->title}}
								</h3>
								<span class="s-text">
									{!! $n->content !!}
								</span>
							</span> 
						</a>
					@endforeach
					</div>
				</div>
			</div>
		</div>
	    </article>
        </div>
    </section>
@endsection
