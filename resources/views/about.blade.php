@extends('layouts.secondary')

@section('content')
    <section s-sec="about">
        <article class="head">
            <figure>
                <img src="/img/default.jpg" alt="">
                <div>
                    <p class="title">
                        Who we are?
                    </p>
                    <p class="text">
                        We've built a reputation in Las Vegas
                        and throughout the Henderson area for
                        delivering striking and beautiful
                        ornamental metal pieces and railings.
                        <br><br>
                        Our craftsmen have over 80 years of
                        combined experience and can customize
                        any piece of metal to your specific
                        requirements. No matter the size of the
                        job we'll ensure you love the finished
                        product. From cast iron to forged steel,
                        we can work with any material.
                    </p>
                </div>
            </figure>
            <div>
                <drop-list :list="{{json_encode($list)}}" name="home"></drop-list>
                <p class="text">
                    We are a group of professionals specialized in the marketing and
                    distribution of products and services in different branches such as
                    welding, full finish service, and custom metal fabrication. We have
                    brought together engineering specialties with knowledge and experience
                    to offer specialized products and services to industry and the
                    general public.
                </p>
            </div>
        </article>
        <div class="full-section separator blue">
            <ul>
                <li class="title">
                    customers <br>
                    110
                </li>
                <li class="title">
                    Projects <br>
                    220
                </li>
                <li class="title">
                    Employes <br>
                    30
                </li>
            </ul>
        </div>
        <div class="full-section" s-desk="history">
            <article>
                <p class="title">History Overview</p>
                <p class="text">
                    For over 20 years All American Finishing has provided top quality
                    metal fabrication, metal trim work and customized railings for the
                    people Las Vegas and all throughout Nevada. We specialize in
                    creating customized railings and ornamental pieces to our client's exact
                    specifications. Whether you're looking to replace the trim on your home
                    or want a showpiece for your patio, our craftsmen can make your
                    designs come to life.
                </p>
            </article>
            <ul class="check-list">
                <li>
                    <icon name="check"></icon>
                    Beautiful Designs
                </li>
                <li>
                    <icon name="check"></icon>
                    Original Concepts
                </li>
                <li>
                    <icon name="check"></icon>
                    Innovate Solutions
                </li>
            </ul>
        </div>
        <div class="full-section separator">
            <p class="title">Good</p>
            <span class="stars">
                <icon name="star"></icon>
                <icon name="star"></icon>
                <icon name="star"></icon>
                <icon name="star"></icon>
                <icon name="star"></icon>
            </span>
            <p class="text">
                For us, your opinion is the most important, tell us what do you think about our service and how we could improve it.
            </p>
            <contact-form></contact-form>
        </div>
        <div class="full-section" s-desk="why">
            <article>
                <p class="title">Why choose us?</p>
                <p class="text">
                    We are a serious company, responsible and committed to our work.
                    You can perceive the quality of our services in the consultation until the
                    completion of your project.
                </p>
            </article>
            <ul class="check-list">
                <li>
                    <icon name="check"></icon>
                    Warranty
                </li>
                <li>
                    <icon name="check"></icon>
                    Fast service
                </li>
                <li>
                    <icon name="check"></icon>
                    Availability
                </li>
                <li>
                    <icon name="check"></icon>
                    Expert Team
                </li>
                <li>
                    <icon name="check"></icon>
                    Innovate Solutions
                </li>
                <li>
                    <icon name="check"></icon>
                    Top technology tools
                </li>
            </ul>
        </div>
        <div class="full-section skills">
            <div class="title">Skills</div>
            <ul class="skill-list">
                <li>
                    <p class="text">Welding</p>
                    <progress value="80" max="100"></progress>
                </li>
                <li>
                    <p class="text">Planning</p>
                    <progress value="70" max="100"></progress>
                </li>
                <li>
                    <p class="text">Full Finish</p>
                    <progress value="90" max="100"></progress>
                </li>
            </ul>
        </div>
    </section>
    <section class="separator">
        <p class="title">
            Request for a free estimate
        </p>
        <button class="btn cta">Contact us</button>
    </section>
@endsection
