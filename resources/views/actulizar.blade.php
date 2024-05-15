<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{'route(establecimiento,$id_establecimiento)'}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">localidad</label>
            <input type="text" class="form-control" id="email" name="localidad">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">direccion</label>
            <input type="text" class="form-control" id="password" name="direccion">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">contacto</label>
            <input type="text" class="form-control" id="password" name="contacto">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">descripcion</label>
            <input type="text" class="form-control" id="password" name="descripcion">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">tipo_negocio</label>
            <input type="text" class="form-control" id="password" name="tipo_negocio">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">propietario</label>
            <input type="text" class="form-control" id="password" name="propietario">
        </div>


        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>


    </form>
</body>
</html>
