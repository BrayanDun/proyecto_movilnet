<?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
// Verifica la conexión
if (!$conn){
  die("Error al conectar a la base de datos: " . $conn->errorInfo()[2]);
}

// Cierra la conexión
$conn = null;
?>
