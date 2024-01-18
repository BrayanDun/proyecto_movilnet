<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar servidor</title>
  <link rel="stylesheet" href="CSS\style_modificar.css">
</head>
<body>
  <div class="container">
    <h1>Modificar servidor</h1>
    <form action="con_modificar.php" method="post">
      <input type="text" name="id" placeholder="ID del servidor">
      <input type="text" name="nombre" placeholder="Nombre completo del servidor">
      <input type="text" name="ip" placeholder="IP del servidor">
      <input type="text" name="tipos" placeholder="Tipos de servidor">
      <input type="text" name="ubicacion" placeholder="Ubicación del servidor">
      <input type="text" name="so" placeholder="Sistema operativo del servidor">
      <input type="text" name="servicios" placeholder="Servicios del servidor">
      <input type="text" name="caracteristicas" placeholder="Características del servidor">
      <input type="text" name="tipo_plataforma" placeholder="Tipo de plataforma del servidor">
      <input type="text" name="observaciones" placeholder="Observaciones sobre el servidor">
      <input type="text" name="dependencias" placeholder="Dependencias del servidor">
      <input type="text" name="conexiones" placeholder="Conexiones del servidor">
      <input type="text" name="tipo_red" placeholder="Tipo de red del servidor">
      <input type="text" name="estatus" placeholder="Estatus del servidor">
      <input type="submit" value="Modificar servidor">
    </form>
  
  </div>
</body>
</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index.php");

?>