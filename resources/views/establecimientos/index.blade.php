<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Establecimientos</title>
</head>
<body>
  <h1>Lista de establecimientos</h1>
  <table>
    <thead>
     <tr>
       <th>nombre</th>
       <th>localidad</th>
       <th>direccion</th>
       <th>contacto</th>
       <th>descripcion</th>
       <th>tipo_negocio</th>
       <th>imagen</th>
       <th>propietario</th>

     </tr>
    </thead>
<tbody>  

  <ul>
    @foreach ($establecimientos as $establecimiento)
      <li>
        <h2>{{ $establecimiento->id_establecimiento}}</h2>
        <h2>{{ $establecimiento->nombre }}</h2>
        <p>Localidad: {{ $establecimiento->localidad }}</p>
        <p>Dirección: {{ $establecimiento->direccion }}</p>
        <p>Contacto: {{ $establecimiento->contacto }}</p>
        <p>Descripción: {{ $establecimiento->descripcion }}</p>
        <p>Tipo de Negocio: {{ $establecimiento->tipo_negocio }}</p>
        <p>Propietario: {{ $establecimiento->propietario }}</p>
        {{-- <a href="{{ route('establecimientos.edit', $establecimiento->id_establecimiento) }}">Editar</a> --}}
      </li>
    @endforeach
  </ul>

</body>
</html>
