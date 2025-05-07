    @if(isset($comentario))
        @include('admin.tabs.editar_comentario')
    @else
        <div class="mb-8">
            <h2 class="text-2xl font-semibold text-green-400 mb-4">Comentarios Recientes</h2>
            <div class="overflow-x-auto bg-gray-900 rounded shadow">
                <table class="w-full text-sm text-white">
                    <thead class="bg-green-800">
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Usuario</th>
                            <th class="px-4 py-2">Contenido</th>
                            <th class="px-4 py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($comentarios as $comentario)
                            <tr class="border-b border-green-800">
                                <td class="px-4 py-2">{{ $comentario->id }}</td>
                                <td class="px-4 py-2">{{ $comentario->user->name ?? 'Desconocido' }}</td>
                                <td class="px-4 py-2">{{ $comentario->content }}</td>
                                <td class="px-4 py-2 flex gap-2">
                                    <a href="{{ route('admin.comentario.editar', $comentario->id) }}" class="text-blue-400 hover:text-blue-600">Editar</a>
                                    <form method="POST" action="{{ route('admin.comentario.eliminar', $comentario->id) }}">
                                        @csrf @method('DELETE')
                                        <button class="text-red-400 hover:text-red-600">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
