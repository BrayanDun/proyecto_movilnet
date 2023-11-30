<?php
      // Configuraciones de la base de datos
      $host = "localhost";
      $dbname = "Movilnet";
      $username = "postgres";
      $password = "postgres";
      // Conectarse a la base de datos
      $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

      // Ejecutar una consulta SQL
      $resultado = $conn->query("SELECT * FROM servidores");
      // Si la consulta se ejecutó correctamente
      if ($resultado) {
        // Iterar sobre los resultados
        while ($fila = $resultado->fetch()) {
          // Imprimir los datos de la fila
          echo "<tr>";
          echo "<td>" . $fila["id_servidor"] . "</td>";
          echo "<td>" . $fila["dirección"] . "</td>";
          echo "<td>" . $fila["id_aplicativo"] . "</td>";
          echo "<td>" . $fila["id_servicios"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "La consulta no se ejecutó correctamente.";
      }
      

      // Cerrar la conexión
      $conn = null;
      ?>

      