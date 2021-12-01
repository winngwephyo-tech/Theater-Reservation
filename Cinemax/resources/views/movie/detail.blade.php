@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
<link rel="stylesheet" href="{{ asset('css/movie_description.css')}}">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css')}}">
@endsection

@section('content')
<div class="wrapper clearfix mt-20">
    <div class="movie-poster mt-20">
        <img src="/image/{{ $movie->poster }}" alt="poster">
    </div>
    <div class="movie-description mt-20">
        <div class="title clearfix">
            <div class="movie-title">
                <h2>{{ $movie->title }}</h2>
                <small>{{ $movie->duration }} mins</small>
            </div>
            <div class="btn">
                    @foreach ($showtime as $item)
                    @auth
                    <a href="{{ route('booking-create', ['movie_id' => $item->movie_id, 'showtime_id' => $item->id]) }}" class="button">{{ date('g:i A', strtotime($item->showtime)) }}</a>
                    @else
                    <a href="{{ route('login') }}" class="button">{{ date('g:i A', strtotime($item->showtime)) }}</a>
                    @endauth
                    @endforeach
            </div>
        </div>
        <div class="movie-trailer">
            <a href="{{ $movie->trailer }}" class="button button2">Watch Trailer</a>
        </div>
        <div class="movie-details font-size">
            <p>{{$movie->details}}</p>
        </div>
        <div class="description font-size">
            <label for="">Genre : </label>{{$movie->genre}}<br>
            <label for="">Rating : </label>{{$movie->rating}}<br>
            <label for="">Casts : </label>{{$movie->cast}}<br>
        </div>
        <div class="showing-theater font-size">
            <p>This movie is now showing in <strong>Theater{{$movie->theater_id}}</strong></p>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="sp">
        @foreach ($showtime as $item)
        @auth
        <a href="{{ route('booking-create', ['movie_id' => $item->movie_id, 'showtime_id' => $item->id]) }}" class="button">{{ date('g:i A', strtotime($item->showtime)) }}</a>
        @else
        <a href="{{ route('login') }}" class="button">{{ date('g:i A', strtotime($item->showtime)) }}</a>
        @endauth
        @endforeach
    </div>
</div>
<div class="check-out">
    <p><a href="{{route('movie')}}">Check out </a>what other movies are showing today!</p>
</div>
<div class="wrapper">
    <div class="pt-10">
        <h2 class="heading">Upcoming Movies</h2>
        <ul class="recent-list clearfix mt-40">
            @foreach ($upcomingMovie_result as $item)
                <li>
                    <a href="{{ route('description-upmovie' , $item->id)}}"><img src="/upimage/{{$item->poster}}" alt="Upcoming Movie Poster"></a>
                    <div class="pt-10 movie-lists"><strong>{{ $item->title }}</strong> <br> <small>{{ $item->duration }} mins</small></div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
