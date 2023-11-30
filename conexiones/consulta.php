<?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Consultar los datos del servidor
$sql = "SELECT * FROM servidores WHERE id = 1";

// Ejecutar la consulta SQL
$stmt = $conn->query($sql);

// Obtener los resultados de la consulta SQL
$result = $stmt->fetchAll();

// Cerrar la conexión a PostgreSQL
$conn = null;

// Imprimir los resultados de la consulta SQL
foreach ($result as $row) {
  echo "ID: " . $row['id'] . "<br>";
  echo "Nombre: " . $row['nombre'] . "<br>";
  echo "IP: " . $row['ip'] . "<br>";
  echo "Tipos: " . $row['tipos'] . "<br>";
  echo "Ubicación: " . $row['ubicacion'] . "<br>";
  echo "SO: " . $row['so'] . "<br>";
  echo "Servicios: " . $row['servicios'] . "<br>";
  echo "Características: " . $row['caracteristicas'] . "<br>";
  echo "Tipo de plataforma: " . $row['tipo_plataforma'] . "<br>";
  echo "Observaciones: " . $row['observaciones'] . "<br>";
  echo "Dependencias: " . $row['dependencias'] . "<br>";
  echo "Conexiones: " . $row['conexiones'] . "<br>";
  echo "Tipo de red: " . $row['tipo_red'] . "<br>";
  echo "Estatus: " . $row['estatus'] . "<br>";
}
