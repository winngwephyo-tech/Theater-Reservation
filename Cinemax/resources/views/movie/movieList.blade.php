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
                    <a href=""><img src="" alt=""></a>
                    @foreach ($showingMovie_result as $data)
                       <p>{{ $data->title }}<br> {{ $data->duration }}min</p>
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
                    <img src="" alt="">
                    @foreach ($upcomingMovie_result as $item)
                        <p>{{ $item->title }} <br> {{ $item->duration }}min</p>
                    @endforeach
                </div>
                @endfor
            </div>
        </div>
    </div>

</body>
</html>


