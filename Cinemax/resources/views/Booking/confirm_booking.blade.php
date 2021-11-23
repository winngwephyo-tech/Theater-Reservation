@extends('layouts.app')
@section('style')

<link href="{{ asset('css/booking/style.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
<div class="wrapper">
    <div class="clearfix">
        <div class="left">
            <p> Movie Name : {{$movie_name}}</p>
            <p> Theater Name : {{$theater_name}}</p>
            <p> Seats : {{$seats}}</p>
            <p> Price : {{$fee}}</p>
        </div>

    </div>
    <div class="right">
                <a class="button" href="{{route('movie') }}"> Home</a>
            </div>
</div>
@endsection