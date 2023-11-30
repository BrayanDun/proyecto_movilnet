<?php
require_once("database.php");
// Define las variables
$id = 1;
$nombre = "Juan Pérez";
$ip = "192.168.1.100";
$tipos = ["servidor", "cliente"];
$ubicacion = "Caracas, Venezuela";
$so = "Linux";
$servicios = ["http", "ftp"];
$caracteristicas = ["disco duro de 1TB", "memoria RAM de 8GB"];
$tipoplataforma = "física";
$observaciones = "Este servidor se utiliza para alojar el sitio web de la empresa.";
$dependencias = [];
$conexiones = [];
$tipored = "LAN";
$estatus = "Activo";

// Conéctate a la base de datos
$db = new PDO("mysql:host=localhost;dbname=my_database", "root", "");

// Prepara la consulta SQL
$sql = "INSERT INTO dispositivos (id, nombre, ip, tipos, ubicacion, so, servicios, caracteristicas, tipoplataforma, observaciones, dependencias, conexiones, tipored, estatus) VALUES (:id, :nombre, :ip, :tipos, :ubicacion, :so, :servicios, :caracteristicas, :tipoplataforma, :observaciones, :dependencias, :conexiones, :tipored, :estatus)";

// Ejecuta la consulta SQL
$stmt = $db->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->bindParam(":nombre", $nombre);
$stmt->bindParam(":ip", $ip);
$stmt->bindParam(":tipos", $tipos);
$stmt->bindParam(":ubicacion", $ubicacion);
$stmt->bindParam(":so", $so);
$stmt->bindParam(":servicios", $servicios);
$stmt->bindParam(":caracteristicas", $caracteristicas);
$stmt->bindParam(":tipoplataforma", $tipoplataforma);
$stmt->bindParam(":observaciones", $observaciones);
$stmt->bindParam(":dependencias", $dependencias);
$stmt->bindParam(":conexiones", $conexiones);
$stmt->bindParam(":tipored", $tipored);
$stmt->bindParam(":estatus", $estatus);
$stmt->execute();

// Comprueba si la consulta fue exitosa
if ($stmt->rowCount() > 0) {
    echo "El dispositivo se registró correctamente.";
} else {
    echo "Ocurrió un error al registrar el dispositivo.";
}

?>
