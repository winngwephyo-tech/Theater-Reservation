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

@section('content')
<div class="wrapper mt-20">
    <div class="clearfix">
            <div class="left">
                <h2>Edit Upcoming Movie</h2>
            </div>
            <div class="right">
                <a class="button" href="{{ URL::previous() }}"> Back</a>
            </div>
    </div>
</div>
<form action="{{ route('upmovie.update',$upmovie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="wrapper clearfix">
        <div class="left-con">
            <div class="center">
                <div class="form-input">
                    <div class="preview">
                        <img id="file-ip-1-preview">
                    </div>
                    <label for="file-ip-1" class="button button2">Edit</label>
                    <input type="file" name="poster" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

                </div>
            </div>
            <div class="center">
                <button type="submit" class="button button2">Save</button>
            </div>
            <div class="center">
                <a href="{{route('upmovie.delete',$upmovie->id) }}" class="button delete">Delete</a>
            </div>
        </div>
        <div class="right-con">
            <input type="text" name="title" value="{{$upmovie->title }}" placeholder="title" class="form-control width-1">
            <input type="text" name="trailer" value="{{$upmovie->trailer }}" class="form-control width-1" placeholder="trailer">
            <input type="text" class="form-control width-1" name="details" value="{{$upmovie->details }}" placeholder="Detail"></textarea>
            <input type="text" class="form-control width-1" name="cast" value="{{$upmovie->cast }}" placeholder="Casts"></textarea>
            <div class="right-row2 clearfix">
                <input type="text" name="duration" value="{{$upmovie->duration }}" class="row2-left form-control" placeholder="Duration">
                <input type="text" name="release_date" value="{{$upmovie->release_date }}" placeholder="release_date" class="row2-left form-control">
            </div>
            <div class="right-row2 clearfix">
                <input type="text" name="genre" value="{{$upmovie->genre }}" class="row2-left form-control" placeholder="Genre">
            </div>
        </div>
    </div>
</form>
@endsection