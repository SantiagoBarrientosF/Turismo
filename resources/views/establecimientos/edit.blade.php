<h2>Editar Establecimiento</h2>

<form action="{{ route('establecimientos.update', $id) }}" method="POST">
    @csrf @method('PUT') <input type="hidden" name="id" value="{{ $establecimiento->id }}">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="{{ $establecimiento->nombre }}">
    <br>
    <button type="submit">Actualizar</button>
</form>
