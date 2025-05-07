@if(isset($usuario))
    @include('admin.tabs.editar_usuario')
@else
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-green-400 mb-4">Usuarios Registrados</h2>
        <div class="overflow-x-auto bg-gray-900 rounded shadow">
            <table class="w-full text-sm text-white">
                <thead class="bg-green-800">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Correo</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $user)
                        <tr class="border-b border-green-800">
                            <td class="px-4 py-2">{{ $user->id }}</td>
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2 flex gap-2">
                                <a href="{{ route('admin.usuario.editar', $user->id) }}" class="text-blue-400 hover:text-blue-600">Editar</a>
                                @if($user->email !== auth()->user()->email)
                                <form method="POST" action="{{ route('admin.usuario.eliminar', $user->id) }}">
                                    @csrf @method('DELETE')
                                    <button class="text-red-400 hover:text-red-600">Eliminar</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
