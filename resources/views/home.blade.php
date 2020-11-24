@extends('layouts.app')

@section('content')
<section s-sec="header">
    <slickSlider>
        @foreach($slides as $s)
        <figure>
            <img src="{{Storage::url($s->archivo)}}">
            @if($s->extra)
                <figcaption s-color="{{$s->extra->color}}" s-mode="{{$s->extra->position}}" class="content">
                    <p class="text">{{$s->extra->title}}</p>
                    <p class="title">{!! $s->extra->description !!}</p>
                    <button class="btn cta">Read More</button>
                </figcaption>
            @endif
        </figure>
        @endforeach
    </slickSlider>
    
    <!-- <tabs name="home" :services="{{json_encode($services)}}"></tabs> -->
    <article class="tabs full-section">
        <ul>
            @foreach($services as $key => $s)
                <emmitButton ind="{{$key}}" emmitname="setTabContent" :emmitdata="{index: {{$key}}}">
                    <icon name="{{$s['icon']}}"></icon>
                    <p>
                        {{$s['name']}}
                    </p>
                </emmitButton>
            @endforeach
        </ul>
    </article>
</section>

<c-tabs s-sec="services" class="tab-content full-section no-buttons">
    <template slot="contents" slot-scope="{active}">
            @foreach($services as $key => $s)
            <div v-show="active == 'item_{{$key}}'">
                    <article>
                    <droplist class="service-list">
                            <template slot="items" slot-scope="scope">
                                @foreach($s['list'] as $key2 => $item)
                                <li @click="scope.active({{$key2}}, {{json_encode($item['img'])}})" class="droplist-item" :class="{'active': scope.actived == '{{$key2}}'}">
                                    <article class="description">
                                        <icon name="star"></icon>
                                        <p>
                                            <span class="category">{{$item['name']}}</span>
                                        </p>
                                        <button class="btn">
                                            <icon v-if="scope.actived != {{$key2}}" name="chevron"></icon>
                                            <icon v-else name="minus"></icon>
                                        </button>       
                                    </article>
                                    <div slot="content" class="droplist-content">
                                        <div class="text">
                                            {!! $item['content'] !!}
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </template>
                        </droplist>
                    </article>
                    <serviceimg imgsrc="img/services/service_{{$key+1}}.jpg" />
                </div>
            </div>
            @endforeach
    </template>
</c-tabs> 

<!-- <content-tabs name="home" :services="{{json_encode($services)}}"></content-tabs> -->
<section s-sec="separator" class="full-section">
    <article v-animate.repeat="'slide-right'">
        <icon name="phone"></icon>
        <p>
            <span class="title">(702) 722 3197</span>
            Ask for <b>free estimate</b>, No job<br>is to big or small to us.                
        </p>
    </article>
    <a href="/contact-us" class="btn cta" type="button">
        Contact Us
    </a>
</section>
<section s-sec="who" class="animated-numbers full-section">
    <img src="/img/welding_2.jpg" alt="">  
    <article v-animate.repeat="'slide-up'"> 
        <div>
            <img class="starBG" v-animate.repeat="'slide-left'" src="/img/svg/estrellaBg.svg" alt="">
               <div>
                    <h2 class="title">Who we are?</h2>
                    <p class="text">
                        We've built a reputation in Las Vegas and throughout the Henderson area for delivering striking and beautiful ornamental metal pieces and railings.
                    </p>
                    <ul>
                        <ol class="category">
                            Costumers
                            <animated-number :target="110"></animated-number>
                        </ol>
                        <ol class="category">
                            Projects
                            <animated-number :target="2200"></animated-number>
                        </ol>
                        <ol class="category">
                            Employees
                            <animated-number :target="30"></animated-number>
                        </ol>
                    </ul>
               </div>
        </div>
    </article>
</section>
<section s-sec="testimonial" class="full-section">
    <carousel name="testimonials" :slides="{{json_encode($testimonials)}}"></carousel>
