@extends('layouts.app')

@section('style')
<link href="{{ asset('css/movie/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/movie/common.css') }}" rel="stylesheet" type="text/css">
@endsection

@error('Test Data')
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@enderror

@section('content')
<form action="{{ route('movie.update',$movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="wrapper clearfix">
            <div class="left-con">
                <div>
                    <input type="file" name="poster" placeholder="image">
                    <img src="/image/{{ $movie->poster }}" width="300px" class="img-poster">
                </div>
                <button type="submit" class="button button2">Save</button>
                <div>
                    <a href="{{ URL::previous() }}" class="button button2">Back</a>
                </div>
              
            </div>
            <div class="right-con">
                <input type="text" name="title" value="{{ $movie->title }}" placeholder="title" class="movie-title">
                <div class="time-style form-control">
                    <span class="span-showtime">Add ShowTime</span>

                   
                     @foreach($showtime as $showtime)
                     @php
                     $showtime1=$showtime->showtime
                     @endphp
                     @php
                     $showtime2=$showtime->showtime
                     @endphp
                     @php
                     $showtime3=$showtime->showtime
                     @endphp                     
                     @endforeach
                     <input type="time" name="time1" value="{{ $showtime1}}">   
                     <input type="time" name="time2" value="{{ $showtime2}}">          
                     <input type="time" name="time3" value="{{ $showtime3}}"> 
                     
                    
                </div>

                <div class="right-row2 clearfix">
                    <input type="text" name="duration" value="{{ $movie->duration }}" class="row2-left form-control" placeholder="Duration">
                    <input type="text" name="theater_id" value="{{ $movie->theater_id }}" class="row2-right form-control" placeholder="TheaterID">
                </div>
                <input type="text" class="detail form-control" name="details" value="{{ $movie->details }}" placeholder="Detail"></textarea>
                <input type="text" name="trailer" value="{{ $movie->trailer }}" class="movie-title form-control" placeholder="trailer">
                <div class="right-row2 clearfix">
                    <input type="text" name="genre" value="{{ $movie->genre }}" class="row2-left form-control" placeholder="Genre">
                    <input type="text" name="rating" value="{{ $movie->rating }}" class="row2-right form-control" placeholder="Rating">
                </div>
                <input type="text" class="detail form-control" name="cast" value="{{ $movie->cast }}" placeholder="Casts"></textarea>
            </div>
        </div>
    </div>
</form>
@endsection