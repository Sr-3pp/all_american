@extends('layouts.email')

@section('content')
<h2>Hello</h2>
  <p>There is a new article:</p>
  <p>
    you can read it clicking this button: 
 {{--  <a href="{{env('APP_URL')}}/new/{{$new->id}}" target="_blank">Go to article</a> --}}
  </p>
@endsection