@extends('layouts.app')

@section('style')

<link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
@endsection

@section('content')
<div class="wrapper mt-20">
    <h2 class="heading">Now Showing</h2>
    <ul class="recent-list clearfix mt-40">
        @for($i=1 ; $i<= $no_of_theater ; $i++)
        @foreach ($showingMovie_result as $data)
        @if($i==$data->theater_id)
            <li>
                <a href="{{route('description_movie',$data->id) }}"><img src="/image/{{$data->poster}}" alt="Movie Poster"></a>
                <div class="pt-10 movie-lists"><strong>{{ $data->title }}</strong> <br> <small>{{ $data->duration }} mins</small></div>
            </li>
        @endif
        @endforeach
        @endfor
    </ul>
</div>
<div class="line"></div>
<!-- UPCOMMING -->
<div class="wrapper">
    <div class="pt-10">
        <h2 class="heading">Upcoming Movies</h2>
        <ul class="recent-list clearfix mt-40">
            @foreach ($upcomingMovie_result as $item)
                <li>
                    <a href="{{ route('description_upmovie' , $item->id)}}"><img src="/upimage/{{$item->poster}}" alt="Upcoming Movie Poster"></a>
                    <div class="pt-10 movie-lists"><strong>{{ $item->title }}</strong> <br> <small>{{ $item->duration }} mins</small></div>
                </li>
            @endforeach
        </ul>
    </div>
</div>


@endsection
