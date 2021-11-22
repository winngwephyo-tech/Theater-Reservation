@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Report/style.css') }}">
@endsection

@section('content')
<div class="wrapper mt-20">

    <div class="clearfix">
        <div class="left">
            <h2>Manage Booking</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ url('/') }}"> Back</a>
        </div>
    </div>
    <table class="report mt-20">
        <tr>
            <th>No</th>
            <th>User</th>
            <th>Movie</th>
            <th>Seats</th>
            <th>Showtime</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        @foreach ($bookingList as $book)
        <tr>
            <td>{{ $book->id }}</td>
            <td>{{ $book->name }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->seat_display_id }}</td>
            <td>{{ $book->showtime}}</td>
            <td>{{ $book->price}}</td>
            <td><a class="button ml-10 button2" href="{{ route('booking.delete',$book->id ) }}"> Cancel</a></td>

        </tr>
        @endforeach
    </table>

</div>
@endsection