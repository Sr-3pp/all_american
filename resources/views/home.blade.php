@extends('layouts.app')

@section('content')
<section s-sec="header">
    <carousel name="main" :slides="{{json_encode($slides)}}"></carousel>
    <tabs></tabs>
</section>
<content-tabs></content-tabs>
<section s-sec="separator">
        <div class="full-section">
            <article v-animate.repeat="'slide-right'">
                <icon name="phone"></icon>
                <p>
                    <span class="title">(702) 722 3197</span>
                    Ask for <b>free estimate</b>, No job<br>is to big or small to us.                
                </p>
            </article>
            <button class="btn cta" type="button">
                Contact Us
            </button>
        </div>
</section>
<section s-sec="who" class="full-section">
    <img src="/img/welding_2.jpg" alt="">
    <svg v-animate.repeat="'slide-left'" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" xml:space="preserve">
        <path class="st0" d="M238.67,0 152.62,145.15 0,145.15 99.43,234.85 13.38,380 180.1,380 603.12,380 603.12,0 z"/>
    </svg>
  
    <article v-animate.repeat="'slide-up'"> 
        <div>
                <h2 class="title">Who we are?</h2>
                <p>
                    We've built a reputation in Las Vegas and throughout the Henderson area for delivering striking and beautiful ornamental metal pieces and railings.
                </p>
                <ul>
                    <ol class="category">
                        Costumers
                        <span>110</span>
                    </ol>
                    <ol class="category">
                        Projects
                        <span>220</span>
                    </ol>
                    <ol class="category">
                        Employees
                        <span>30</span>
                    </ol>
                </ul>
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
            We work in a professional and effective way, to meet the expectations of each project.
        </p>
    </article>
    <article  v-animate.repeat="'slide-up'">
        <icon name="quality"></icon>
        <p>
            <span class="subtitle">Quality</span>
            We seek to satisfy the expectations of our clients by providing competent and functional services.
        </p>
    </article>
    <article  v-animate.repeat="'slide-up'">
        <icon name="integrity"></icon>
        <p>
            <span class="subtitle">Integrity</span>
            We are driven by values that mantain a relationship of mutual trust with customers.
        </p>
    </article>
</section>
<last-news></last-news>
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
        <p>
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
