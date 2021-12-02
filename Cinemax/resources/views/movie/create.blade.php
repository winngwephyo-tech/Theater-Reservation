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
            <h2>Create Now Showing Movie</h2>
        </div>
        <div class="right">
            <a class="button" href="{{ route('admin-movie') }}"> Back</a>
        </div>
    </div>

    @if ($errors->any())
    <div class="line line-round">
        <ul class="alert">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<form action="{{ route('movie-store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="wrapper clearfix">
        <div class="left-con">
            <div class="center">
                <div class="form-input">
                    <div class="preview">
                        <img id="file-ip-1-preview" class="poster create-poster">
                    </div>
                    <label for="file-ip-1" class="button button2">Upload Poster</label>
                    <input type="file" name="poster" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

                </div>
            </div>
            <div class="center">
                <button type="submit" class="button button2">Save</button>
            </div>
        </div>
        <div class="right-con">
            <input type="text" name="title" placeholder="Title" class="form-control width-1">
            <div class="m-10 width-1">
                <input type="time" class="time-input" name="time1">
                <input type="time" class="time-input" name="time2">
                <input type="time" class="time-input" name="time3">
            </div>
            <input type="text" name="trailer" class="form-control width-1" placeholder="Trailer">
            <textarea class="form-control width-1" name="details" placeholder="Detail"></textarea>
            <div class="right-row2 clearfix">
                <textarea class="form-control width-1" name="cast" placeholder="Casts"></textarea>
                <div class="right-row2 clearfix">
                    <input type="text" name="duration" class="row2-left form-control" placeholder="Duration">
                    <select name="theater_id" class="row2-left form-control">
                        <option value="">Select Theater ID</option>
                        @foreach($theaters as $theater)
                        <option value="{{$theater->id}}">{{$theater->id}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" name="genre" class="row2-left form-control" placeholder="Genre">
                <input type="text" name="rating" class="row2-left form-control" placeholder="Rating">
            </div>
        </div>

    </div>

</form>
<!-- @if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif -->
@if ($errors->any())
<div>{{$errors->first()}} </div>
@endif
@endsection