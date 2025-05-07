<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        if (App::environment('local')) {
            // En desarrollo local: usar stateless para evitar errores con CSRF/state
            return Socialite::driver($provider)->stateless()->redirect();
        } else {
            // En producción: usar sesiones para mayor seguridad
            return Socialite::driver($provider)->redirect();
        }
    }

    public function callback($provider)
    {
        if (App::environment('local')) {
            $userSocial = Socialite::driver($provider)->stateless()->user();
        } else {
            $userSocial = Socialite::driver($provider)->user();
        }

        $user = User::updateOrCreate(
            ['email' => $userSocial->getEmail()],
            [
              'name'     => $userSocial->getName(),
                'avatar'   => $userSocial->getAvatar(),  // ✅ Guarda imagen de perfil de Google o Facebook
                'provider' => $provider,
                'password' => bcrypt(uniqid()), // solo para que no quede vacío
            ]
        );

        Auth::login($user);

        return redirect('/');
    }
}
