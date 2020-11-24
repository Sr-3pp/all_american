@extends('layouts.general')

@section('content')
<services :sec="{{json_encode($section)}}" :materials="{{json_encode($materials)}}" :paints="{{json_encode($paints)}}" :finishes="{{json_encode($finishes)}}" :mills="{{json_encode($mills)}}"></services>
@endsection
