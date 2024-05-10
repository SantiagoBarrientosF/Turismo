<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Establecimiento Registrado</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        .email-header {
            text-align: center;
        }
        .email-header img {
            max-width: 200px;
        }
        .email-content {
            margin-top: 20px;
        }
        .email-content h1 {
            color: rgb(32, 32, 32);
        }
        .email-content p {
            margin-bottom: 10px;
        }
        .email-content button, a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: #fff;
            background-color: #17191c;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <img src="{{url('imagenes/logo.jpg')}}">
        </div>
        <div class="email-content">
            <h1>Nuevo establecimiento</h1>
            <p>Hola, alguien ha completado el formulario de registro.</p>
            <p>Nombre del establecimiento: {{$establecimiento->nombre}}</p>
            <p>Propietario: {{$establecimiento->propietario}}</p>
            <p>Contacto: {{$establecimiento->contacto}}</p>
            <p>¿Desea permitir el registro del nuevo establecimiento?</p>
           
            <a href="{{route('activar', ["id_establecimiento" => $establecimiento->id_establecimiento])}}">Activar</a>
            
        </div>
    </div>
</body>
</html>
