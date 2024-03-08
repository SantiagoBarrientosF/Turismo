<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @csrf
    <p>Buenos dias @auth
        {{Auth::user()->name}}
    @endauth
    <img src="https://s3.getstickerpack.com/storage/uploads/sticker-pack/piolin-cute/sticker_1.png?84b38503e754d970938c7c9fa746718f&d=200x200">

    <button><a href="{{route('exit_session')}}">Salir</button>
</body>
</html>
