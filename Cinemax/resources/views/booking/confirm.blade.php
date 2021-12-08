@extends('layouts.app')
@section('style')

<link href="{{ asset('css/booking/style.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
<div class="wrapper">
    <div class="clearfix receipt">
        <h2>Order Confirmed!</h2>
        <div class="left">
            <p> Movie Name : <strong class="info-purple">{{$movie_name}}</strong></p>
            <p> Theater Name : <strong class="info-purple">{{$theater_name}}</strong></p>
            <p> Showtime : <strong class="info-purple">{{date('g:i A', strtotime($showtime))}}</strong></p>
            <p> Seats : <strong class="info-purple">{{$seats}}</strong></p>
            <p> Price : <strong class="info-purple">{{$fee}} MMK</strong></p>
        </div>

    <div class="right">
            <a class="button" href="{{route('movie') }}"> Home</a>
    </div>

    </div>
</div>
@endsection
