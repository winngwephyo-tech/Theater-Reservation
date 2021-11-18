@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
@endsection

@section('content')
<div class="wrapper">
    <h1 class="heading">Admin Dashboard</h1>
    <div class="manage-sec">
        <a href="#">
            <div class="manage-movie">
                <h3>Manage<br>Movies</h3>
            </div>
        </a>
        <a href="#">
            <div class="manage-booking ">
                <h3>Manage <br>Bookings</h3>
            </div>
        </a>
        <a href="#">
            <div class="statistics">
                <h3>Statistics</h3>
            </div>
        </a>
    </div>
</div>

<div class="theater-update">
    <div class="ttl">
        <h1 class="heading">Update Theaters</h1>
    </div>
    <div class="wrapper">
        <a href="#">
            <div class="manage-theater">
                <h3>Manage <br>Theaters</h3>
            </div>
        </a>
    </div>
</div>
@endsection

