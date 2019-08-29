@extends('layouts.email')

@section('content')
<h2>Hello</h2>
  <p>Someone has sent a message:</p>
  <p>
    {{$contact->name}}
  </p>
  <p>
    {{$contact->email}}
  </p>
  <p>
    {{$contact->afair}}
  <p>
    {{$contact->message}}
  </p>
@endsection