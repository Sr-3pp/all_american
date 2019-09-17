@extends('layouts.email')

@section('content')
<div style="color:#FFFFFF;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:150%;padding-top:15px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
  <div style="font-size: 12px; line-height: 18px; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; color: #FFFFFF;">
  <p style="font-size: 14px; line-height: 30px; text-align: left; margin: 0;"><span style="font-size: 20px;"><strong><span style="line-height: 30px; font-size: 20px;">Welcome to All American Finishing</span></strong></span></p>
  <p style="font-size: 14px; line-height: 21px; text-align: left; margin: 0;"> </p>
  <p style="font-size: 14px; line-height: 27px; text-align: left; margin: 0;"><span style="font-size: 18px;"> </span></p>
  <p style="font-size: 12px; line-height: 27px; margin: 0;"><span style="font-size: 18px;"> Hi, {{$user}}</span></p>
  <p style="font-size: 12px; line-height: 18px; margin: 0;"> </p>
  <p style="font-size: 12px; line-height: 27px; margin: 0;"><span style="font-size: 18px;">We are very pleased that you subscribe to our newsletter, remember that we publish content every month, which may be of your interest, we will keep you updated with new offers and services that may be of your interest, start using our online services.</span></p>
  <a href="http://allamericanfinishing.com" target="_blank" style="border: solid 1px #FFF; padding: 1% 3%; display: inline-block; color: #FFFFFF; text-decoration: none;">Go to AAF</a>
  </div>
  </div>
@endsection

@section('unsuscribe')
<div style="color:#555555;font-family:Arial, 'Helvetica Neue', Helvetica, sans-serif;line-height:120%;padding-top:10px;padding-right:10px;padding-bottom:10px;padding-left:10px;">
  <div style="font-size: 12px; line-height: 14px; color: #555555; font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;">
  <p style="font-size: 12px; line-height: 14px; margin: 0;"><span style="color: #ffffff; font-size: 12px; line-height: 14px;">
    <a href="http://allamericanfinishing.com/unsuscribe/{{$user}}" target="_blank">Unsuscribe if you don’t want to recieve more mails.</a>
  </span></p>
  </div>
  </div>  
@endsection