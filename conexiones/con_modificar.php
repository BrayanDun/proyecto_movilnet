<?php
  // Obtenemos el ID del servidor a modificar
  $id = $_GET['id'];

  // Conectamos a la base de datos
  $conexion = new PDO("pgsql:host=localhost;dbname=Movilnet;user=postgres;password=postgres");

  // Consultamos el servidor
  $consulta = "SELECT * FROM servidores WHERE id = $id";
  $resultado = $conexion->query($consulta);

  // Si la consulta es exitosa
  if ($resultado->rowCount() > 0) {
    // Obtenemos el registro del servidor
    $registro = $resultado->fetch_assoc();

    // Rellenamos los campos del formulario con los datos del servidor
    $nombre_completo = $registro['nombre_completo'];
    $ip = $registro['ip'];
    $tipos = $registro['tipos'];

    // Actualizamos los datos del servidor en la base de datos
    $consulta = "UPDATE servidores
    SET nombre_completo = '$nombre_completo',
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

    $conexion->query($consulta);

    // Si la actualización fue exitosa
    if ($conexion->rowCount() > 0) {
      // Redirigimos al usuario a la página de inicio
      header("Location: index.php");
    }
  }

  // Si la consulta no fue exitosa
  else {
    // Mostramos un mensaje de error
    echo "No se encontró el servidor.";
  }

  // Cerramos la conexión con la base de datos
  $conexion = null;
?>
