<?php
      // Configuraciones de la base de datos
      $host = "localhost";
      $dbname = "Movilnet";
      $username = "postgres";
      $password = "postgres";
      // Conectarse a la base de datos
      $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

      // Ejecutar una consulta SQL
      $resultado = $conn->query("SELECT * FROM aplicativo");
      // Si la consulta se ejecutó correctamente
      if ($resultado) {
        // Iterar sobre los resultados
        while ($fila = $resultado->fetch()) {
          // Imprimir los datos de la fila
          echo "<tr>";
          echo "<td>" . $fila["id_aplicativo"] . "</td>";
          echo "<td>" . $fila["nombre_aplicativo"] . "</td>";
          echo "<td>" . $fila["tipo_aplicativo"] . "</td>";
          echo "</tr>";
        }
      } else {
        echo "La consulta no se ejecutó correctamente.";
      }
      

      // Cerrar la conexión
      $conn = null;
      ?>