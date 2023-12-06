<?php
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "123456";
// Conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Obtiene los datos del formulario
$p00 = $_POST["p00"];
$contraseña = $_POST["contraseña"];

// Consulta SQL para buscar el usuario
$sql = "SELECT * FROM usuario WHERE p00 = '$p00' AND contraseña = '$contraseña'";

// Ejecuta la consulta
$resultados = $conn->query($sql);

// Verifica si el usuario existe
// Verifica si el usuario existe
if ($resultados->rowCount() > 0) {
  // El usuario existe
  // Inicia sesión
  session_start();
  $_SESSION["p00"] = $p00;
  header("Location:index.php");
} else {
  // El usuario no existe
  // Muestra un mensaje de error
  echo "El usuario o la contraseña no son válidos.";
}
// Cierra la conexión
$conn = null;
?>