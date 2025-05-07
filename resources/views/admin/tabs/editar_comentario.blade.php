@if (isset($comentario))
<div class="max-w-lg mx-auto mt-10 bg-gray-900 text-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold text-green-400 mb-6">Editar Comentario</h2>
    <form method="POST" action="{{ route('admin.comentario.actualizar', $comentario->id) }}">
        @csrf @method('PUT')
        <label>Contenido</label>
        <textarea name="content" class="w-full mb-4 px-4 py-2 rounded bg-gray-800 border border-green-500 text-white" rows="4">{{ old('content', $comentario->content) }}</textarea>
        <button type="submit" class="bg-green-600 hover:bg-green-700 px-4 py-2 rounded text-white">Actualizar</button>
    </form>
</div>
@else
<div class="text-center text-red-400 mt-10">No se ha seleccionado ningún comentario para editar.</div>
@endif
