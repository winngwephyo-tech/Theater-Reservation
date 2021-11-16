@extends('layout.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/movie_description.css')}}">
@endsection

@section('content')
    <div class="wrapper clearfix">
       <div class="movie-poster">
          <img src="" alt="">
       </div>
       <div class="movie-description">
           <div class="title clearfix">
               <div class="movie-title">
                   <h2>movie title <br> <span>mins</span></h2>
               </div>
               <div class="btn">
                    <a href="" class="trailer-btn button">Trailer</a>
                    <a href="" class="button">Book Now</a>
               </div>
           </div>
           <div class="movie-details">
               <p>movie details</p>
           </div>
           <div class="description">
                Initial release : <br>
                Director : <br>
                Adapted from : <br>
                Costume design : <br>
           </div>
           <div class="showing-theater">
               <p>This movie is now showing in <span></span></p>
           </div>
       </div>
    </div>
    <div class="check-out">
        <p><a href="">Check out </a>what other movies are showing today.</p>
    </div>
@endsection
