<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Carbon\Carbon;

class EstadisticasController extends Controller
{
    public function index(Request $request)
    {
        $rango = $request->get('rango', 'semanal');
        $estadisticas = $this->calcularEstadisticas($rango);

        return view('admin.dashboard', [
            'tab' => 'estadisticas',
            'estadisticas' => $estadisticas,
            'rango' => $rango,
            'usuarios' => User::all(),
            'comentarios' => Comment::all()
        ]);
    }

    private function calcularEstadisticas($rango)
    {
        $fechas = [];
        $usuarios = [];
        $comentarios = [];

        switch ($rango) {
            case 'diario':
                for ($i = 6; $i >= 0; $i--) {
                    $fecha = Carbon::now()->subDays($i)->format('Y-m-d');
                    $fechas[] = Carbon::now()->subDays($i)->format('d/m');
                    $usuarios[] = User::whereDate('created_at', $fecha)->count();
                    $comentarios[] = Comment::whereDate('created_at', $fecha)->count();
                }
                break;

            case 'mensual':
                for ($i = 1; $i <= 12; $i++) {
                    $mes = Carbon::create()->month($i)->startOfMonth();
                    $fechas[] = $mes->format('M');
                    $usuarios[] = User::whereMonth('created_at', $i)->count();
                    $comentarios[] = Comment::whereMonth('created_at', $i)->count();
                }
                break;

            case 'anual':
                for ($i = 2020; $i <= now()->year; $i++) {
                    $fechas[] = $i;
                    $usuarios[] = User::whereYear('created_at', $i)->count();
                    $comentarios[] = Comment::whereYear('created_at', $i)->count();
                }
                break;

            default: // semanal
                for ($i = 3; $i >= 0; $i--) {
                    $inicio = Carbon::now()->subWeeks($i)->startOfWeek();
                    $fin = Carbon::now()->subWeeks($i)->endOfWeek();
                    $fechas[] = 'Semana ' . ($i + 1);
                    $usuarios[] = User::whereBetween('created_at', [$inicio, $fin])->count();
                    $comentarios[] = Comment::whereBetween('created_at', [$inicio, $fin])->count();
                }
        }

        return [
            'fechas' => $fechas,
            'usuarios' => $usuarios,
            'comentarios' => $comentarios,
        ];
    }
}
