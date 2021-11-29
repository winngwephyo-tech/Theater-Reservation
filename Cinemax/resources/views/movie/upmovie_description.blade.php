@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
<link rel="stylesheet" href="{{ asset('css/movie_description.css')}}">
@endsection

@section('script')
<script src="{{ asset('js/video_popup.js') }}"></script>
@endsection

@section('content')
    <div class="wrapper clearfix">
       <div class="movie-poster mt-20">
          <img src="/upimage/{{ $upmovie->poster }}" alt="">
       </div>
       <div class="movie-description mt-20">
           <div class="title clearfix">
               <div class="movie-title">
                   <h2>{{ $upmovie->title }} </h2>
                   <small>{{ $upmovie->duration }} mins</small>
               </div>
               <div class="btn">
                <button id="show-popup-btn" class="button button2">watch trailer</button>
                <div id="popup-container">
                    <div id="close-btn-container">
                        <span id="close-btn">X</span>
                    </div>
                    <iframe width="450" height="315" src="{{ $upmovie->trailer }}" frameborder="0" allowfullscreen></iframe>
                </div>
               </div>
           </div>
           <div class="movie-details">
               <p><strong>{{$upmovie->details}}</strong></p>
           </div>
           <div class="description">
               <label for=""> <strong>Release date : </strong></label>{{$upmovie->release_date}} <br>
               <label for=""> <strong> Genre :</strong> </label>{{$upmovie->genre}}<br>
               <label for=""> <strong> Casts : </strong></label>{{$upmovie->cast}}<br>
           </div>
       </div>
    </div>
    <div class="check-out">
        <p><a href="{{route('movie')}}">Check out </a>what other movies are showing today.</p>
    </div>
@endsection
