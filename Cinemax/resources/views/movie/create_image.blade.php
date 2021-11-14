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

<form action="{{ route('movie.store') }}" method="POST" enctype="multipart/form-data">
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
                <input type="text" name="title" placeholder="title" class="movie-title">
                <div class="right-row2 clearfix">
                    <input type="text" name="duration" class="row2-left" placeholder="Duration">
                    <input type="text" name="theater_id" class="row2-right" placeholder="TheaterID">
                </div>
                <textarea class="detail" name="details" placeholder="Detail"></textarea>
                <input type="text" name="trailer" class="movie-title" placeholder="trailer">
                <div class="right-row2 clearfix">
                    <input type="text" name="genre" class="row2-left" placeholder="Genre">
                    <input type="text" name="rating" class="row2-right" placeholder="Rating">
                </div>
                <textarea class="detail" name="cast" placeholder="Casts"></textarea>
            </div>

        </div>
    </div>
</form>