@extends('layouts.app')

@section('content')
<section s-sec="header">
    <slickSlider :slides="{{json_encode($slides)}}"></slickSlider>
    <tabs name="home" :services="{{json_encode($services)}}"></tabs>
</section>
<content-tabs name="home" :services="{{json_encode($services)}}"></content-tabs>
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
                            <animated-number :target="220"></animated-number>
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
        <h2 v-animate.repeat="'fade'" class="subtitle">No job is to big or to small for us</h2>
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
                <p>
                    <span class="subtitle">Phone</span>
                    <b>(702)</b> 722 3197
                </p>
            </ol>
            <ol>
                <icon name="fax"></icon>
                <p>
                    <span class="subtitle">Fax</span>
                    <b>(702)</b> 891 0556
                </p>
            </ol>
            <ol>
                <icon name="cell"></icon>
                <p>
                    <span class="subtitle">Cell</span>
                    <b>(702)</b> 401 0941
                </p>
            </ol>
            <ol>
                <icon name="email"></icon>
                <p>
                    <span class="subtitle">E Mail</span>
                    allamericanfinishingfab@gmail.com <br>
                    allamericanfinishingfab@yahoo.com <br>
                    lalo@allamericanfinishing.com
                </p>
            </ol>
            <ol>
                <icon name="clock"></icon>
                <article>
                    <span class="subtitle">Opening Hours</span>
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
