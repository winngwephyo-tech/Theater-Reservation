@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="heading">Now Showing</h1>
    <div class="show-list">
       <?php $count= $theater; ?>
        @for($i=1 ; $i<=$count ; $i++)
            <div class="img">
                <a href=""><img src="" alt=""></a>
                @foreach ($showingMovie_value as $data)
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
            <?php $count= $upcomingMovie; ?>
            @for ($j=1 ; $j<$count ;$j++)
            <div class="img">
                <img src="" alt="">
                @foreach ($upcomingMovie_value as $item)
                    <p>{{ $item->title }} <br> {{ $item->duration }}min</p>
                @endforeach
            </div>
            @endfor
        </div>
    </div>
</div>

@endsection
