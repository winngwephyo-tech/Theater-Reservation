<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie List</title>
</head>

<body>
    <div>
        <a class="btn btn-success" href="{{ route('movie.create') }}"> Create New Movie</a>

    </div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Theater Id</th>
                <th>Genre</th>
                <th>Title</th>
                <th>Poster</th>
                <th>Details</th>
                <th>Rating</th>
                <th>Trailer</th>
                <th>duration</th>
                <th>Cast</th>
                <th>Action</th>
            </tr>
        <tbody>
            @foreach ($movie as $m)
            <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->release_date}}</td>
                <td>{{$m->genre}}</td>
                <td>{{$m->title}}</td>
                <td><img src="/image/{{$m->poster}}" width="100px"></td>
                <td>{{$m->details}}</td>
                <td>{{$m->rating}}</td>
                <td>{{$m->trailer}}</td>
                <td>{{$m->duration}}</td>
                <td>{{$m->cast}}</td>
                <td><a class="btn btn-primary" href="{{ route('movie.edit',$m->id) }}">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </thead>
    </table>
</body>

</html>

