<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
    <title>User Movie List</title>
</head>
<body>
    <div class="container">
        <h1 class="heading">Now Showing</h1>
        <div class="show-list">
            @for($i=1 ; $i<= $no_of_theater ; $i++)
                <div class="img">
                    @foreach ($showingMovie_result as $data)
                       @if($i == $data->theater_id)
                           <a href="#"><img src="/image/{{$data->poster}}" alt="Movie Poster"></a>
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
                @for ($j=1 ; $j<=$no_of_upcomingMovie ; $j++)
                <div class="img">
                    @foreach ($upcomingMovie_result as $item)
                        @if($j == $item->id)
                            <img src="/image/{{$item->poster}}" alt="Upcoming Movie Poster">
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


