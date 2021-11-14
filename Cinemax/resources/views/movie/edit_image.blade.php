<link href="{{ asset('css/movie/style.css') }}" rel="stylesheet" type="text/css">
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

<form action="{{ route('movie.update',$movie->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container">
        <div class="content clearfix">
            <div class="left-con">
                <div>
                    <input type="file" name="poster" placeholder="image">
                    <img src="/image/{{ $movie->poster }}" width="300px" class="img-poster">
                </div>
                <button type="submit" class="btn">Save</button>
                <div>
                    <a href="#" class="btn">Back</a>
                </div>
            </div>
            <div class="right-con">
                <input type="text" name="title" value="{{ $movie->title }}" placeholder="title" class="movie-title">
                <div class="right-row2 clearfix">
                    <input type="text" name="duration" value="{{ $movie->duration }}" class="row2-left" placeholder="Duration">
                    <input type="text" name="theater_id" value="{{ $movie->theater_id }}" class="row2-right" placeholder="TheaterID">
                </div>
                <input type="text" class="detail" name="details" value="{{ $movie->details }}" placeholder="Detail"></textarea>
                <input type="text" name="trailer" value="{{ $movie->trailer }}" class="movie-title" placeholder="trailer">
                <div class="right-row2 clearfix">
                    <input type="text" name="genre" value="{{ $movie->genre }}" class="row2-left" placeholder="Genre">
                    <input type="text" name="rating" value="{{ $movie->rating }}" class="row2-right" placeholder="Rating">
                </div>
                <input type="text" class="detail" name="cast" value="{{ $movie->cast }}" placeholder="Casts"></textarea>
            </div>
        </div>
    </div>
</form>