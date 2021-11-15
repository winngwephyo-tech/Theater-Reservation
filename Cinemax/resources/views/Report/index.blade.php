<!DOCTYPE html>
<html>
<head>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    
<a class="btn btn-success ml-3" href="{{ url('/export_reports') }}"> Export</a>
<a class="btn btn-success ml-3" href="{{ url('/delete_and_export_reports') }}"> Delete and Export</a>
<table class="table table-bordered mt-5">
        <tr>
            <th>No</th>
            <th>Movie Title</th>
            <th>Income</th>
            <th>Rating</th>
        </tr>
        @foreach ($reports as $report)
        <tr>
            <td>{{ $report->id }}</td>
            <td>{{ $report->title }}</td>
            <td>{{ $report->income }}</td>
            <td>{{ $report->rating }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>