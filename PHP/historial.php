<?php ob_start();?>
<?php
// Incluye la conexión a la base de datos y funciones necesarias
require_once "../conexiones/conexion.php";

// Obtiene el historial
$historial = obtenerHistorial($db);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/style_historial.css">
    <title>Historial</title>
</head>
<body>

    <div>
        <a href="javascript:history.back()" style="text-decoration: none; position: absolute; top: 10px; left: 10px;">
            <button style="
                padding: 10px;
                background-color: #FF585F;
                color: white;
                border: none;
                border-radius: 12px;
                cursor: pointer;
                margin-left: 100px;
            ">
                <i class="fas fa-arrow-left"></i> Atrás
            </button>
        </a>
    </div>

    <h2>Historial de Actividades</h2>

    <table id="historialTable" class="display" style="width:100%">
  
        <thead>
            <tr>
                <th>ID Administrador</th>
                <th>Módulo</th>
                <th>Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historial as $actividad): ?>
                <tr>
                    <td><?= htmlspecialchars($actividad['id_administrador']); ?></td>
                    <td><?= htmlspecialchars($actividad['modulo']); ?></td>
                    <td><?= isset($actividad['fecha_hora']) ? $actividad['fecha_hora'] : 'No disponible'; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </table>

    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#historialTable').DataTable();
    });
</script>

</body>
</html>
<?php $contents = ob_get_clean(); ?>

<?php require("./index_administrador.php"); ?>
