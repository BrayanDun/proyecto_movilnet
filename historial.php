<?php
// Incluye la conexión a la base de datos y funciones necesarias
require_once "conexiones/conexion.php";  // Asegúrate de cambiar esto según tu estructura de archivos

// Función para obtener el historial
function obtenerHistorial($db) {
    $stmt = $db->query("SELECT * FROM historial");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Obtiene el historial
$historial = obtenerHistorial($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        h1 {
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

    <h1>Historial de Actividades</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID Administrador</th>
                <th>Acción</th>
                <th>Módulo</th>
                <th>Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historial as $actividad): ?>
                <tr>
                    <td><?= htmlspecialchars($actividad['id_administrador']); ?></td>
                    <td><?= htmlspecialchars($actividad['accion']); ?></td>
                    <td><?= htmlspecialchars($actividad['modulo']); ?></td>
                    <td><?= isset($actividad['fecha_hora']) ? $actividad['fecha_hora'] : 'No disponible'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#historialTable').DataTable();
        });
    </script>


</body>
</html>
