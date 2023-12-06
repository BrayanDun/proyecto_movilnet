<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar servidor</title>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <div class="frame">
      <div class="nav">
        <ul class="links">
          <li class="signin-active"><a class="btn">Registro</a></li>
        </ul>
      </div>
      <div ng-app ng-init="checked = false">
        <form class="form-signup" action="conexiones\registro_servidores.php" method="post" name="form">

          <label for="id">ID del servidor</label>
          <input class="form-styling" type="number" name="id" placeholder="">

          <label for="nombre">Nombre del servidor</label>
          <input class="form-styling" type="text" name="nombre" placeholder="">

          <label for="ip">IP del servidor</label>
          <input class="form-styling" type="text" name="ip" placeholder="">

          <label for="tipos">Tipo</label>
          <input class="form-styling" type="text" name="tipos" placeholder="">

          <label for="ubicacion">Ubicación</label>
          <input class="form-styling" type="text" name="ubicacion" placeholder="">

          <label for="so">SO</label>
          <input class="form-styling" type="text" name="so" placeholder="">

          <label for="servicios">Servicios</label>
          <input class="form-styling" type="text" name="servicios" placeholder="">

          <label for="caracteristicas">Características</label>
          <input class="form-styling" type="text" name="caracteristicas" placeholder="">

          <label for="tipo_plataforma">Tipo de plataforma</label>
          <input class="form-styling" type="text" name="tipo_plataforma" placeholder="">

          <label for="observaciones">Observaciones</label>
          <input class="form-styling" type="text" name="observaciones" placeholder="">

          <label for="dependencias">Dependencias</label>
          <input class="form-styling" type="text" name="dependencias" placeholder="">

          <label for="conexiones">Conexiones</label>
          <input class="form-styling" type="text" name="conexiones" placeholder="">

          <label for="tipo_red">Tipo de red</label>
          <input class="form-styling" type="text" name="tipo_red" placeholder="">

          <label for="estatus">Estatus</label>
          <input class="form-styling" type="text" name="estatus" placeholder="">

          <input type="submit" value="Registrar servidor" class="btn-signup" id="submitBtn">

        </form>
        <div class="message-container">
          <p class="registration-message">Servidor registrado</p>
          <a href="logo.html" class="btn-goback">Volver al inicio</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
<?php $contents = ob_get_clean(); ?>
<?php 

require("./index.php");

?>

