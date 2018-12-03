@extends('articles.admin')

@section('title', 'Add post')

@section('content')


<body>
<main class="container">
    {!! Form::open(['URI' => 'news/create']) !!}
        <h1>Добавить статью</h1>
        <br>
            <form method="post">
            {{--{!! csrf_field() !!}--}}
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
            <p>News:<br><input type="text" name="title" class="form-control" required> </p>
                <p>Desc:<br><textarea type="text" name="desc" class="form-control" required></textarea> </p>
            <p>Gender:<br><select name="gender"><option>Male</option><option>Female</option></select></p>
            <button type="submit" class="btn btn-success">Add</button>
            <br><br>
        </form>
    {!! Form::close() !!}

</main>
</body>
</html>
@endsection