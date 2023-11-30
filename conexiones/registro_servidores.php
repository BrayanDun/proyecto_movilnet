<?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Recibir los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$ip = $_POST['ip'];
$tipos = $_POST['tipos'];
$ubicacion = $_POST['ubicacion'];
$so = $_POST['so'];
$servicios = $_POST['servicios'];
$caracteristicas = $_POST['caracteristicas'];
$tipo_plataforma = $_POST['tipo_plataforma'];
$observaciones = $_POST['observaciones'];
$dependencias = $_POST['dependencias'];
$conexiones = $_POST['conexiones'];
$tipo_red = $_POST['tipo_red'];
$estatus = $_POST['estatus'];


// Crea una consulta SQL
$sql = "INSERT INTO servidores (id, nombre, ip, tipos, ubicacion, so, servicios, caracteristicas, tipo_plataforma, observaciones, dependencias, conexiones, tipo_red, estatus) VALUES (:id, :nombre, :ip, :tipos, :ubicacion, :so, :servicios, :caracteristicas, :tipo_plataforma, :observaciones, :dependencias, :conexiones, :tipo_red, :estatus)";

// Prepara la consulta SQL
$stmt = $conn->prepare($sql);

// Vincular los parámetros de la consulta SQL
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':ip', $ip);
$stmt->bindParam(':tipos', $tipos);
$stmt->bindParam(':ubicacion', $ubicacion);
$stmt->bindParam(':so', $so);
$stmt->bindParam(':servicios', $servicios);
$stmt->bindParam(':caracteristicas', $caracteristicas);
$stmt->bindParam(':tipo_plataforma', $tipo_plataforma);
$stmt->bindParam(':observaciones', $observaciones);
$stmt->bindParam(':dependencias', $dependencias);
$stmt->bindParam(':conexiones', $conexiones);
$stmt->bindParam(':tipo_red', $tipo_red);
$stmt->bindParam(':estatus', $estatus);

// Ejecutar la consulta SQL
$stmt->execute();

// Comprobar el resultado de la ejecución de la consulta SQL

if ($stmt->rowCount() == 0) {
  die('Error al registrar el servidor');
}

// Cerrar la conexión a PostgreSQL
$conn = null;


?>
