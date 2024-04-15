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
          <th>Cantidad de asistencias</th>
          <th>Asistencias activas</th>
          <th>Asistencias inactivas</th>
          <th>Contacto</th>

        </tr>
       </thead>
<tbody>
{{-- @forelse ($vistapdf as $asistencia ) --}}
    <tr>
       <th>1}</th>
       <th>2</th>
       <th>3</th>

    </tr>
{{-- @empty
     <p>no hay datos</p>
@endforelse --}}


</tbody>

    </table>


</body>
</html>
