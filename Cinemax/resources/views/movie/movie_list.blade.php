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
    <!-- UPCOMMING -->
    <div class="upcoming-list">
    <div class="ttl">
        <h1 class="heading">Upcoming Movies</h1>
    </div>
    <div class="wrapper">
        <div class="show-list">
            @for ($j=1 ; $j<=$no_of_upcomingMovie ; $j++)
            <div class="img">
                @foreach ($upcomingMovie_result as $item)
                    @if($j == $item->id)
                        <img src="/image/{{$item->poster}}" alt="Upcoming Movie Poster">
                        <p>{{ $item->title }} <br> {{ $item->duration }}min</p>
                    @endif
                @endforeach
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection
