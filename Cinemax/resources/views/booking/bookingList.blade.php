<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
</head>

<body>
    <Table>
        <thead>
            <tr>
                <th>Id</th>
                <th>User Name</th>
                <th>Movie</th>
                <th>Seats</th>
                <th>ShowTime</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookingList as $book)
            <tr>
                <td>{{$book->id}}</td>
                <td>{{$book->name}}</td>
                <td>{{$book->title}}</td>
                <td>{{$book->display_id}}</td>
                <td>{{$book->showtime}}</td>
                <td>3000</td>
                <td>Cancel</td>
            </tr>
            @endforeach
        </tbody>
    </Table>
</body>

</html>