<?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Verificar campos incompletos
if (empty($_POST['P00']) || empty($_POST['Cedula']) || empty($_POST['Nombre']) || empty($_POST['Apellido']) || empty($_POST['Correo']) || empty($_POST['Cargo']) || empty($_POST['Coordinacion']) || empty($_POST['Contraseña'])) {
    header("Location: error.php?message=Por favor, completa todos los campos.");
    exit;
}

// Obtener la ID del formulario
$p00 = $_POST['P00'];

// Consultar si la ID ya existe en la base de datos
$sql_check_id = "SELECT p00 FROM usuarios WHERE p00 = :p00";
$stmt_check_id = $conn->prepare($sql_check_id);
$stmt_check_id->bindParam(':p00', $p00);
$stmt_check_id->execute();

// Si la ID ya está registrada, redirigir a una página de error
if ($stmt_check_id->rowCount() > 0) {
    header("Location: error.php?message=Ya existe el P00 registrado.");
    exit; // Detener la ejecución del script
}

// Recibir los datos del formulario
$cedula = $_POST['Cedula'];
$nombre = $_POST['Nombre'];
$apellido = $_POST['Apellido'];
$correo = $_POST['Correo'];
$cargo = $_POST['Cargo'];
$coordinacion = $_POST['Coordinacion'];
$contrasena = $_POST['Contraseña']; // Cambiado a "contrasena"

// Crea una consulta SQL
$sql = "INSERT INTO usuarios (p00, cedula, nombre, apellido, correo, cargo, coordinacion, contraseña) VALUES (:p00, :cedula, :nombre, :apellido, :correo, :cargo, :coordinacion, :contrasena)";

// Prepara la consulta SQL
$stmt = $conn->prepare($sql);

// Vincular los parámetros de la consulta SQL usando bindParam
$stmt->bindParam(':p00', $p00);
$stmt->bindParam(':cedula', $cedula);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellido', $apellido);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':cargo', $cargo);
$stmt->bindParam(':coordinacion', $coordinacion);
$stmt->bindParam(':contrasena', $contrasena); // Cambiado a "contrasena"

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