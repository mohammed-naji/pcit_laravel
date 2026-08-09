<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts Page</title>
</head>

<body>
    @foreach ($posts as $abc)
        <h2>Post Title: {{ $abc['title'] }}</h2>
        <p>Post Content: {{ $abc['content'] }}</p>
        <hr>
    @endforeach
</body>

</html>
