@extends('layouts.general')

@section('content')
<section s-sec="projects" class="full-section">
    <article class="cont">
        <content-tabs :projects="{{json_encode($projects)}}" name="general"></content-tabs>
        <div>
            <tabs name="general" :projects="{{json_encode($projects)}}"></tabs>
            <subscribe></subscribe>
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
