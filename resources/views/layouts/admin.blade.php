<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/admin/movies">Movies</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/admin/actors">Actors</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/actors/create">Add actor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/genres/create">Add genre</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/movies/create">Add movie</a>
            </li>
        </ul>

    </div>
</nav>

@yield("content")
</body>
</html>
