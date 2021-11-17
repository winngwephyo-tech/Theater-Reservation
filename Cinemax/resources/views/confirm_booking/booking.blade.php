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
            @foreach ($booking as $book)
            <p> You booked 2 seats for the Movie:<span>{{$book->title}} </span> </p>
            <p> Seat Number :<span>{{$book->display_id}}</span></p>
            <p>Total Fee :<span>4000MMK</span></p>
            <a href="#" class="btn-link">Home</a>
        </div>
        <div class="content-right">
            <img src="/image/{{ $book->poster }}" alt="Army of Thieves" class="img-poster">
            <p>{{$book->title}} </p>
            <span>{{$book->duration}} min</span>
            @endforeach
        </div>

    </div>
</div>
@endsection