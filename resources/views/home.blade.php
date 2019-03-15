@extends('layouts.app')

@section('content')
    <?php 
        $slides = [
            [
                'id' => 1,
                'name' => 'slide 1'
            ],
            [
                'id' => 2,
                'name' => 'slide 2'
            ],
        ];
    ?>
    <carousel :slides="{{json_encode($slides)}}"></carousel>
    <full-section background-img="/img/default.jpg"></full-section>
    <half-section></half-section>
    <section class="section">
        <h2>Forms</h2>
        <contact-form></contact-form>
        <br><br>
        <select-list magic="placeholder"></select-list>
        <br><br>
        <upload-picture></upload-picture>
        <br><br>
        <upload-file></upload-file>
    </section>
@endsection
