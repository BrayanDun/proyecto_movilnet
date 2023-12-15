<?php ob_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Consulta de servidores</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://kit.fontawesome.com/b408879b64.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<style>

body{
    display: flex;
    background-color: rgba(180, 173, 168, 0.466);
    align-items: center;
    justify-content: center;
}

.container{
    position: relative;
    margin-top: 50px;
}

label {
    position: absolute;
    margin: -25px;
    margin-left: 90px;
    font-size: large;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: rgb(235, 53, 53);
}

input {
    width: 350px;
    padding: 15px;
    padding-right: 35px;
    font-size: 1rem;
    border-radius: 10px;
    border: 0;
    outline: none;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

button {
    background-color: crimson;
    padding: 10px 15px;
    position: absolute;
    border: 0;
    top: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    border-radius: 0 5px 5px 0;
    color: white;
    cursor: pointer;
}

button:hover {
    background-color: darkred;
}

table {
    position: absolute;
    background-color: rgb(252, 248, 248);
    margin-top: 450px;
    width: 200px;
    height: 200px;
    border-collapse: collapse;
    justify-content: center;
}

table, th, td, tr {
    border: 2px solid;
    border-color: crimson;
    justify-content: center;
    font-size: 0.8rem;
}

img {
    position: absolute;
    margin-top: 15px;
    margin-left: 700px;
    width: 100px;
    height: 100px;
    image-resolution: 100%;
    background-image: -webkit-image-set(1);

}


</style>
    <div class="container">    
        <label> CONSULTAR SERVIDORES </label>
        <input type="text" placeholder="Buscar..."></input>
        <button><i class='bx bx-search-alt-2'></i></button>
    </div>
    
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
            echo '<td><a href="">Modificar</a></td>';
            echo '<td><a href="">Eliminar</a></td>';
            echo "</tr>";
          }
          ?>
    
        </tbody>
      </table>
</body>

</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index.php");

?>