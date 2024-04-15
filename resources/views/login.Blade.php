<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('started_session')}}">
        @csrf
<label>
    <input name="email" type="email" placeholder="email">
</label><br>
<label>
    <input name="password" type="password" placeholder="Contraseña">
</label><br>
 <button type="submit">Login</button>
    </form>
</body>
</html>
