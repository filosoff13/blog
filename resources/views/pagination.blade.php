<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <h1>List of news</h1>
    Felter:
    <a href="/news/?gender=female">Female</a>
    <a href="/news/?gender=male">Male</a>
    <a href="/news">Reset</a>
<table>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">News</th>
        <th scope="col">Desc</th>
        <th scope="col">Gender</th>
    </tr>
    </thead>
    <tbody>


    @foreach ($news as $n)
        <tr>
            <td>{{ $n->id }}</td>
            <td>{{ $n->news }}</td>
            <td>{{ $n->desc }}</td>
            <td>{{ $n->gender }}</td>
            <td><form action="{{ route('artDel', ['news'=> $n->id]) }}" method="post">
                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                <button type="submit" class="btn btn-danger">Delete</button>
            </form></td>
            <td><form action="{{ route('artShow', ['news'=> $n->id]) }}" method="post">
                    {{--<input type="hidden" name="_method" value="DELETE">--}}
{{--                    {{ method_field('DELETE') }}--}}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-primary">View</button>
                </form></td>
            <td><form action="{{ route('artEdit', ['news'=> $n->id]) }}" method="post">
                    {{--<input type="hidden" name="_method" value="DELETE">--}}
                    {{--                    {{ method_field('DELETE') }}--}}
                    {{ csrf_field() }}
                    <button type="submit" class="">Edit</button>
                </form></td>
        </tr>
    @endforeach

    {{ $news->links() }}
        {{--<td>{{$news->id}}</td>--}}
        {{--<td>{{$news->news}}</td>--}}
        {{--<td>{{$news->desc}}</td>--}}

    </tbody>
</table>
    <div>
        <a href="/news/create">Create new article</a>
    </div>
</div>
</body>
</html>