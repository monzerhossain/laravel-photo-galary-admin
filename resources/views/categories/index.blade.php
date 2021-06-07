

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
        <a class="navbar-brand" href="{{ URL::to('categories') }}">Categories</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('categories') }}">View All categories</a></li>
        <li><a href="{{ URL::to('categories/create') }}">Create a category</a>
        <li class="pull-right"><a href="{{ URL::to('dashboard') }}">Admin Home</a>
    </ul>
</nav>

<h1>All the category</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Description</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the category (uses the destroy method DESTROY /categories/{id} -->
                 {{ Form::open(array('url' => 'categories/' . $value->id, 'class' => 'pull-right')) }}
                 {{ Form::hidden('_method', 'DELETE') }}
                 {{ Form::submit('Delete this category', array('class' => 'btn btn-warning')) }}
                 {{ Form::close() }}

                <!-- edit this category (uses the edit method found at GET /categories/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('categories/' . $value->id . '/edit') }}">Edit this category</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</div>
</body>
</html>