<?php ob_start(); ?>
<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar servidor</title>
  <link href='https://fonts.googleapis.com/css?family=Open Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="CSS\style_registro.css">
</head>

<body>
  <div class="container">
    <div class="frame">
      <div class="nav">
        <ul class="links">
          <li class="signup-active"><a class="boton">Registro</a></li>
        </ul>
      </div>
      <div class="form-signup">
      <form action="conexiones\registro_servidores.php" method="post">
        <div class="row">
          <div class="col-6">
            <label for="id" class="text-left">ID del servidor</label>
            <input class="form-styling" type="number" name="id" placeholder="">
          </div>
          <div class="col-6">
            <label for="nombre" class="text-left">Nombre del servidor</label>
            <input class="form-styling" type="text" name="nombre" placeholder="">
          </div>
        </div>

        <div class="row1">
          <div class="col-6">
            <label for="ip" class="text-left">IP del servidor</label>
            <input class="form-styling" type="text" name="ip" placeholder="">
          </div>
          <div class="col-6">
            <label for="tipos" class="text-left">Tipo</label>
            <input class="form-styling" type="text" name="tipos" placeholder="">
          </div>
        </div>

        <div class="row2">
          <div class="col-6">
            <label for="ubicacion" class="text-left">Ubicación</label>
            <input class="form-styling" type="text" name="ubicacion" placeholder="">
          </div>
          <div class="col-6">
            <label for="so" class="text-left">SO</label>
            <input class="form-styling" type="text" name="so" placeholder="">
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <label for="servicios" class="text-left">Servicios</label>
            <input class="form-styling" type="text" name="servicios" placeholder="">
          </div>
          <div class="col-6">
            <label for="caracteristicas" class="text-left">Características</label>
            <input class="form-styling" type="text" name="caracteristicas" placeholder="">
          </div>
        </div>

        <div class="row">
          <div class="col-6">
            <label for="tipo_plataforma" class="text-left">Tipo de plataforma</label>
            <input class="form-styling" type="text" name="tipo_plataforma" placeholder="">
          </div>
          <div class="col-6">
          <label for="tipo_red" class="text-left">Tipo de Red</label>
            <input class="form-styling" type="text" name="tipo_red" placeholder="">
          </div>
        </div>

        <div class="row3">
          <div class="col-6">
            <label for="dependencias" class="text-left">Dependencias</label>
            <input class="form-styling" type="text" name="dependencias" placeholder="">
          </div>
          <div class="col-6">
            <label for="conexiones" class="text-left">Conexiones</label>
            <input class="form-styling" type="text" name="conexiones" placeholder="">
          </div>
        </div>


        <div class="row">
          <div class="col-6">
          <label for="observaciones" class="text-left">Observaciones</label>
            <p><input class="form-styling_observacion" type="text" name="observaciones" placeholder=""></p>
          </div>
          <div class="col-14">
            <label for="estatus" class="text-left1">Indique el estatus</label>
          </div>
        </div>
        <div class="reg_confirm">
        <input type="submit" value="Registrar servidor" class="btn-signup" id="submitBtn">
        </div>

        <div class="reg_cancel">
        <input type="submit" value="Cancelar" class="btn-signup" id="submitBtn">
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

