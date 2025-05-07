@if (isset($usuario))
<div class="max-w-lg mx-auto mt-10 bg-gray-900 text-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-green-400 mb-6">Editar Usuario</h2>
    <form method="POST" action="{{ route('admin.usuario.actualizar', $usuario->id) }}">
        @csrf @method('PUT')
        <label>Nombre</label>
        <input type="text" name="name" value="{{ old('name', $usuario->name) }}" class="w-full mb-4 px-4 py-2 rounded bg-gray-800 border border-green-500 text-white">
        <label>Correo</label>
        <input type="email" name="email" value="{{ old('email', $usuario->email) }}" class="w-full mb-4 px-4 py-2 rounded bg-gray-800 border border-green-500 text-white">
        <label>Nueva Contraseña</label>
        <input type="password" name="password" class="w-full mb-2 px-4 py-2 rounded bg-gray-800 border border-green-500 text-white">
        <input type="password" name="password_confirmation" class="w-full mb-4 px-4 py-2 rounded bg-gray-800 border border-green-500 text-white">
        <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-white">Actualizar</button>
    </form>
</div>
@else
<div class="text-center text-red-400 mt-10">No se ha seleccionado ningún usuario para editar.</div>
@endif
