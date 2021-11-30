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
           <div class="title clearfix">
               <div class="movie-title">
                   <h1>{{ $upmovie->title }} </h1>
                   <span>{{ $upmovie->duration }}mins</span>
               </div>
               <div class="btn">
                    <a href="{{ $upmovie->trailer }}" class="trailer-btn button">Trailer</a>
               </div>
           </div>
           <div class="movie-details">
               <p>{{$upmovie->details}}</p>
           </div>
           <div class="description">
               <label for="">Release date : </label>{{$upmovie->release_date}} <br>
               <label for="">Genre : </label>{{$upmovie->genre}}<br>
               <label for="">Casts : </label>{{$upmovie->cast}}<br>
           </div>
       </div>
    </div>
    <div class="check-out">
        <p><a href="{{route('movie')}}">Check out </a>what other movies are showing today.</p>
    </div>
@endsection
