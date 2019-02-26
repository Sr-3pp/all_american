@extends('layouts.app')

@section('content')
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
