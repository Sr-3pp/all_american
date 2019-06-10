@extends('layouts.general')

@section('content')
<projects :categories="{{json_encode($projects)}}"></projects>
@endsection
