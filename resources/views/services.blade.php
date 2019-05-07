@extends('layouts.general')

@section('content')
<services :materials="{{json_encode($materials)}}"></services>
@endsection
