<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Add new role form</h2>
    <form role="form" method="POST" action="{{route('admin.role.store')}}">
        @csrf

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>

            @foreach($routes as $r)
            <div class="form-group">
            <input type="checkbox" class="form-check-input" name="route[]" value="{{$r}}">
            <label class="form-check-label" >{{$r}}</label>
            </div>
            @endforeach4
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

</body>
</html>
