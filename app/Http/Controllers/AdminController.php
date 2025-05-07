<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $usuarioAEditar = null;
        $comentarioAEditar = null;

        if ($request->has('editar_usuario')) {
            $usuarioAEditar = User::find($request->editar_usuario);
        }

        if ($request->has('editar_comentario')) {
            $comentarioAEditar = Comment::find($request->editar_comentario);
        }

        $usuarios = User::all();
        $comentarios = Comment::with('user')->latest()->get();

        $estadisticas = $this->generarEstadisticas();

        return view('admin.dashboard', compact(
            'usuarios',
            'comentarios',
            'usuarioAEditar',
            'comentarioAEditar',
            'estadisticas'
        ));
    }

    // 🧑‍💻 Eliminar Usuario
    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);
        if ($usuario->email === auth()->user()->email) {
            return back()->with('error', 'No puedes eliminar tu propia cuenta.');
        }

        $usuario->delete();
        return back()->with('success', 'Usuario eliminado correctamente.');
    }

    // 💬 Eliminar Comentario
    public function eliminarComentario($id)
    {
        $comentario = Comment::findOrFail($id);
        $comentario->delete();
        return back()->with('success', 'Comentario eliminado correctamente.');
    }

    // ✏️ Editar Usuario
    public function editarUsuario($id)
    {
        $usuarios = User::all();
        $comentarios = Comment::with('user')->latest()->get();
        $usuarioAEditar = User::findOrFail($id);
        $estadisticas = $this->generarEstadisticas();

        return view('admin.dashboard', compact(
            'usuarios',
            'comentarios',
            'usuarioAEditar',
            'estadisticas'
        ));
    }

    // 🔄 Actualizar Usuario
    public function actualizarUsuario(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,$id",
            'password' => 'nullable|string|min:6|confirmed'
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();
        return redirect()->route('admin.dashboard')->with('success', 'Usuario actualizado correctamente.');
    }

    // ✏️ Editar Comentario
    public function editarComentario($id)
    {
        $usuarios = User::all();
        $comentarios = Comment::with('user')->latest()->get();
        $comentarioAEditar = Comment::findOrFail($id);
        $estadisticas = $this->generarEstadisticas();

        return view('admin.dashboard', compact(
            'usuarios',
            'comentarios',
            'comentarioAEditar',
            'estadisticas'
        ));
    }

    // 🔄 Actualizar Comentario
    public function actualizarComentario(Request $request, $id)
    {
        $comentario = Comment::findOrFail($id);

        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $comentario->content = $request->content;
        $comentario->save();

        return redirect()->route('admin.dashboard')->with('success', 'Comentario actualizado correctamente.');
    }

    // 📊 Generar estadísticas reales
    private function generarEstadisticas()
    {
        $usuarios = [];
        $comentarios = [];
        $fechas = [];

        for ($i = 6; $i >= 0; $i--) {
            $fecha = now()->subDays($i)->format('Y-m-d');
            $fechas[] = $fecha;

            $usuarios[] = User::whereDate('created_at', $fecha)->count();
            $comentarios[] = Comment::whereDate('created_at', $fecha)->count();
        }

        return [
            'fechas' => $fechas,
            'usuarios' => $usuarios,
            'comentarios' => $comentarios,
        ];
    }

    public function crearUsuario(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'provider' => 'manual',
            'avatar' => 'images/ecoUser.png',
        ]);

        return redirect()->route('admin.dashboard', ['tab' => 'usuarios'])->with('success', 'Usuario creado exitosamente.');
    }

}
