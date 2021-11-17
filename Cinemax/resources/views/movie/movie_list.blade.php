@extends('layout.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
@endsection

@section('content')
    <div class="wrapper">
        <h1 class="heading">Now Showing</h1>
        <div class="show-list">
            @for($i=1 ; $i<= $no_of_theater ; $i++)
               @foreach ($showingMovie_result as $data)
                    @if($i == $data->theater_id)
                       <div class="img">
                           <a href="#"><img src="/image/{{$data->poster}}" alt="Movie Poster"></a>
                           <p>{{ $data->title }}<br> {{ $data->duration }}mins</p>
                        </div>
                    @endif
                @endforeach
            @endfor
        </div>
    </div>
@endsection
