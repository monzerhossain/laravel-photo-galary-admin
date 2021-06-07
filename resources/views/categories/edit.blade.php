<!DOCTYPE html>
<html>
<head>
    <title>Photo Gallery Admin </title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('categories') }}">Category</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('categories') }}">View All Categories</a></li>
            <li><a href="{{ URL::to('categories/create') }}">Create a category</a>
        </ul>
    </nav>

    <h1>Edit {{ $category->name }}</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::model($category, array('route' => array('categories.update', $category->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>


    {{ Form::submit('Edit the category', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>