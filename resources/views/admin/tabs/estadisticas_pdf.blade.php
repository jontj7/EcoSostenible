<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estadísticas | EcoSostenible</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 13px;
            color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            color: #2f855a;
            margin-bottom: 5px;
        }
        .section {
            margin-bottom: 30px;
        }
        .section h2 {
            background-color: #2f855a;
            color: white;
            padding: 8px 12px;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 6px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 6px 10px;
            text-align: left;
        }
        th {
            background-color: #e6fffa;
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            font-style: italic;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Estadísticas Generales</h1>
        <p>Generado automáticamente por el sistema EcoSostenible</p>
    </div>

    <div class="section">
        <h2>Usuarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Fecha de Registro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="section">
        <h2>Comentarios Registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Contenido</th>
                    <th>Usuario ID</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comentarios as $comentario)
                    <tr>
                        <td>{{ $comentario->id }}</td>
                        <td>{{ $comentario->content }}</td>
                        <td>{{ $comentario->user_id }}</td>
                        <td>{{ $comentario->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} EcoSostenible. Todos los derechos reservados.
    </div>
</body>
</html>
