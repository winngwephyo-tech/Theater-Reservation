@extends('layouts.app')

@section('style')
<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
@endsection

@section('content')
<div class="wrapper mt-20">
    <div class="clearfix pt-20">
            <div class="left">
                <h2>Manage Movies</h2>
            </div>
            <div class="right">
                <a class="button" href="{{ url('/admin') }}"> Back</a>
            </div>
    </div>
    <h3>Now Showing</h3>
    <ul class="recent-list clearfix mt-20">

        @for($i=1 ; $i<=$no_of_theater ; $i++) @foreach ($showingMovie_result as $data) @if ($i==$data->theater_id)
            <li>
                <a href="{{  route('movie-edit',$data->id) }}"><img src="/image/{{$data->poster}}" alt="Showing Movie Poster"></a>
                <div class="pt-10 movie-lists"><strong>{{ $data->title }}</strong> <br> <small>{{ $data->duration }} mins</small></div>
            </li>

            @endif
            @endforeach
            @endfor
            <li>
                <a href="{{  route('movie-create') }}">
                    <div class="add-movie">
                        <i class="fas fa-plus"></i>
                    </div>
                </a>
            </li>
    </ul>
</div>
<div class="line"></div>
<!-- manage upcomming -->
<div class="wrapper">
    <div class="pt-10">
        
        <h3>Upcoming</h3>
        <ul class="recent-list clearfix mt-20">

            @foreach ($upcomingMovie_result as $item)
            <li>
                <a href="{{  route('upmovie-edit',$item->id) }}"><img src="/upimage/{{$item->poster}}" alt="Showing Movie Poster"></a>
                <div class="pt-10 movie-lists"><strong>{{ $item->title }}</strong> <br> <small>{{ $item->duration }} mins</small></div>

            </li>
            @endforeach

            <li>
                <a href="{{route('upmovie-create') }}">
                    <div class="add-movie">
                        <i class="fas fa-plus"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    </div>
</div>

@endsection