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
    <title>Historial</title>
    <style>
     /* Estilos de la tabla con DataTables */

        .display th {
            background-color: #FF585F;
        }

     table {
        position: relative;
        left: 10%;
        top: 30%;
        transform: translate(-11.5%, -18%);
        background-color: rgb(255 255 255);
        margin-top: 85px;
        width: 80%; /* Ajusta el ancho de la tabla según tu preferencia */
        border-collapse: 35px;
        border-radius: 12px; /* Agrega bordes redondeados */
    }

    th, td {
        border: 1px solid #FF585F;
        border-radius: 8px; /* Agrega bordes redondeados */
        padding: 16px;
        text-align: center;
        font-size: 0.9rem;
        color: #333; /* Color del texto */
        font-family: Arial, sans-serif; /* Tipo de fuente */
    }

    th {
        background-color: #FF585F;
        color: white;
        font-weight: bold; /* Texto en negrita para encabezados */
    }

    /* Estilo para el texto en negrita */
    strong {
        color: #FF585F;
        font-size: larger;
        font-family: Arial, sans-serif;
    }
    H1{
        display: flex;
        justify-content: center;
        color: #FF585F;
        font-size: larger;
        font-family: Arial, sans-serif;
    }
    </style>
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
            ">
                <i class="fas fa-arrow-left"></i> Atrás
            </button>
        </a>
    </div>

    <h1>Historial de Actividades</h1>

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
