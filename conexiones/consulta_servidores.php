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
    margin-top: 600px;
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
    <img src="data:image/jpeg;base64,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">
</body>

</html>