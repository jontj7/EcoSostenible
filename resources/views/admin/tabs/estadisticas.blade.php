@extends('layouts.admin')

@section('title', 'Estadísticas del Panel | EcoSostenible')

@section('content')
<div class="max-w-5xl mx-auto mt-10 bg-gray-900 text-white p-6 rounded shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-green-400">📊 Estadísticas</h2>
        @php
            $ultimaFecha = end($estadisticas['fechas']);
        @endphp

        <p class="text-sm text-gray-300 mb-4">
            Último punto del gráfico: <span class="font-semibold">{{ $ultimaFecha }}</span>
        </p>


        <div class="flex items-center gap-2">
            {{-- Selector de rango --}}
            <form method="GET" action="{{ route('admin.estadisticas') }}" class="flex items-center space-x-2">
                <select name="rango" onchange="this.form.submit()" class="bg-gray-800 border border-green-400 text-white rounded px-3 py-1 focus:outline-none">
                    <option value="diario" {{ request('rango') == 'diario' ? 'selected' : '' }}>Diario</option>
                    <option value="semanal" {{ request('rango') == 'semanal' ? 'selected' : '' }}>Semanal</option>
                    <option value="mensual" {{ request('rango') == 'mensual' ? 'selected' : '' }}>Mensual</option>
                    <option value="anual" {{ request('rango') == 'anual' ? 'selected' : '' }}>Anual</option>
                </select>
            </form>

            {{-- Botón para regresar al dashboard --}}
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-600 hover:bg-blue-700 px-3 py-1.5 rounded shadow transition">
                ⬅️ Volver al Panel
            </a>
        </div>
    </div>

    @if (!empty($estadisticas))
        <div class="bg-gray-800 p-4 rounded shadow">
            <canvas id="graficoEstadisticas" height="150"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('graficoEstadisticas').getContext('2d');

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($estadisticas['fechas']),
                    datasets: [
                        {
                            label: 'Usuarios Registrados',
                            data: @json($estadisticas['usuarios']),
                            borderColor: '#10B981',
                            backgroundColor: 'rgba(16, 185, 129, 0.2)',
                            borderWidth: 2,
                            tension: 0.4
                        },
                        {
                            label: 'Comentarios Publicados',
                            data: @json($estadisticas['comentarios']),
                            borderColor: '#3B82F6',
                            backgroundColor: 'rgba(59, 130, 246, 0.2)',
                            borderWidth: 2,
                            tension: 0.4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            labels: {
                                color: 'white',
                                font: { size: 14 }
                            }
                        }
                    },
                    scales: {
                        x: {
                            ticks: { color: 'white' },
                            title: {
                                display: true,
                                text: '{{ ucfirst(request("rango", "semanal")) }}',
                                color: 'white',
                                font: { size: 16 }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: { color: 'white' },
                            title: {
                                display: true,
                                text: 'Cantidad',
                                color: 'white',
                                font: { size: 16 }
                            }
                        }
                    }
                }
            });
        </script>
    @else
        <div class="text-center text-red-400 mt-10 text-lg">No hay datos suficientes para mostrar estadísticas.</div>
    @endif
</div>
@endsection
