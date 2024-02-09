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
</head>
<style>
body {
    display: flex;
    background-color: rgba(180, 173, 168, 0.466);
    align-items: center;
    justify-content: center;
}

.container {
    position: absolute;
    margin-top: 29px;
    margin-left: 95px;
}
label {
    position: absolute;
    margin: -49px;
    margin-left: 10px;
    font-size: large;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #FF585F;
}

.busq {
    width: 170px;
    padding: 10px;
    padding-right: 38px;
    margin-top: 28px;
    font-size: 1rem;
    border-radius: 8px;
    border-color: #FF585F;
    outline: none;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.export {
    position: relative;
    left: 1175px;
    top: 51px;
    margin: 10px;
    padding: 10px;
    background-color: #0072ff;
    color: white;
    border: none;
    border-radius: 12px;
    border-color: white;
    cursor: pointer;
}

.boton_busq {
    background-color: #FF585F;
    width: 52px;
    padding: 10px;
    position: absolute;
    margin-top: 26px;
    color: white;
    cursor: pointer;
    border-radius: 5px;
    border-color: whitesmoke;
}

button:hover {
    background-color: darkred;
}




table {
    position: absolute;
    background-color: rgb(255 255 255);
    margin-top: 50px;
    width: 90%;
    border-collapse: 35px;
    border-radius: 8px;
}

th, td {
    border: 1px solid #FF585F;
    border-radius: 6px;
    padding: 10px;
    text-align: center;
    font-size: 0.9rem;
}
th {
    background-color: #FF585F;
    color: white;
}

.ver-mas {
    background-color: #FF585F;
    padding: 6px 6px;
    position: relative;
    margin-right: 10px;
    border-radius: 9px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

</style>
<div class="container">
    <form  action="consulta_funcion.php" method="POST">
        <input class="busq" type="text" placeholder="Buscar..." name="buscar">
        <input type="submit" value="" class="boton_busq">
    </form>
    </div>
    <!-- Botón de exportación -->
        <form action="exportar.php" method="POST" target="_blank">
            <input class="export" type="hidden" name="exportar" value="1">
            <input class="export" type="submit" value="Exportar a CSV">
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
    
    <table>
        <thead>
        <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> IP </th>
            <th> Tipos </th>
            <th> Ubicación </th>
            <th> Tipo de red </th>
            <th> Estatus </th>
            <th> Creado </th>
            <th> Modificado </th>
            <th> Acciones </th>
            <th>Detalles</th>

        </tr>
        </thead>
        <tbody>

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
$SQL_READ = "SELECT * FROM servidores WHERE  text(id) LIKE :buscar OR nombre LIKE :buscar OR ip LIKE :buscar OR ubicacion LIKE :buscar OR estatus LIKE :buscar";
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
    echo "<th>Ubicación</th>";
    echo "<th>Tipo de Red</th>";
    echo "<th>Estatus</th>";
    echo "<th>Creado</th>";
    echo "<th>Modificado</th>";
    echo "<th>detalles</th>";
    echo "</tr>";


    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['ip'] . "</td>";
        echo "<td>" . $row['tipos'] . "</td>";
        echo "<td>" . $row['ubicacion'] . "</td>";
        echo "<td>" . $row['tipo_red'] . "</td>";
        echo "<td>" . $row['estatus'] . "</td>";
        echo "<td>" . $row['creado_en'] . "</td>";
        echo "<td>" . $row['modificado_en'] . "</td>";
        echo "<td><button class='ver-mas' >Ver mas..</button></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}
?>
</body>

</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_administrador.php");

?>