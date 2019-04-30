@extends('layouts.general')

@section('content')
<projects :projects="{{json_encode($projects)}}"></projects>
@endsection
