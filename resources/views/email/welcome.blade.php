@extends('layouts.email')

@section('content')
<h2 class="title">Welcome to All American Finishing</h2>
  <br>
  <p class="info">
      Hi, {{$user}}
      <br><br>
      We are very pleased that you subscribe to our newsletter, remember that we publish content every month, which may be of your interest, we will keep you updated with new offers and services that may be of your interest, start using our online services.      
  </p>
  <a href="http://allamericanfinishing.com" target="_blank" class="cta">Go to AAF</a>
@endsection

@section('unsuscribe')
  <section>
    <a href="http://allamericanfinishing.com/unsuscribe/{{$user}}" target="_blank">Unsuscribe if you don’t want to recieve more mails.</a>
  </section>
@endsection