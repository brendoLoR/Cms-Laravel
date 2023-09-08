<!doctype html>
<html lang="pt_BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="favicon" href="{{asset('/favicon.ico')}}">
    <title>Document</title>
</head>
<body>

<form method="POST" action="{{route('post.store')}}" style="width: 100%; display: block; border: #1a202c solid 1px">
    @csrf

    <input type="text" name="title">

    <textarea name="content"></textarea>

    <input type="submit" value="enviar">
</form>

    @foreach($posts as $post)
        <div style="width: 100%; display: block; border: #1a202c solid 1px">
            {{$post->title}}
            {!! $post->content !!}
        </div>
    @endforeach
</body>
</html>
