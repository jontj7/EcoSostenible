<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstadisticasController;

/*
|--------------------------------------------------------------------------
| 🌱 RUTAS PÚBLICAS
|--------------------------------------------------------------------------
*/
Route::view('/', 'welcome')->name('inicio');
Route::view('/reciclaje', 'reciclaje.index')->name('reciclaje');
Route::view('/reduccion', 'reduccion.index')->name('reduccion');
Route::view('/consumo', 'consumo.index')->name('consumo');
Route::view('/desafio', 'desafio.index')->name('desafio');
Route::view('/foro', 'foro.index')->name('foro');
Route::view('/consejo', 'consejo.index')->name('consejo');

/*
|--------------------------------------------------------------------------
| 🧾 AUTENTICACIÓN
|--------------------------------------------------------------------------
*/
Route::view('/auth', 'auth.log')->name('auth');
Route::view('/login', 'auth.log')->name('login');
Route::view('/auth/register', 'auth.register')->name('register');

Route::post('/auth', [UserController::class, 'login'])->name('auth.login');
Route::post('/auth/register', [UserController::class, 'register'])->name('register.store');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| 🌐 AUTENTICACIÓN SOCIAL
|--------------------------------------------------------------------------
*/
Route::get('/log/{provider}', [SocialiteController::class, 'redirect'])->name('social.redirect');
Route::get('/log/{provider}/callback', [SocialiteController::class, 'callback'])->name('social.callback');

/*
|--------------------------------------------------------------------------
| 🔐 RUTAS PRIVADAS AUTENTICADAS
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::view('/perfil', 'user.perfil')->name('perfil');
    Route::post('/perfil/update', [UserController::class, 'update'])->name('perfil.update');
    Route::post('/comentario', [ComentarioController::class, 'store'])->name('foro.comentario');
});

/*
|--------------------------------------------------------------------------
| 🛡️ RUTAS DEL DASHBOARD SOLO PARA ADMIN
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function (Request $request) {
        if (Auth::user()->email !== 'bm61883@gmail.com') {
            abort(403, 'Acceso no autorizado.');
        }
        return app(AdminController::class)->index($request);
    })->name('admin.dashboard');

    Route::get('/usuario/{id}/editar', function ($id) {
        if (Auth::user()->email !== 'bm61883@gmail.com') {
            abort(403);
        }
        return redirect()->route('admin.dashboard', ['tab' => 'usuarios', 'editar_usuario' => $id]);
    })->name('admin.usuario.editar');

    Route::put('/usuario/{id}', [AdminController::class, 'actualizarUsuario'])->name('admin.usuario.actualizar');
    Route::delete('/usuario/{id}', [AdminController::class, 'eliminarUsuario'])->name('admin.usuario.eliminar');

    Route::get('/comentario/{id}/editar', function ($id) {
        if (Auth::user()->email !== 'bm61883@gmail.com') {
            abort(403);
        }
        return redirect()->route('admin.dashboard', ['tab' => 'comentarios', 'editar_comentario' => $id]);
    })->name('admin.comentario.editar');

    Route::put('/comentario/{id}', [AdminController::class, 'actualizarComentario'])->name('admin.comentario.actualizar');
    Route::delete('/comentario/{id}', [AdminController::class, 'eliminarComentario'])->name('admin.comentario.eliminar');

    Route::get('/usuario/crear', function () {
        if (Auth::user()->email !== 'bm61883@gmail.com') {
            abort(403);
        }
        return view('admin.tabs.crear_usuario');
    })->name('admin.usuario.form');

    Route::post('/usuario/crear', [AdminController::class, 'crearUsuario'])->name('admin.usuario.crear');
});

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/estadisticas', [EstadisticasController::class, 'index'])->name('admin.estadisticas');
