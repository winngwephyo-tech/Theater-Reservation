@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
<link rel="stylesheet" href="{{ asset('css/movie_description.css')}}">
@endsection

@section('content')
    <div class="wrapper clearfix">
        <div class="clearfix">
                <div class="right">
                    <a class="button" href="{{ URL::previous() }}"> Back</a>
                </div>
        </div>
       <div class="movie-poster mt-20">
          <img src="/image/{{ $movie->poster }}" alt="">
       </div>
       <div class="movie-description mt-20">
           <div class="title clearfix">
               <div class="movie-title">
                   <h1>{{ $movie->title }} </h1>
                   <span>{{ $movie->duration }}mins</span>
               </div>
               <div class="btn">
                    <div>
                        @foreach ($showtime as $item)
                            <a href="{{ route('booking.create', ['movie_id' => $item->movie_id, 'showtime_id' => $item->id]) }}" class="button">{{ $item -> showtime}}</a>
                        @endforeach
                    </div>
                    <a href="{{ $movie->trailer }}" class="trailer-btn button">Trailer</a>
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
        <p><a href="{{route('movie')}}">Check out </a>what other movies are showing today.</p>
    </div>
@endsection


