@extends('layout.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
@endsection

@section('content')
    <div class="wrapper">
        <h1 class="heading">Now Showing</h1>
        <div class="show-list">
            @for($i=1 ; $i<= $no_of_theater ; $i++)
            <div class="img">
               @foreach ($showingMovie_result as $data)
                    @if($i == $data->theater_id)

                    <a href="{{route('description_movie',$data->id) }}"><img src="/image/{{$data->poster}}" alt="Movie Poster"></a>
                           <p>{{ $data->title }}<br> {{ $data->duration }}mins</p>

                    @endif
                @endforeach
            </div>
            @endfor
        </div>
    </div>
    <!-- UPCOMMING -->
    <div class="upcoming-list">
    <div class="ttl">
        <h1 class="heading">Upcoming Movies</h1>
    </div>
    <div class="wrapper">
        <div class="show-list">
                  <div class="img">
                @foreach ($upcomingMovie_result as $item)
                  <img src="/upimage/{{$item->poster}}" alt="Upcoming Movie Poster"> <p>{{ $item->title }} <br> {{ $item->duration }}min</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
description_movie

@endsection
