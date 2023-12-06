<?php

// Definir las variables de configuración de la base de datos
$db_host = "localhost";
$db_name = "Movilnet";
$db_user = "postgres";
$db_password = "123456";

// Crear una conexión a la base de datos
$connection = new PDO("pgsql:host=$db_host;dbname=$db_name;user=$db_user;password=$db_password");

// Establecer el modo de errores de la conexión
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
