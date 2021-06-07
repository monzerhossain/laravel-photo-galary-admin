<!DOCTYPE html>
<html>
<head>
    <title>Photo Gallery Admin</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('categories') }}">Category Admin</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('categories') }}">View All Categories</a></li>
            <li><a href="{{ URL::to('categories/create') }}">Create a category</a>
        </ul>
    </nav>

    <h1>Showing {{ $category->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $category->name }}</h2>
        <p>
            <strong>Description:</strong> {{ $category->description }}<br>
        </p>
    </div>

</div>
</body>
</html>