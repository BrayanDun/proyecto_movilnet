<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Consulta de servidores</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>IP</th>
        <th>Tipos</th>
        <th>Ubicación</th>
        <th>SO</th>
        <th>Servicios</th>
        <th>Características</th>
        <th>Tipo de plataforma</th>
        <th>Observaciones</th>
        <th>Dependencias</th>
        <th>Conexiones</th>
        <th>Tipo de red</th>
        <th>Estatus</th>
      </tr>
    </thead>
    <tbody>

      <?php
      // Configuraciones de la base de datos
      $host = "localhost";
      $dbname = "Movilnet";
      $username = "postgres";
      $password = "postgres";

      // Crea una conexión a la base de datos
      $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

      // Consultar los datos de todos los servidores
      $sql = "SELECT * FROM servidores";

      // Ejecutar la consulta SQL
      $stmt = $conn->query($sql);

      // Obtener los resultados de la consulta SQL
      $result = $stmt->fetchAll();

      // Cerrar la conexión a PostgreSQL
      $conn = null;

      // Imprimir los resultados de la consulta SQL
      foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['ip'] . "</td>";
        echo "<td>" . $row['tipos'] . "</td>";
        echo "<td>" . $row['ubicacion'] . "</td>";
        echo "<td>" . $row['so'] . "</td>";
        echo "<td>" . $row['servicios'] . "</td>";
        echo "<td>" . $row['caracteristicas'] . "</td>";
        echo "<td>" . $row['tipo_plataforma'] . "</td>";
        echo "<td>" . $row['observaciones'] . "</td>";
        echo "<td>" . $row['dependencias'] . "</td>";
        echo "<td>" . $row['conexiones'] . "</td>";
        echo "<td>" . $row['tipo_red'] . "</td>";
        echo "<td>" . $row['estatus'] . "</td>";
        echo "</tr>";
      }
      ?>

    </tbody>
  </table>

</body>
</html>
