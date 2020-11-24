@extends('layouts.general')

@section('content')
    <section class="main active" s-sec="about">
        <div class="cont blue">
            <article class="sub">
                <div class="headline">
                    <h1 class="subtitle">FAQ LIST</h1>
                    <icon name="star_bar"></icon>
                </div>
                <div class="info column">
                    <article>
                        <p class="subtitle">Secure Payments</p>
                        <p class="text">
                            You are aware of all the expenses of your project, reports and transactions so you can make payments quickly and reliably.
                        </p>
                    </article>
                    <article>
                        <p class="subtitle">Warranty</p>
                        <p class="text">
                            We guarantee quality, durable and efficient works that meet all your expectations.
                        </p>
                    </article>
                    <article>
                        <p class="subtitle">Support Service</p>
                        <p class="text">
                            Call us we are at your disposal, our team is at your service to answer questions or questions.
                        </p>
                    </article>
                <faq-list :faqs="{{json_encode($faqs)}}"></faq-list>
                <faq-wizzard></faq-wizzard>
                </div>
            </article>
        </div>
    </section>
@endsection