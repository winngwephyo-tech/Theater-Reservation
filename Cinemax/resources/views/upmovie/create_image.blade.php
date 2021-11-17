@extends('layouts.app')

@section('style')

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

    <div class="container">
        <div class="content clearfix">
            <div class="left-con">
                <div>
                    <input type="file" name="poster" placeholder="image">
                    <img src="" class="img-poster">
                </div>
                <button type="submit" class="btn">Save</button>
                <div>
                    <a href="#" class="btn">Back</a>
                </div>
            </div>
            <div class="right-con">
                <input type="text" name="title" class="movie-title" placeholder="Title">

                <div class="right-row2 clearfix">
                    <input type="text" name="duration" class="row2-left" placeholder="Duration">
                    <input type="text" name="release_date" class="row2-left" placeholder="release_date">
                </div>
                <textarea class="detail" name="details" placeholder="Detail"></textarea>
                <input type="text" name="trailer" class="movie-title" placeholder="trailer">
                <div class="right-row2 clearfix">
                    <input type="text" name="genre" class="row2-left" placeholder="Genre">
                </div>
                <textarea class="detail" name="cast" placeholder="Casts"></textarea>
            </div>

        </div>
    </div>
</form>