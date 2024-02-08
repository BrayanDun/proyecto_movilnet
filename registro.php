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

<a href="javascript:history.back()" style="text-decoration: none;">
        <button class="btn-atras">
        <i class="fas fa-arrow-left"></i> Atrás
        </button>
    </a>

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

          <div class="select">
            <label for="tipos" class="text-left">Tipo</label>
            <select class='form-styling' name="tipos" id="tipos">
              <option value="Base de Datos">Base de Datos</option>
              <option value="Aplicativo">Aplicativo</option>
              <option value="Respaldo">Respaldo</option>
              <option value="Manejo de Version">Manejo de Versión</option>
              <option value="Gestión">Gestión</option>
              <option value="Balanceo">Balanceo</option>
              <option value="Caché">Caché</option>
            </select>
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
          <div class="select">
            <label for="servicios" class="text-left">Servicios</label>
            <select class='form-styling' name="servicios" id="servicios">
              <option value="DHCP">DHCP</option>
              <option value="WebLogic">WebLogic</option>
              <option value="Correo">Correo</option>
              <option value="Aplicaciones">Aplicaciones</option>
              <option value="Versiones">Versiones</option>
            </select>
        </div>
          <div class="col-6">
            <label for="caracteristicas" class="text-left">Características</label>
            <input class="form-styling" type="text" name="caracteristicas" placeholder="">
          </div>
        </div>

        <div class="row">
        <div class="select">
          <label for="tipo_plataforma" class="text-left">Tipo de plataforma</label>
          <select class='form-styling' name="tipo_plataforma" id="tipo_plataforma">
            <option value="Dessarrollo">Desarrollo</option>
            <option value="Calidad">Calidad</option>
            <option value="Produccion">Produccion</option>
          </select>
        </div>
          <div class="col-6">
          <label for="tipo_red" class="text-left">Tipo de Red</label>
            <input class="form-styling" type="text" name="tipo_red" placeholder="">
          </div>
        </div>

          <div class="row3">
            <div class="col-6">
              <label for="dependencias" class="text-left">Dependencias</label>
              <select class="form-styling" name="dependencias" id="dependencias">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT nombre FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<option value='" . $row['nombre'] . "'>" . $row['nombre'] . "</option>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </select>
            </div>
          <div class="col-6">
            <label for="conexiones" class="text-left">Conexiones</label>
            <select class="form-styling" name="conexiones" id="conexiones">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT ip FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<option value='" . $row['ip'] . "'>" . $row['ip'] . "</option>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </select>
          </div>
        </div>


        <div class="row">
          <div class="col-6">
          <label for="observaciones" class="text-left">Observaciones</label>
            <p><input class="form-styling_observacion" type="text" name="observaciones" placeholder=""></p>
          </div>
          <div class="col-14">
            <label for="estatus" class="text-left1">Indique el estatus</label>
            <select class='form-styling' name="estatus" id="estatus">
              <option value="Habilitado">Habilitado</option>
              <option value="Inhabilitado">Inhabilitado</option>
            </select>
          </div>
        </div>
        </div>
        <div class="reg_confirm">
        <input type="submit" value="Registrar servidor" class="btn-signup" id="submitBtn">
        </div>

      </div>
    
    </div>
  </div>

</body>

</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_administrador.php");

?>



