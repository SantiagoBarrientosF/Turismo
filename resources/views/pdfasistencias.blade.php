<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Informe de asistencias</h1>
    <table>
       <thead>
        <tr>
          <th>nombre</th>
          <th>direccion</th>
          <th>imagen</th>

        </tr>
       </thead>
<tbody>
@forelse ($asistencias as $asistencia )
    <tr>
       <th>{{$asistencia->nombre}}</th>
       <th>{{$asistencia->direccion}}</th>
       <th><img src="{{public_path('imagenes/establecimientos'.$asistencia->imagen)}}"></th>

    </tr>
@empty
     <p>no hay datos</p>
@endforelse


</tbody>

    </table>


</body>
</html>
