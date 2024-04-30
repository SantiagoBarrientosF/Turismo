<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <body>
        <h1>Informe de asistencias</h1>
        <table>
           <thead>
            <tr>
              <th>Nombre_evento</th>
              <th>Fecha_evento<o</th>
              <th>Aforo</th>
              <th>Total_eventos</th>

            </tr>
           </thead>
    <tbody>
    @forelse ($eventos as $evento )
        <tr>
           <th>{{$evento->nombre}}</th>
           <th>{{$evento->fecha}}</th>
           <th>{{$evento->aforo}}</th>
           <th>{{$totaleventos}}</th>

        </tr>
     @empty
         <p>no hay datos</p>
    @endforelse


    </tbody>

        </table>
</body>
</html>
