<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('add_register') }}" method="POST">
        @csrf
        <label>
    <input name="name" type="text" placeholder="name">
</label><br>
<label>
    <input name="email" type="email" placeholder="email">
</label><br>
<label>
    <input name="password" type="password" placeholder="Contraseña">
</label><br>
 <button type="submit">enviar</button>
    </form>
</body>
</html>