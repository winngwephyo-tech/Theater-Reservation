@extends('layouts.app')
@section('style')

<link href="{{ asset('css/booking/style.css') }}" rel="stylesheet" type="text/css">

@endsection

@section('content')
<div class="container">
    <div class="header clearfix">
        <div class="logo">Logo</div>
        <div class="account">UserName</div>
    </div>
    <div class="content clearfix">
        <div class="content-left">
            <p> Movie Name : {{$movie_name}}</p>
            <p> Theater Name : {{$theater_name}}</p>
            <p> Seats : {{$seats}}</p>
            <p> Price : {{$price}}</p>
        </div>

    </div>
</div>
@endsection