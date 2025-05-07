<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        // Validación del formulario
        $request->validate([
            'content' => 'required|string|max:1000',
            'categoria' => 'nullable|string|max:255',
        ]);

        // Guardar comentario
        Comment::create([
            'user_id' => Auth::id(),
            'content' => $request->content,
            'categoria' => $request->categoria,
        ]);

        return back()->with('success', 'Comentario publicado correctamente.');
    }
}
