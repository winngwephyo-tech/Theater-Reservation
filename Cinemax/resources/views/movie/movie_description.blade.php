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
                    <div>
                        @foreach ($showtime as $item)
                            <a href="{{ route('booking.create', ['movie_id' => $item->movie_id, 'showtime_id' => $item->id]) }}" class="button">{{ date('g:i A', strtotime($item->showtime)) }}</a>
                        @endforeach
                    </div>
               </div>
           </div>
           <div class="movie-trailer">
                <a href="{{ $movie->trailer }}" class="button button2">Watch Trailer</a>
           </div>
           <div class="movie-details">
               <p>{{$movie->details}}</p>
           </div>
           <div class="description">
               <label for="">Genre : </label>{{$movie->genre}}<br>
               <label for="">Rating : </label>{{$movie->rating}}<br>
               <label for="">Casts : </label>{{$movie->cast}}<br>
           </div>
           <div class="showing-theater">
               <p>This movie is now showing in <strong>Theater{{$movie->theater_id}}</strong></p>
           </div>
       </div>
    </div>
    <div class="check-out">
        <p><a href="{{route('movie')}}">Check out </a>what other movies are showing today!</p>
    </div>
@endsection


