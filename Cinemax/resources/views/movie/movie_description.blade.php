@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/movie_description.css')}}">
@endsection

@section('content')
    <div class="wrapper clearfix">
       <div class="movie-poster">
          <img src="/image/{{ $movie->poster }}" alt="Movie poster">
       </div>
       <div class="movie-description">
           <div class="title clearfix">
               <div class="movie-title">
                   <h1>{{ $movie->title }} </h1>
                   <span>{{ $movie->duration }}mins</span>
               </div>
               <div class="btn">
                    <a href="" class="trailer-btn button">Trailer</a>
                    @foreach ($showtime as $item)
                        <a href="#" class="button book-btn">{{ $item -> showtime}}</a>
                    @endforeach
               </div>
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
               <p>This movie is now showing in <span>Theater{{$movie->theater_id}}</span></p>
           </div>
       </div>
    </div>
    <div class="check-out">
        <p><a href="{{route('movie.movieList')}}">Check out </a>what other movies are showing today.</p>
    </div>
    <div class="wrapper">
        <h1 class="heading">Upcoming Movies</h1>
        <ul class="recent-list clearfix">
            @foreach ($upcomingMovie_result as $item)
            <li>
                <img src="/upimage/{{$item->poster}}" alt="Upcoming Movie Poster">
                <p>{{ $item->title }} <br> {{ $item->duration }}min</p>
            </li>
            @endforeach
        </ul>
    </div>

@endsection
