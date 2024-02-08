<?php ob_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del servidor</title>
  <link href='https://fonts.googleapis.com/css?family=Open Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="CSS\style_detalles.css">
</head>

<a href="javascript:history.back()" style="text-decoration: none;">
        <button style="   
          margin-right: -99px;
          width: 13%;
          height: 40px;
          border: none;
          border-radius: 17px;
          color: #ffffff;
          background: #FF585F;
          cursor: pointer;
          ">
        <i class="fas fa-arrow-left"></i> Atrás
        </button>
    </a>

<body>
  <div class="container">
    <div class="frame">
      <div class="nav">
        <ul class="links">
          <li class="signup-active"><a class="boton">Detalles del Servidor</a></li>
        </ul>
      </div>
      <div class="form-signup">
      <form action="conexiones\registro_servidores.php" method="post">
        <div class="row">
          <div class="col-6">
          <label for="id" class="text-left">ID</label>
              <a class="form-styling" name="id" id="id">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT id FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['id'] . "</a>";
                  }
                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
          <div class="col-6">
          <label for="nombre" class="text-left">Nombre</label>
              <a class="form-styling" name="nombre" id="nombre">
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
                    echo "<a value='" . $row['nombre'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
        </div>

        <div class="row1">
          <div class="col-6">
          <label for="ip" class="text-left">Ip del Servidor</label>
              <a class="form-styling" name="ip" id="ip">
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
                    echo "<a value='" . $row['ip'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>

          <div class="text">
          <label for="tipo" class="text-left">Tipo</label>
              <a class="form-styling" name="tipo" id="tipo">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT tipo FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['tipo'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
        </div>

        <div class="row2">
          <div class="col-6">
          <label for="ubicacion" class="text-left">Ubicacion</label>
              <a class="form-styling" name="ubicacion" id="ubicacion">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT ubicacion FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['ubicacion'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
          <div class="col-6">
          <label for="so" class="text-left">SO</label>
              <a class="form-styling" name="so" id="so">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT so FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['so'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
        </div>

        <div class="row">
          <div class="select">
          <label for="servicios" class="text-left">Servicios</label>
              <a class="form-styling" name="servicios" id="servicios">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT servicios FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['servicios'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
        </div>
          <div class="col-6">
          <label for="caracteristicas" class="text-left">Características</label>
              <a class="form-styling" name="caracteristicas" id="caracteristicas">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT caracteristicas FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['caracteristicas'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
        </div>

        <div class="row">
        <div class="select">
        <label for="tipo_plataforma" class="text-left">Tipo de plataforma</label>
              <a class="form-styling" name="tipo_plataforma" id="tipo_plataforma">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT tipo_plataforma FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['tipo_plataforma'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>

        </div>
          <div class="col-6">
          <label for="tipo_red" class="text-left">Tipo de red</label>
              <a class="form-styling" name="tipo_red" id="tipo_red">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT tipo_red FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['tipo_red'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
        </div>

        <div class="row3">
            <div class="col-6">
              <label for="dependencias" class="text-left">Dependencias</label>
              <a class="form-styling" name="dependencias" id="dependencias">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT dependencias FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['dependencias'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
            </div>

          <div class="row3">
            <div class="col-6">
              
            </div>
          <div class="col-6">
            <label for="conexiones" class="text-left">Conexiones</label>
            <a class="form-styling" name="conexiones" id="conexiones">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT conexiones FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['conexiones'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
        </div>


        <div class="row">
          <div class="col-6">
          <label for="observaciones" class="text-left">Observaciones</label>
              <p class="form-styling_observacion" type="text" name="observaciones" id="observaciones">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT observaciones FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['observaciones'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </p>
          </div>
          <div class="col-14">
          <label for="estatus" class="text-left">Estatus</label>
              <a class="form-styling" name="estatus" id="estatus">
                <?php
                  // Conectar a la base de datos
                  $host = "localhost";
                  $dbname = "Movilnet";
                  $username = "postgres";
                  $password = "postgres";
                  $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

                  // Consultar los nombres de los servidores registrados
                  $sql = "SELECT estatus FROM servidores";
                  $stmt = $conn->query($sql);
                  $result = $stmt->fetchAll();

                  // Mostrar opciones en el campo de selección
                  foreach ($result as $row) {
                    echo "<a value='" . $row['estatus'] . "</a>";
                  }

                  // Cerrar la conexión
                  $conn = null;
                ?>
              </a>
          </div>
        </div>
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