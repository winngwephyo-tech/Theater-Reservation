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

 <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Theater id:</strong>
            <input type="text" name="theater_id" class="form-control" placeholder="TheaterID">
        </div>
    </div><div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Genre:</strong>
            <input type="text" name="genre" class="form-control" placeholder="Genre">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" class="form-control" placeholder="title">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Image:</strong>
            <input type="file" name="poster" class="form-control" placeholder="image">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Detail:</strong>
            <textarea class="form-control" style="height:150px" name="details" placeholder="Detail"></textarea>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Rating</strong>
            <input type="text" name="rating" class="form-control" placeholder="Rating">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Trailer</strong>
            <input type="text" name="trailer" class="form-control" placeholder="trailer">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Duration</strong>
            <input type="text" name="duration" class="form-control" placeholder="Duration">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cast</strong>
            <input type="text" name="cast" class="form-control" placeholder="cast">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</form>
