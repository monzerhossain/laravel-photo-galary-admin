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
            <a class="navbar-brand" href="{{ URL::to('categories') }}">Category</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ URL::to('categories') }}">View All categories</a></li>
            <li><a href="{{ URL::to('categories/create') }}">Create a category</a>
        </ul>
    </nav>

    <h1>Create a category</h1>

    <!-- if there are creation errors, they will show here -->
    {{ Html::ul($errors->all()) }}

    {{ Form::open(array('url' => 'categories')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', Input::old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
    </div>



    {{ Form::submit('Create the category', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</body>
</html>