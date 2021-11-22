@extends('layouts.app')

@section('style')
<link href="{{ asset('css/movie/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/movie/common.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('script')
<script src="{{ asset('js/preview_poster.js') }}"></script>
@endsection
@error('Test Data')
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
@enderror

<form action="{{ route('upmovie.update',$upmovie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="wrapper clearfix">
        <div class="left-con">
            <div class="form-input">
                <div class="preview">
                    <img id="file-ip-1-preview" src="/upimage/{{ $upmovie->poster }}" style="display: block;">
                </div>
                <label for="file-ip-1">Edit Poster Image</label>
                <input type="file" name="poster" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

            </div>
            <div class="center">
                <button type="submit" class="button button2">Save</button>
            </div>
            <div class="center">
                <a href="{{ URL::previous() }}" class="button button2">Back</a>
            </div>
            <div>
                <a href="{{route('upmovie.delete',$upmovie->id) }}" class="button delete">Delete</a>
            </div>
        </div>
        <div class="right-con">
            <input type="text" name="title" value="{{$upmovie->title }}" placeholder="title" class="movie-title form-control">
            <div class="right-row2 clearfix">
                <input type="text" name="duration" value="{{$upmovie->duration }}" class="row2-left form-control" placeholder="Duration">
                <input type="text" name="release_date" value="{{$upmovie->release_date }}" placeholder="release_date" class="row2-left form-control">
            </div>
            <input type="text" class="detail form-control" name="details" value="{{$upmovie->details }}" placeholder="Detail"></textarea>
            <input type="text" name="trailer" value="{{$upmovie->trailer }}" class="movie-title form-control" placeholder="trailer">
            <div class="right-row2 clearfix">
                <input type="text" name="genre" value="{{$upmovie->genre }}" class="row2-left form-control" placeholder="Genre">
            </div>
            <input type="text" class="detail form-control" name="cast" value="{{$upmovie->cast }}" placeholder="Casts"></textarea>
        </div>
    </div>
</form>