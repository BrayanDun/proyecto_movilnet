<?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "123456";

// Conectarse a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Obtener los datos del formulario
$id_aplicativo = $_POST["id_aplicativo"];
$nombre_aplicativo = $_POST["nombre_aplicativo"];
$tipo_aplicativo = $_POST["tipo_aplicativo"];

// Validar que el ID del aplicativo exista en la base de datos
$sql = "SELECT id_aplicativo FROM aplicativo WHERE id_aplicativo = '$id_aplicativo'";
$result = $conn->query($sql);
if ($result->rowCount() == 0) {
    die("El ID del aplicativo no existe.");
}

// Modificar los datos en la base de datos
$sql = "UPDATE aplicativo
SET nombre_aplicativo = '$nombre_aplicativo',
tipo_aplicativo = '$tipo_aplicativo'
WHERE id_aplicativo = '$id_aplicativo'";


// Ejecutar la sentencia SQL
$conn->query($sql);

// Agregar un mensaje de confirmación
echo "<h1>Aplicación actualizada correctamente</h1>";

// Redireccionar a la página principal
header("Location: index.php");


?>