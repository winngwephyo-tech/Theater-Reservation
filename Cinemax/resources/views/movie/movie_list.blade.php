@extends('layout.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
@endsection

@section('content')
<div class="wrapper">
    <h1 class="heading">Now Showing</h1>
    <ul class="recent-list clearfix">
        @for($i=1 ; $i<= $no_of_theater ; $i++)
        @foreach ($showingMovie_result as $data)
         @if($i==$data->theater_id)
            <li>
                <a href="{{route('description_movie',$data->id) }}"><img src="/image/{{$data->poster}}" alt="Movie Poster"></a>
                <p>{{ $data->title }}<br> {{ $data->duration }}mins</p>
            </li>
            @endif
            @endforeach
            @endfor
    </ul>
</div>

@endsection
