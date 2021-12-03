@extends('layouts.app')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<div class="wrapper mt-20 pt-20">
    <h2>Admin Dashboard</h2>
    <div class="manage-sec clearfix">
        <a href="{{route('admin-movie') }}">
            <div class="manage-movie">
                <h3>Manage<br>Movies</h3>
            </div>
        </a>
        <a href="{{route('booking-index') }}">
            <div class="manage-booking ">
                <h3>Manage <br>Bookings</h3>
            </div>
        </a>
        <a href="{{route('statistic') }}">
            <div class="statistics">
                <h3>Statistics</h3>
            </div>
        </a>
    </div>
</div>
<div class="line"></div>
<div class="wrapper mt-20">
    <h2>Update Theaters</h2>
        <a href="{{route('theater-manage') }}" class="manage-theater">
            <div class="manage-theater">
                <h3>Manage <br>Theaters</h3>
            </div>
        </a>
</div>
@endsection

