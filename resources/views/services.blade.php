@extends('layouts.general')

@section('content')
<services :materials="{{json_encode($materials)}}" :finishes="{{json_encode($finishes)}}" :mills="{{json_encode($mills)}}"></services>
@endsection
