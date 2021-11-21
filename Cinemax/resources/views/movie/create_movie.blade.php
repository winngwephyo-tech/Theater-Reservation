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
<form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="wrapper clearfix">
        <div class="left-con">
            <div class="center">
                <div class="form-input">
                    <div class="preview">
                        <img id="file-ip-1-preview">
                    </div>
                    <label for="file-ip-1">Upload Poster Image</label>
                    <input type="file" name="poster" id="file-ip-1" accept="image/*" onchange="showPreview(event);">

                </div>
            </div>
            <div class="center">
            <button type="submit" class="button button2">Save</button>
            </div>
            <div class="center">
                <a href="{{ URL::previous() }}" class="button button2">Back</a>
            </div>
        </div>
        <div class="right-con">
            <input type="text" name="title" placeholder="title" class="movie-title form-control">
            <div class="time-style form-control">
                <span class="span-showtime">Add ShowTime</span>
                <input type="time" name="time1">
                <input type="time" name="time2">
                <input type="time" name="time3">
            </div>
            <div class="right-row2 clearfix">
                <input type="text" name="duration" class="row2-left form-control" placeholder="Duration">
                <input type="text" name="theater_id" class="row2-right form-control" placeholder="TheaterID">
            </div>
            <textarea class="detail form-control" name="details" placeholder="Detail"></textarea>
            <input type="text" name="trailer" class="movie-title form-control" placeholder="trailer">
            <div class="right-row2 clearfix">
                <input type="text" name="genre" class="row2-left form-control" placeholder="Genre">
                <input type="text" name="rating" class="row2-right form-control" placeholder="Rating">
            </div>
            <textarea class="detail form-control" name="cast" placeholder="Casts"></textarea>
        </div>

    </div>

</form>
<!-- <script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
        }
    }
</script> -->




@endsection