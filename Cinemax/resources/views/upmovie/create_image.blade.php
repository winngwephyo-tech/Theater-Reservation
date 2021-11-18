@extends('layouts.app')

@section('style')
<link href="{{ asset('css/movie/style.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('css/movie/common.css') }}" rel="stylesheet" type="text/css">
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


<form action="{{ route('upmovie.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="wrapper clearfix">
            <div class="left-con">
                <div>
                    <input type="file" name="poster" placeholder="image">
                    <img src="" class="img-poster">
                </div>
                <button type="submit" class="button button2">Save</button>
                <div>
                    <a href="#" class="button button2">Back</a>
                </div>
            </div>
            <div class="right-con">
                <input type="text" name="title" class="movie-title form-control" placeholder="Title">

                <div class="right-row2 clearfix">
                    <input type="text" name="duration" class="row2-left form-control" placeholder="Duration">
                    <input type="text" name="release_date" class="row2-left form-control" placeholder="release_date">
                </div>
                <textarea class="detail form-control" name="details" placeholder="Detail"></textarea>
                <input type="text" name="trailer" class="movie-title form-control" placeholder="trailer">
                <div class="right-row2 clearfix">
                    <input type="text" name="genre" class="row2-left form-control" placeholder="Genre">
                </div>
                <textarea class="detail form-control" name="cast" placeholder="Casts"></textarea>
            </div>

        </div>
</form>