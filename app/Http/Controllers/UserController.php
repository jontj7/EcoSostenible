<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.unique' => 'Este correo ya está registrado. Por favor inicia sesión o usa otro.',
        ]);

        // Avatar por defecto al registrarse
        $avatarUrl = 'images/ecoUser.png';

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'provider' => 'manual',
            'avatar'   => $avatarUrl,
        ]);

        return redirect()->route('auth')->with('success', '¡Registro exitoso! Ahora puedes iniciar sesión.');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Bienvenido de nuevo');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name'               => 'required|string|max:255',
            'email'              => 'required|email|unique:users,email,' . $user->id,
            'password'           => 'nullable|string|min:6|confirmed',
            'predefined_avatar'  => 'nullable|string',
        ]);

        $user->name  = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->filled('predefined_avatar')) {
            $user->avatar = 'images/avatars/' . $request->predefined_avatar;
        }

        $user->save();

        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}
