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
                <h2>Create Upcoming Movie</h2>
            </div>
            <div class="right">
                <a class="button" href="{{ URL::previous() }}"> Back</a>
            </div>
    </div>
</div>
<form action="{{ route('upmovie.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="wrapper clearfix">
            <div class="left-con">
            <div class="center">
                <div class="form-input">
                    <div class="preview">
                        <img id="file-ip-1-preview" class="poster create-poster">
                    </div>
                    <label for="file-ip-1" class="button button2">Upload</label>
                    <input type="file" name="poster" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

                </div>
            </div>
            <div class="center">
            <button type="submit" class="button button2">Save</button>
            </div>
            </div>
            <div class="right-con">
                <input type="text" name="title" class="form-control width-1" placeholder="Title">
                <input type="text" name="trailer" class="form-control width-1" placeholder="Trailer">
                <textarea class="form-control width-1" name="details" placeholder="Detail"></textarea>
                <textarea class="form-control width-1" name="cast" placeholder="Casts"></textarea>
                <div class="right-row2 clearfix">
                    <input type="text" name="duration" class="row2-left form-control" placeholder="Duration">
                    <input type="text" name="release_date" class="row2-left form-control" placeholder="2021-12-30">
                </div>
                <div class="right-row2 clearfix">
                    <input type="text" name="genre" class="row2-left form-control" placeholder="Genre">
                </div>
            </div>

        </div>
</form>
@endsection