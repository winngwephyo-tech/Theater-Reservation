@extends('layout.app')

@section('style')
<link rel="stylesheet" href="{{ asset('css/movie.css')}}">
<link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
@endsection

@section('content')
    <div class="wrapper">
        <div class="manage-header clearFix">
            <h1 class="heading">Manage Movies</h1>
            <a href="#" class="button">Back</a>
        </div>
        <div class="show-list">
            @for($i=1 ; $i<=$no_of_theater ; $i++)

                @foreach ($showingMovie_result as $data)

                    @if ($i == $data->theater_id)
                    <div class="img">
                        <a href="{{  route('movie.create') }}"><img src="/image/{{$data->poster}}" alt="Showing Movie Poster"></a>
                        <p>{{ $data->title }}<br> {{ $data->duration }}mins</p>
                    </div>
                    @endif

                @endforeach

            @endfor
        </div>
        <a href="#">
            <div class="add-movie">
                <i class="fas fa-plus"></i>
            </div>
        </a>
    </div>
@endsection
