@extends('layouts.app')
@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/Report/style.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
@endsection

@section('content')
<div class="wrapper mt-20">

    <div class="clearfix">
        <div class="left">
            <h2>Manage Booking</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ url('/admin') }}"> Back</a>
        </div>
    </div>

    <form action="{{ route('booking.searchName')  }}" method="get">

            <div class="clearfix search-div" >
                <input type="text" class="search left" name="name"  autocomplete="off" required placeholder="Search by User">               
                <button type="submit" class="button"><i class="fa fa-search"></i></button>
            </div>
    </form>

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
        @foreach ($bookings as $book)
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
    
    <div class="clearfix mt-20">
        <div class="right">
            <a class="button" href="{{ route('booking.deleteall') }}">Done for the Day</a>
        </div>
    </div>

</div>
@endsection