@extends('layout.app')

@section('style')
<link rel="stylesheet" href="{{asset('css/upcommingmovie.css')}}">
@endsection

@section('content')
<div class="upcoming-list">
    <div class="ttl">
        <h1 class="heading">Upcoming Movies</h1>
    </div>
    <div class="container">
        <div class="show-list">
            @for ($j=1 ; $j<$no_of_upcomingMovie ;$j++)
            <div class="img">
                @foreach ($upcomingMovie_result as $item)
                    @if ($j == $item->id)
                        <a href="{{route('movie.edit',$m->id) }}"><img src="/image/{{$item->poster}}" alt="Showing Movie Poster"></a>
                        <p>{{ $item->title }} <br> {{ $item->duration }}min</p>
                    @endif
                @endforeach
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection
