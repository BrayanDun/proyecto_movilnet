<?php ob_start();?>

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
body {
    display: flex;
    background-color: rgba(180, 173, 168, 0.466);
    align-items: center;
    justify-content: center;
}

.container {
    position: absolute;
    margin-top: 29px;
    margin-left: 95px;
}
label {
    position: absolute;
    margin: -49px;
    margin-left: 10px;
    font-size: large;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #FF585F;
}

.busq {
    width: 170px;
    padding: 10px;
    padding-right: 38px;
    margin-top: 28px;
    font-size: 1rem;
    border-radius: 8px;
    border-color: #FF585F;
    outline: none;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.export {
  position: relative;
  left: 90%;
  top: 70px;
  transform: translate(-50%, -50%);
  margin: 10px;
  padding: 10px;
  background-color: #0072ff;
  color: white;
  border: none;
  border-radius: 12px;
  border-color: white;
  cursor: pointer;

  @media (max-width: 768px) {
    /* Ajustar las propiedades para pantallas pequeñas */
    width: 80%;
  }
}

.boton_busq {
    background-color: #FF585F;
    width: 52px;
    padding: 10px;
    position: absolute;
    margin-top: 26px;
    color: white;
    cursor: pointer;
    border-radius: 5px;
    border-color: whitesmoke;
    background-image: url(iconos/search-regular-24.png);
    background-repeat: no-repeat;
    background-position: 12px 10px;
}

button:hover {
    background-color: darkred;
}


table {
    position: relative;
    left: 10%;
    top: 0%;
    transform: translate(-11.5%, -18%);
    background-color: rgb(255 255 255);
    margin-top: 85px;
    width: 96%;
    border-collapse: 35px;
    border-radius: 8px;
}

th, td {
    border: 1px solid #FF585F;
    border-radius: 6px;
    padding: 9px;
    text-align: center;
    font-size: 0.9rem;
}

th {
    background-color: #FF585F;
    color: white;

    @media (max-width: 768px) {
    /* Ajustar las propiedades para pantallas pequeñas */
    width: 80%;
  }
}

.ver-mas {
    background-color: #FF585F;
    padding: 6px 6px;
    position: relative;
    margin-right: 10px;
    border-radius: 9px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}
h1{
    position: absolute;
    top: 180px;
    border-radius: 14px;
    color: black;
}

.modal{
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #111111bd;
    display: flex;
    opacity: 0;
    pointer-events: none;
    transition: opacity .6s .9s;
    --transform: translateY(-100vh);
    --transition: transform .8s;
}

.modal--show{
    opacity: 1;
    pointer-events: unset;
    transition: opacity .6s;
    --transform: translateY(0);
    --transition: transform .8s .8s;
}


.modal__container{
    margin: auto;
    width: 90%;
    max-width: 600px;
    max-height: 90%;
    background-color: #fff;
    border-radius: 6px;
    padding: 3em 2.5em;
    display: grid;
    gap: 1em;
    place-items: center;
    grid-auto-columns: 100%;
    transform: var(--transform);
    transition:var(--transition);
}
.modal__title{
    font-size: 2.5rem;
}

.modal__close{
    text-decoration: none;
    color: #fff;
    background-color: #F26250;
    padding: 1em 3em;
    border: 1px solid ;
    border-radius: 6px;
    display: inline-block;
    font-weight: 300;
    transition: background-color .3s;
}

.modal__close:hover{
    color: #F26250;
    background-color: #fff;
}

strong{
    color: #FF585F;
    font-size: larger;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
}



</style>
<div class="container">
    <form  action="consulta_funcion.php" method="POST">
        <input class="busq" type="text" placeholder="Buscar..." name="buscar">
        <input type="submit" value="" class="boton_busq">
    </form>
    </div>
    <!-- Botón de exportación -->
        <form action="exportar.php" method="POST" target="_blank">
            <input class="export" type="hidden" name="exportar" value="1">
            <input class="export" type="submit" value="Exportar a PDF">
        </form>
    
    <a href="javascript:history.back()" style="text-decoration: none;">
        <button style="
            margin: 0px;
            margin-bottom: -176px;
            padding: 10px;
            background-color: #FF585F;
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            position: absolute;
            border-color: white;">
            <i class="fas fa-arrow-left"></i> Atrás
        </button>
    </a>
    
    <a href="graficas_tipos_usuarios.php" style="text-decoration: none;">
        <button style="
           position: relative;
            left: 76%;
            top: 8px;
            transform: translate(-48%, -45%);
            margin: 10px;
            padding: 10px;
            background-color: #0072ff;
            color: white;
            border: none;
            border-radius: 12px;
            border-color: white;
            cursor: pointer;
           ">
            <i class="#"></i> Graficas Tipos
        </button>
    </a>
    
    <a href="graficas_estatus_usuarios.php" style="text-decoration: none;">
        <button style="
           position: relative;
            left: 52%;
            top: 8px;
            transform: translate(-65%, -45%);
            margin: 10px;
            padding: 10px;
            background-color: #0072ff;
            color: white;
            border: none;
            border-radius: 12px;
            border-color: white;
            cursor: pointer;
           ">
            <i class="#"></i> Graficas Estatus
        </button>
    </a>


    <?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable error handling

$buscar = isset($_POST['buscar']) ? $_POST['buscar'] : "";

// $SQL_READ = "SELECT * FROM servidores WHERE id LIKE $buscar OR nombre LIKE $buscar OR ip LIKE $buscar";
$SQL_READ = "SELECT * FROM servidores WHERE  text(id) LIKE :buscar OR nombre LIKE :buscar OR ip LIKE :buscar OR tipos LIKE :buscar OR ubicacion LIKE :buscar OR estatus LIKE :buscar";
$stmt = $conn->prepare($SQL_READ);
$buscar = "%" . $buscar . "%";
$stmt->bindParam(":buscar", $buscar); // Use prepared statements for security
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Nombre</th>";
    echo "<th>IP</th>";
    echo "<th>Tipos</th>";
    echo "<th>Servicios</th>";
    echo "<th>Ubicación</th>";
    echo "<th>Tipo de plataforma</th>";
    echo "<th>Tipo de Red</th>";
    echo "<th>Estatus</th>";
    echo "<th>detalles</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['ip'] . "</td>";
        echo "<td>" . $row['tipos'] . "</td>";
        echo "<td>" . $row['ubicacion'] . "</td>";
        echo "<td>" . $row['tipo_plataforma'] . "</td>";
        echo "<td>" . $row['tipo_red'] . "</td>";
        echo "<td>" . $row['servicios'] . "</td>";
        echo "<td>" . $row['estatus'] . "</td>";
        echo "<td><button class='ver-mas' data-id='" . $row['id'] . "'>Ver mas..</button></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<h1>No se encontraron resultados</h1>";
}
?>
<section class="modal" id="modal">
    <div class="modal__container">
        <h2 class="modal__title">Detalles del servidor</h2>
        <p id="detalleDatos"></p>
        <a href="javascript:void(0)" class="modal__close" onclick="cerrarModal()">CERRAR</a>
    </div>
</section>
<script src="js/detalles.js"></script>
</body>
</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_usuario.php");

?>