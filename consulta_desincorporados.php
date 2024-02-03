<?php ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Desincorporados</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://kit.fontawesome.com/b408879b64.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>
body {
    display: flex;
    background-color: rgba(180, 173, 168, 0.466);
    align-items: center;
    justify-content: center;
}

.container {
    position: relative;
    margin-top: 130px;
    margin-left: 350px;
}

label {
    position: absolute;
    margin: -25px;
    margin-left: 90px;
    font-size: xx-large;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #FF585F;
}


button:hover {
    background-color: darkred;
}



table {
    position: absolute;
    background-color: rgb(252, 248, 248);
    margin-top: 50px;
    width: 100%;  /* Ajuste el ancho de la tabla al 100% para que ocupe todo el contenedor */
    border-collapse: collapse;  /* Añadido para colapsar los bordes de las celdas */
}

th, td {
    border: 2px solid #FF585F;
    padding: 8px;
    text-align: left;
    font-size: 0.8rem;
}

th {
    background-color: #FF585F;
    color: white;
}
</style>
    <div class="container">    
        <label>DESINCORPORADOS </label>
    </div>
    
    <a href="javascript:history.back()" style="text-decoration: none;">
        <button style="margin: 10px; padding: 10px; background-color: #FF585F; color: white; border: none; cursor: pointer;">
            <i class="fas fa-arrow-left"></i> Atrás
        </button>
    </a>

    <table>
        <thead>
        <tr>
            <th> ID </th>
            <th> Nombre </th>
            <th> IP </th>
            <th> Tipos </th>
            <th> Ubicación </th>
            <th> SO </th>
            <th> Servicios </th>
            <th> Características </th>
            <th> Tipo de plataforma </th>
            <th> Observaciones </th>
            <th> Dependencias </th>
            <th> Conexiones </th>
            <th> Tipo de red </th>
            <th> Estatus </th>
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
          $sql = "SELECT * FROM desincorporar";
    
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

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_administrador.php");

?>