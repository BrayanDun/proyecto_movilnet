<?php

// Conectar a la base de datos
$db = new PDO("pgsql:host=localhost;dbname=Movilnet", "postgres", "postgres");

// Obtener los datos del formulario
$id = $_POST["id"];
$nombre = $_POST["nombre"];
$ip = $_POST["ip"];
$tipos = $_POST["tipos"];
$ubicacion = $_POST["ubicacion"];
$so = $_POST["so"];
$servicios = $_POST["servicios"];
$caracteristicas = $_POST["caracteristicas"];
$tipo_plataforma = $_POST["tipo_plataforma"];
$observaciones = $_POST["observaciones"];
$dependencias = $_POST["dependencias"];
$conexiones = $_POST["conexiones"];
$tipo_red = $_POST["tipo_red"];
$estatus = $_POST["estatus"];

// Actualizar el registro en la base de datos
$sql = "UPDATE servidores SET
  nombre = '$nombre',
  ip = '$ip',
  tipos = '$tipos',
  ubicacion = '$ubicacion',
  so = '$so',
  servicios = '$servicios',
  caracteristicas = '$caracteristicas',
  tipo_plataforma = '$tipo_plataforma',
  observaciones = '$observaciones',
  dependencias = '$dependencias',
  conexiones = '$conexiones',
  tipo_red = '$tipo_red',
  estatus = '$estatus'
WHERE id = $id";

$stmt = $db->prepare($sql);
$stmt->execute();

// Redireccionar a la página principal
header("Location: consulta_servidores.php");

?>
