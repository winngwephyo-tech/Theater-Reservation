@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/booking/style.css') }}">
@endsection

@section('content')
<div class="wrapper mt-20">

    <div class="clearfix">
        <div class="left">
            <h2>Manage Booking</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ URL::previous() }}"> Back</a>
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
            <td>{{ $book->display_id }}</td>
            <td>{{ $book->showtime}}</td>
            @switch( $book->roll)
            @case("A")
            <td>2000</td>
            @break
            @case("B")
            <td>2000</td>
            @break

            @case("C")
            <td>3000</td>
            @break

            @case("D")
            <td>3000</td>
            @break

            @case("E")
            <td>4000</td>
            @break

            @endswitch

            <td><a class="button ml-10 button2" href="{{ route('/delete_booking',$book->id ) }}"> Cancel</a></td>

        </tr>
        @endforeach
    </table>

</div>
@endsection