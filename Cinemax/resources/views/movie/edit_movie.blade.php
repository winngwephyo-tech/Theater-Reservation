@extends('layouts.app')

@section('style')
<link href="{{ asset('css/movie/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/movie/common.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('script')
<script src="{{ asset('js/preview_poster.js') }}"></script>
@endsection

@section('content')

<div class="wrapper mt-20">
    <div class="clearfix">
        <div class="left">
            <h2>Edit Movie</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ URL::previous() }}"> Back</a>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<form action="{{ route('movie.update',$movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="wrapper clearfix">
        <div class="left-con">
            <div class="center">
                <div class="form-input">
                    <div class="preview">
                        <img id="file-ip-1-preview" src="/image/{{ $movie->poster }}" class="poster">
                    </div>
                    <label for="file-ip-1" class="button button2">Edit</label>
                    <input type="file" name="poster" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

                </div>
            </div>
            <div class="center">
                <button type="submit" class="button button2">Save</button>
            </div>

        </div>
        <div class="right-con">
            <input type="text" name="title" value="{{ $movie->title }}" placeholder="title" class="form-control width-1">

            <div class="m-10 width-1">
                @foreach($showtime as $key=>$showtime)
                @switch($key)

                @case(0)
                @php
                $showtime1=$showtime->showtime
                @endphp
                @break

                @case(1)
                @php
                $showtime2=$showtime->showtime
                @endphp
                @break

                @case(2)
                @php
                $showtime3=$showtime->showtime
                @endphp
                @break

                @default
                <span>Something went wrong, please try again</span>
                @endswitch



                @endforeach

                <input type="time" class="time-input" name="time1" value="{{ $showtime1}}">
                <input type="time" class="time-input" name="time2" value="{{ $showtime2}}">
                <input type="time" class="time-input" name="time3" value="{{ $showtime3}}">

            </div>

            <input type="text" name="trailer" value="{{ $movie->trailer }}" class="form-control width-1" placeholder="trailer">
            <input type="text" class="form-control width-1" name="details" value="{{ $movie->details }}" placeholder="Detail"></textarea>
            <input type="text" class="form-control width-1" name="cast" value="{{ $movie->cast }}" placeholder="Casts"></textarea>
            <div class="right-row2 clearfix">
                <input type="text" name="duration" value="{{ $movie->duration }}" class="row2-left form-control" placeholder="Duration">
                <select name="theater_id" class="row2-left form-control dropdown">
                    <option value="{{ $movie->theater_id }}">{{ $movie->theater_id }}</option>
                    @foreach($theaters as $theater)
                    <option value="{{$theater->id}}">{{$theater->id}}</option>
                    @endforeach
                </select>
            </div>
            <div class="right-row2 clearfix">
                <input type="text" name="genre" value="{{ $movie->genre }}" class="row2-left form-control" placeholder="Genre">
                <input type="text" name="rating" value="{{ $movie->rating }}" class="row2-left form-control" placeholder="Rating">
            </div>
        </div>
    </div>
    </div>
</form>
@endsection