</section>
<section s-sec="values" class="full-section">
    <article v-animate.repeat="'slide-up'">
        <icon name="efficiency"></icon>
        <p>
            <span class="subtitle">Efficiency</span>
            <span class="text">
                We work in a professional and effective way, to meet the expectations of each project.
            </span>
        </p>
    </article>
    <article  v-animate.repeat="'slide-up'">
        <icon name="quality"></icon>
        <p>
            <span class="subtitle">Quality</span>
            <span class="text">
                We seek to satisfy the expectations of our clients by providing competent and functional services.
            </span>
        </p>
    </article>
    <article  v-animate.repeat="'slide-up'">
        <icon name="integrity"></icon>
        <p>
            <span class="subtitle">Integrity</span>
            <span class="text">
                We are driven by values that mantain a relationship of mutual trust with customers.
            </span>
        </p>
    </article>
</section>
<last-news :news="{{json_encode($news)}}"></last-news>
<section s-sec="projects" class="full-section">
    <h2 class="title">Projects</h2>
    <slider name="projects" :slides="{{json_encode($projects)}}"></slider>
</section>
<section s-sec="job" class="full-section">
    <img src="/img/welding_3.jpg" alt="no big or small jobs">
    <div class="section">
        <h2 v-animate.repeat="'fade'" class="subtitle">No job is too big or small for us</h2>
    </div>
</section>

<section s-sec="contact" class="full-section">
    <div>
        <h2 class="title">Send us a message</h2>
        <p class="text">
            Do you have questions, suggestions or comments? It is important for us to know your opinion, please write us, We'd love to hear from you.
        </p>
        <contact-form></contact-form>
    </div>
    <div>
        <ul v-animate.repeat="'slide-left'">
            <ol>
                <icon name="address"></icon>
                <p>
                    <span class="subtitle">Address</span>
                    3070 West Sirius Ave. Unit #108<br><b>Las Vegas NV 89102</b>
                </p>
            </ol>
            <ol>
                <icon name="phone"></icon>
                <div>
                    <span class="subtitle">Phone</span>
                    <a href="tel:7027223197" class="link"><b>(702)</b> 722 3197</a>
                </div>
            </ol>
            <ol>
                <icon name="fax"></icon>
                <div>
                    <span class="subtitle">Fax</span>
                    <a href="tel:7028910556" class="link"><b>(702)</b> 891 0556</a>
                </div>
            </ol>
            <ol>
                <icon name="cell"></icon>
                <div>
                    <span class="subtitle">Cell</span>
                    <a href="tel:7024010941" class="link"><b>(702)</b> 401 0941</a>
                </div>
            </ol>
            <ol>
                <icon name="email"></icon>
                <div>
                    <span class="subtitle">E Mail</span>
                    <a href="mail:allamericanfinishingfab@gmail.com" class="link">allamericanfinishingfab@gmail.com</a> <br>
                    <a href="mail:allamericanfinishingfab@yahoo.com" class="link">allamericanfinishingfab@yahoo.com</a><br>
                    <a href="mail:lalo@allamericanfinishing.com" class="link">lalo@allamericanfinishing.com</a>
                </div>
	    </ol>
		<ol>
			<icon name="clock"></icon>
			<span class="subtitle">Opening Hours</span>
		</ol>
            <ol>
                <article> 
                    <ul>
                        <li>
                            Monday
                            <span>
                                07:00 - 16:30
                            </span>
                        </li>
                        <li>
                            Tuesday
                            <span>
                                07:00 - 16:30
                            </span>
                        </li>
                        <li>
                            Wednesday
                            <span>
                                07:00 - 16:30
                            </span>
                        </li>
                        <li>
                            Thursday
                            <span>
                                07:00 - 16:30
                            </span>
                        </li>
                        <li>
                            Friday
                            <span>
                                07:00 - 16:30
                            </span>
                        </li>
                        <li>
                            Saturday
                            <span>
                                Closed
                            </span>
                        </li>
                        <li>
                            Sunday
                            <span>
                                Closed
                            </span>
                        </li>
                    </ul>
                </article>
            </ol>
        </ul>
    </div>
</section>
@endsection
