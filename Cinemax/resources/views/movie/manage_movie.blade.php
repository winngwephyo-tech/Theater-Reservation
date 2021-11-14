<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" style="text/css" href="{{asset('css/style.css')}}">
    <title>Manage Movie</title>
</head>
<body>
    <div class="container">
        <div class="manage-header clearFix">
            <h1 class="heading">Manage Movies</h1>
            <a href="#" class="button">Back</a>
        </div>
        <div class="show-list">
            @for($i=1 ; $i<=$no_of_theater ; $i++)
                <div class="img">
                    @foreach ($showingMovie_result as $data)
                        @if ($i == $data->theater_id)
                           <a href="{{  route('movie.create') }}"><img src="/image/{{$data->poster}}" alt="Showing Movie Poster"></a>
                           <p>{{ $data->title }}<br> {{ $data->duration }}min</p>
                        @endif
                    @endforeach
                </div>
            @endfor
        </div>
    </div>
    <div class="upcoming-list">
        <div class="ttl">
            <h1 class="heading">Upcoming Movies</h1>
        </div>
        <div class="container">
            <div class="show-list">
                @for ($j=1 ; $j<$no_of_upcomingMovie ;$j++)
                <div class="img">
                    @foreach ($upcomingMovie_result as $item)
                        @if ($j == $item->id)
                            <a href="{{route('movie.edit',$m->id) }}"><img src="/image/{{$item->poster}}" alt="Showing Movie Poster"></a>
                            <p>{{ $item->title }} <br> {{ $item->duration }}min</p>
                        @endif
                    @endforeach
                </div>
                @endfor
            </div>
        </div>
    </div>
</body>
</html>


