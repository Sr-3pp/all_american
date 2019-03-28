@extends('layouts.general')

@section('content')
    <section s-sec="services" class="full-section">
        <article class="cont">
            <content-tabs name="general" :services="{{json_encode($services)}}"></content-tabs>
            <div>
                <tabs name="general" :services="{{json_encode($services)}}"></tabs>
                <subscribe></subscribe>
            </div>
        </article>
        <article class="cont">
            <div>
                <h1 class="title">SERVICES OVERVIEW</h1>
                <p class="text">
                    We offer a wide array of metal fabrication services to meet your needs. From customized ornamental pieces, to home or deck metal trim and railings, no job is too big or too small. We work with a large inventory of different materials and can customize them with ease. Whether you're looking for cast iron friezes and valances or decorative sheet metal, we'll meet your needs and exceed your expectations
                </p>
            </div>
            <div>

            </div>
        </article>
    </section>
    <section s-sec="separator">
        <div class="full-section">
            <article v-animate.repeat="'slide-right'">
                <p>
                    <span class="title">Request for a free estimate</span>               
                </p>
            </article>
            <button class="btn cta" type="button">
                Contact Us
            </button>
        </div>
    </section>
@endsection
