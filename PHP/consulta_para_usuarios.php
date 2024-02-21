<?php ob_start();?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Consulta de servidores</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://kit.fontawesome.com/b408879b64.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/style_consulta.css">
</head>
<div class="container">
    <form  action="consulta_funcion.php" method="POST">
        <input class="busq" type="text" placeholder="Buscar..." name="buscar">
        <input type="submit" value="" class="boton_busq">
    </form>
    </div>
    <!-- Botón de exportación -->
        <form action="../conexiones/exportar.php" method="POST" target="_blank">
            <input class="export" type="hidden" name="exportar" value="1">
            <input class="export" type="submit" value="Exportar a PDF">
        </form>
    
    <a href="javascript:history.back()" style="text-decoration: none;">
        <button style="
            margin: 0px;
            margin-bottom: -176px;
            padding: 10px;
            background-color: #FF585F;
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            position: absolute;
            border-color: white;">
            <i class="fas fa-arrow-left"></i> Atrás
        </button>
    </a>
    
    <a href="graficas_tipos_usuarios.php" style="text-decoration: none;">
        <button style="
           position: relative;
            left: 76%;
            top: 8px;
            transform: translate(-48%, -45%);
            margin: 10px;
            padding: 10px;
            background-color: #0072ff;
            color: white;
            border: none;
            border-radius: 12px;
            border-color: white;
            cursor: pointer;
           ">
            <i class="#"></i> Graficas Tipos
        </button>
    </a>
    
    <a href="graficas_estatus_usuarios.php" style="text-decoration: none;">
        <button style="
           position: relative;
            left: 52%;
            top: 8px;
            transform: translate(-65%, -45%);
            margin: 10px;
            padding: 10px;
            background-color: #0072ff;
            color: white;
            border: none;
            border-radius: 12px;
            border-color: white;
            cursor: pointer;
           ">
            <i class="#"></i> Graficas Estatus
        </button>
    </a>


    <?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error handling

$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";

// $SQL_READ = "SELECT * FROM servidores WHERE id LIKE $buscar OR nombre LIKE $buscar OR ip LIKE $buscar";
$SQL_READ = "SELECT * FROM servidores WHERE  text(id) LIKE :buscar OR nombre LIKE :buscar OR ip LIKE :buscar OR tipos LIKE :buscar OR ubicacion LIKE :buscar OR estatus LIKE :buscar";
$stmt = $conn->prepare($SQL_READ);
$buscar = "%" . $buscar . "%";
$stmt->bindParam(":buscar", $buscar); // Use prepared statements for security
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>IP</th>";
    echo "<th>Tipos</th>";
    echo "<th>Servicios</th>";
    echo "<th>Ubicación</th>";
    echo "<th>Tipo de plataforma</th>";
    echo "<th>Tipo de Red</th>";
    echo "<th>Estatus</th>";
    echo "<th>detalles</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['ip'] . "</td>";
        echo "<td>" . $row['tipos'] . "</td>";
        echo "<td>" . $row['ubicacion'] . "</td>";
        echo "<td>" . $row['tipo_plataforma'] . "</td>";
        echo "<td>" . $row['tipo_red'] . "</td>";
        echo "<td>" . $row['servicios'] . "</td>";
        echo "<td>" . $row['estatus'] . "</td>";
        echo "<td><button class='ver-mas' data-id='" . $row['id'] . "'>Ver mas..</button></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<h1>No se encontraron resultados</h1>";
}
?>
<section class="modal" id="modal">
    <div class="modal__container">
        <h2 class="modal__title">Detalles del servidor</h2>
        <p id="detalleDatos"></p>
        <a href="javascript:void(0)" class="modal__close" onclick="cerrarModal()">CERRAR</a>
    </div>
</section>
<script src="../js/detalles.js"></script>
</body>
</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_usuario.php");

?>