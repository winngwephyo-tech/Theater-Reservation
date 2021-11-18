@extends('layouts.app')
@section('style')

<link href="{{ asset('css/booking/style.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
<div class="container">
    <div class="content clearfix">
        <div class="content-left">
            <!-- <p> Movie Name : {{$movie_name}}</p>
            <p> Theater Name : {{$theater_name}}</p>
            <p> Seats : {{$seats}}</p>
            <p> Price : {{$price}}</p> -->
            <p>Army of Theives </p>
            <p>Theater Name</p>
            <p>Theater Name</p>
            <p>Theater Name</p>
        </div>

    </div>
    <div class="right">
                <a class="button" href="{{route('movie') }}"> Home</a>
            </div>
</div>
@endsection