@extends('layouts.app')

@section('content')
<section s-sec="header">
    <carousel :slides="{{json_encode($slides)}}"></carousel>
    <tabs></tabs>
</section>
<<<<<<< HEAD
<section class="full-section">
    <content-tabs></content-tabs>
</section>
<section s-sec="separator">
        <div class="full-section">
=======
<section class="section">
    <content-tabs></content-tabs>
</section>
<section s-sec="separator">
        <div class="section">
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
            <p>
                <span class="title">(702) 722 3197</span>
                Ask for <b>free estimate</b>, No job is to big or small to us.                
            </p>
            <button class="cta" type="button">
                Contact Us
            </button>
        </div>
</section>
<section s-sec="who" class="full-section">
<<<<<<< HEAD
    <img src="/img/welding_2.jpg" alt="">
    <svg preserveAspectRatio="none" viewBox='0 0 50 50' version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0">
        <polygon class="st0" points="19.79,9.25 12.65,21.28 0,21.28 8.24,28.72 1.11,40.75 14.93,40.75 50,40.75 50,9.25 "/>
    </svg>       
    <article> 
        <div>
                <h2 class="title">Who we are?</h2>
                <p>
                    We've built a reputation in Las Vegas and throughout the Henderson area for delivering striking and beautiful ornamental metal pieces and railings.
                </p>
                <ul>
                    <ol class="title">
                        Costumers
                        <span>110</span>
                    </ol>
                    <ol class="title">
                        Projects
                        <span>220</span>
                    </ol>
                    <ol class="title">
                        Employees
                        <span>30</span>
                    </ol>
                </ul>
        </div>
=======
    <img src="/img/default.jpg" alt="">
    <article>
        <h2 class="title">Who we are?</h2>
        <p>
            We've built a reputation in Las Vegas and throughout the Henderson area for delivering striking and beautiful ornamental metal pieces and railings.
        </p>
        <ul>
            <ol class="title">
                Costumers
                <span>110</span>
            </ol>
            <ol class="title">
                Projects
                <span>220</span>
            </ol>
            <ol class="title">
                Employees
                <span>30</span>
            </ol>
        </ul>
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
    </article>
</section>
<section s-sec="testimonial">
    <carousel :slides="{{json_encode($slides)}}"></carousel>
</section>
<section s-sec="values" class="full-section">
    <article>
<<<<<<< HEAD
        <icon name="like"></icon>
=======
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
        <p>
            <span class="title">Efficiency</span>
            We work in a professional and effective way, to meet the expectations of each project.
        </p>
    </article>
    <article>
<<<<<<< HEAD
        <icon name="like"></icon>
=======
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
        <p>
            <span class="title">Quality</span>
            We seek to satisfy the expectations of our clients by providing competent and functional services.
        </p>
    </article>
    <article>
<<<<<<< HEAD
        <icon name="like"></icon>
=======
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
        <p>
            <span class="title">Integrity</span>
            We are driven by values that mantain a relationship of mutual trust with customers.
        </p>
    </article>
</section>
<section s-sec="last-news" class="full-section">
    <last-news></last-news>
</section>
<section s-sec="projects" class="full-section">
    <h2 class="title">Projects</h2>
    <carousel :slides="{{json_encode($slides)}}"></carousel>
</section>
<<<<<<< HEAD
<section s-sec="job" class="full-section">
    <img src="/img/welding_3.jpg" alt="no big or small jobs">
=======
<section class="full-section">
>>>>>>> f15a84740be985d9c33ea8d2eb7af4391105f177
    <div class="section">
        <h2 class="title">No job is to big or to small for us</h2>
    </div>
</section>
<section s-sec="contact" class="full-section">
    <div>
        <h2 class="title">Send us a message</h2>
        <contact-form></contact-form>
    </div>
    <div>
        <ul>
            <ol>
                <p>
                    <span class="title">Address</span>
                    3070 West Sirius Ave. Unit #108 <b>Las Vegas NV 89102</b>
                </p>
            </ol>
            <ol>
                <p>
                    <span class="title">Phone</span>
                    <b>(702)</b> 722 3197
                </p>
            </ol>
            <ol>
                <p>
                    <span class="title">Fax</span>
                    <b>(702)</b> 891 0556
                </p>
            </ol>
            <ol>
                <p>
                    <span class="title">Cell</span>
                    <b>(702)</b> 401 0941
                </p>
            </ol>
            <ol>
                <p>
                    <span class="title">E Mail</span>
                    allamericanfinishingfab@gmail.com <br>
                    allamericanfinishingfab@yahoo.com <br>
                    lalo@allamericanfinishing.com
                </p>
            </ol>
            <ol>
                <p>
                    <span class="title">Opening Hours</span>
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
                </p>
            </ol>
        </ul>
    </div>
</section>
@endsection
