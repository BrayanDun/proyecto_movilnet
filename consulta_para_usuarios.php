<?php ob_start(); ?>
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
    position: relative;
    margin-top: 100px;
    margin-left: 250px;
}

label {
    position: absolute;
    margin: -49px;
    margin-left: 55px;
    font-size: large;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #FF585F;
}

h1 {
    position: absolute;
    margin: -70px;
    margin-LEFT: 830px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #FF585F;
}
input {
    width: 350px;
    padding: 15px;
    padding-right: 35px;
    font-size: 1rem;

    border: 0;
    outline: none;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.boton_busq {
    background-color: #FF585F;
    padding: 5px 4px;
    position: absolute;
    margin-top: 45px;
    margin-left: -350px;

    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

button:hover {
    background-color: darkred;
}

.grafic_estatus {
    background-color: #FF585F;
    padding: 6px 6px;
    position: absolute;
    margin-left: 900px;
    margin-top: -10PX;
    border-radius: 3px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

.grafic_tipo {
    background-color: #FF585F;
    padding: 6px 6px;
    position: absolute;
    margin-left: 740px;
    margin-top: -10PX;
    border-radius: 3px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

table {
    position: absolute;
    background-color: rgb(252, 248, 248);
    margin-top: 50px;
    width: 100%;  /* Ajuste el ancho de la tabla al 100% para que ocupe todo el contenedor */
    border-collapse: collapse;  /* Añadido para colapsar los bordes de las celdas */
}

th, td {
    border: 2px solid #FF585F;
    padding: 8px;
    text-align: left;
    font-size: 0.8rem;
}

th {
    background-color: #FF585F;
    color: white;
}
</style>
<div class="container">
    <form action="consulta_para_usuarios.php" method="POST">
        <label>CONSULTAR SERVIDORES</label>
        <input type="text" name="buscar">
        <input type="submit" value="BUSCAR" class="boton_busq">
    </form>
    </div>
    <h1>GRAFICAS</h1>
    <form action="grafica_estatus.php">
    <button class='grafic_estatus'>Estatus de servidores</button>
    </form>

    <form action="grafica_tipos.php">
    <button class='grafic_tipo'>Tipos de servidores</button>
    </form>
    
    <table>
        <thead>
        <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> IP </th>
            <th> Tipos </th>
            <th> Ubicación </th>
            <th> SO </th>
            <th> Servicios </th>
            <th> Características </th>
            <th> Tipo de plataforma </th>
            <th> Observaciones </th>
            <th> Dependencias </th>
            <th> Conexiones </th>
            <th> Tipo de red </th>
            <th> Estatus </th>
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

$SQL_READ = "SELECT * FROM servidores WHERE  text(id) LIKE :buscar OR nombre LIKE :buscar OR ip LIKE :buscar OR ubicacion LIKE :buscar OR estatus LIKE :buscar";
$stmt = $conn->prepare($SQL_READ);
$buscar = "%" . $buscar . "%";
$stmt->bindParam(":buscar", $buscar); // Use prepared statements for security
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>id</th>";
    echo "<th>nombre</th>";
    echo "<th>ip</th>";
    echo "<th>tipos</th>";
    echo "<th>ubicacion</th>";
    echo "<th>so</th>";
    echo "<th>servicios</th>";
    echo "<th>caracteristicas</th>";
    echo "<th>tipo_plataforma</th>";
    echo "<th>observaciones</th>";
    echo "<th>dependencias</th>";
    echo "<th>conexiones</th>";
    echo "<th>tipo_red</th>";
    echo "<th>estatus</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['ip'] . "</td>";
        echo "<td>" . $row['tipos'] . "</td>";
        echo "<td>" . $row['ubicacion'] . "</td>";
        echo "<td>" . $row['so'] . "</td>";
        echo "<td>" . $row['servicios'] . "</td>";
        echo "<td>" . $row['caracteristicas'] . "</td>";
        echo "<td>" . $row['tipo_plataforma'] . "</td>";
        echo "<td>" . $row['observaciones'] . "</td>";
        echo "<td>" . $row['dependencias'] . "</td>";
        echo "<td>" . $row['conexiones'] . "</td>";
        echo "<td>" . $row['tipo_red'] . "</td>";
        echo "<td>" . $row['estatus'] . "</td>";
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

require("./index_usuario.php");

?>