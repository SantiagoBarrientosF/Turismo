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

  {{-- <ul>
    @foreach ($establecimientos as $establecimiento)
      <li>
        <h2>{{ $establecimiento->nombre }}</h2>
        <p>Localidad: {{ $establecimiento->localidad }}</p>
        <p>Dirección: {{ $establecimiento->direccion }}</p>
        <p>Contacto: {{ $establecimiento->contacto }}</p>
        <p>Descripción: {{ $establecimiento->descripcion }}</p>
        <p>Tipo de Negocio: {{ $establecimiento->tipo_negocio }}</p>
        <p>Propietario: {{ $establecimiento->propietario }}</p>
      </li>
    @endforeach
  </ul> --}}

</body>
</html>
