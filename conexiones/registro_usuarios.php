<?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Recibir los datos del formulario
$p00 = $_POST['P00'];
$cedula = $_POST['Cedula'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$cargo = $_POST['Cargo'];
$coordinacion = $_POST['Coordinacion'];
$contrasena = $_POST['Contraseña']; // Cambié a "contrasena"

// Crea una consulta SQL
$sql = "INSERT INTO usuarios (p00, cedula, nombre, apellido, cargo, coordinacion, contraseña) VALUES (:p00, :cedula, :nombre, :apellido, :cargo, :coordinacion, :contrasena)";

// Prepara la consulta SQL
$stmt = $conn->prepare($sql);

// Vincular los parámetros de la consulta SQL usando bindValue
$stmt->bindValue(':p00', $p00);
$stmt->bindValue(':cedula', $cedula);
$stmt->bindValue(':nombre', $nombre);
$stmt->bindValue(':apellido', $apellido);
$stmt->bindValue(':cargo', $cargo);
$stmt->bindValue(':coordinacion', $coordinacion);
$stmt->bindValue(':contrasena', $contrasena); // Cambiado a "contrasena"

// Ejecutar la consulta SQL
$stmt->execute();

// Comprobar el resultado de la ejecución de la consulta SQL
if ($stmt->rowCount() == 0) {
    die('Error al registrar el usuario');
}

// Cerrar la conexión a PostgreSQL
$conn = null;

header("location: ../iniciar_sesion.html");

?>
