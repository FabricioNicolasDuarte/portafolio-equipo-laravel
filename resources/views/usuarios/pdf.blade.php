<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <style>
        @page {
            margin: 0; /* Elimina los márgenes de impresión por defecto */
        }
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Helvetica', sans-serif; 
            font-size: 12px;
        }
        body { 
            /* Añadimos la imagen de fondo */
            background-image: url('{{ public_path('images/fondo-pdf.png') }}');
            background-size: cover; /* Para que la imagen cubra toda la página */
            background-repeat: no-repeat;
            background-position: center;
        }
        .content {
            /* Añadimos un padding para que el contenido no toque los bordes */
            padding: 40px;
        }
        h1 { 
            text-align: center; 
            color: #333; 
            border-bottom: 2px solid #333; 
            padding-bottom: 10px; 
            margin-bottom: 25px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 20px; 
        }
        th, td { 
            border: 1px solid #ccc; 
            padding: 8px; 
            text-align: left; 
        }
        th { 
            background-color: #e9e9e9; 
        }
        /* Se quita el fondo del div y se aplica directamente a las filas de la tabla si se desea */
        tr {
            background-color: rgba(255, 255, 255, 0.8); /* Fondo de fila ligeramente transparente */
        }
        tr:nth-child(even) { 
             background-color: rgba(240, 240, 240, 0.8); /* Alternar color con transparencia */
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Portfolio Alumnos - Listado de Usuarios Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Carrera</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->last_name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->career ?? 'No especificada' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">No hay alumnos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
