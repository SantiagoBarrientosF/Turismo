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
          <th>Id</th>
          <th>Nombre establecimiento</th>
          <th>tipo_establecimiento</th>
          <th>Contacto</th>

        </tr>
       </thead>
<tbody>
{{-- @forelse ($establecimientos as $establecimiento ) --}}
    <tr>
       <th>1</th>
       <th>2</th>
       <th>3</th>
       <th>4</th>

    </tr>
{{-- @empty
     <p>no hay datos</p>
@endforelse --}}


</tbody>

    </table>
</body>
</html>