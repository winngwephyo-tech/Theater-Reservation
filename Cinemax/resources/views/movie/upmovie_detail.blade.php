@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
<link rel="stylesheet" href="{{ asset('css/movie_description.css')}}">
@endsection

@section('content')
    <div class="wrapper clearfix">
       <div class="movie-poster mt-20">
          <img src="/upimage/{{ $upmovie->poster }}" alt="">
       </div>
       <div class="movie-description mt-20">
            <div class="upmovie-title">
                <h2>{{ $upmovie->title }} </h2>
                <small>{{ $upmovie->duration }}mins</small>
            </div>
           <div class="movie-trailer">
            <a href="{{ $upmovie->trailer }}" class="trailer-btn button">Watch Trailer</a>
           </div>
           <div class="movie-details font-size">
               <p>{{$upmovie->details}}</p>
           </div>
           <div class="description font-size">
               <label for="">Release date : </label>{{$upmovie->release_date}} <br>
               <label for="">Genre : </label>{{$upmovie->genre}}<br>
               <label for="">Casts : </label>{{$upmovie->cast}}<br>
           </div>
       </div>
    </div>
    <div class="check-out">
        <p class="font-size"><a href="{{route('movie')}}">Check out </a>what other movies are showing today.</p>
    </div>
@endsection
