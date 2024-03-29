<?php
// Configuraciones de la base de datos
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Obtiene los datos del formulario
$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
$ip = isset($_POST["ip"]) ? $_POST["ip"] : "";
$tipos = isset($_POST["tipos"]) ? $_POST["tipos"] : "";
$ubicacion = isset($_POST["ubicacion"]) ? $_POST["ubicacion"] : "";
$so = isset($_POST["so"]) ? $_POST["so"] : "";
$servicios = isset($_POST["servicios"]) ? $_POST["servicios"] : "";
$caracteristicas = isset($_POST["caracteristicas"]) ? $_POST["caracteristicas"] : "";
$tipo_plataforma = isset($_POST["tipo_plataforma"]) ? $_POST["tipo_plataforma"] : "";
$observaciones = isset($_POST["observaciones"]) ? $_POST["observaciones"] : "";
$dependencias = isset($_POST["dependencias"]) ? $_POST["dependencias"] : "";
$conexiones = isset($_POST["conexiones"]) ? $_POST["conexiones"] : "";
$tipo_red = isset($_POST["tipo_red"]) ? $_POST["tipo_red"] : "";
$estatus = isset($_POST["estatus"]) ? $_POST["estatus"] : "";

// Verificar si ambos campos están completos
if (empty($id) || empty($nombre)|| empty($ip)|| empty($tipos)|| empty($ubicacion)|| empty($so)|| empty($servicios)|| empty($caracteristicas)|| empty($tipo_plataforma)|| empty($observaciones)|| empty($tipo_red)|| empty($estatus)) {
    header("Location: ../PHP/error-registro.php?message=Por favor, completa los campos.");
    exit;
}
    // Obtener la ID del formulario
    $id = $_POST['id'];

    // Consultar si la ID ya existe en la base de datos
    $sql_check_id = "SELECT id FROM servidores WHERE id = :id";
    $stmt_check_id = $conn->prepare($sql_check_id);
    $stmt_check_id->bindParam(':id', $id);
    $stmt_check_id->execute();

    // Si la ID ya está registrada, redirigir a una página de error
    if ($stmt_check_id->rowCount() > 0) {
        header("Location: ../PHP/error-registro.php?message=No se puede registrar un servidor con la misma ID. Por favor, elija una ID diferente.");
        exit; // Detener la ejecución del script
    }


// Recibir los datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$ip = $_POST['ip'];
$tipos = $_POST['tipos'];
$ubicacion = $_POST['ubicacion'];
$so = $_POST['so'];
$servicios = $_POST['servicios'];
$caracteristicas = $_POST['caracteristicas'];
$tipo_plataforma = $_POST['tipo_plataforma'];
$observaciones = $_POST['observaciones'];
$dependencias = $_POST['dependencias'];
$conexiones = $_POST['conexiones'];
$tipo_red = $_POST['tipo_red'];
$estatus = $_POST['estatus'];


// Crea una consulta SQL
$sql = "INSERT INTO servidores (id, nombre, ip, tipos, ubicacion, so, servicios, caracteristicas, tipo_plataforma, observaciones, dependencias, conexiones, tipo_red, estatus) VALUES (:id, :nombre, :ip, :tipos, :ubicacion, :so, :servicios, :caracteristicas, :tipo_plataforma, :observaciones, :dependencias, :conexiones, :tipo_red, :estatus)";

// Prepara la consulta SQL
$stmt = $conn->prepare($sql);

// Vincular los parámetros de la consulta SQL
$stmt->bindParam(':id', $id);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':ip', $ip);
$stmt->bindParam(':tipos', $tipos);
$stmt->bindParam(':ubicacion', $ubicacion);
$stmt->bindParam(':so', $so);
$stmt->bindParam(':servicios', $servicios);
$stmt->bindParam(':caracteristicas', $caracteristicas);
$stmt->bindParam(':tipo_plataforma', $tipo_plataforma);
$stmt->bindParam(':observaciones', $observaciones);
$stmt->bindParam(':dependencias', $dependencias);
$stmt->bindParam(':conexiones', $conexiones);
$stmt->bindParam(':tipo_red', $tipo_red);
$stmt->bindParam(':estatus', $estatus);

// Ejecutar la consulta SQL
$stmt->execute();

// Comprobar el resultado de la ejecución de la consulta SQL

if ($stmt->rowCount() == 0) {
  die('Error al registrar el servidor');
}

// Cerrar la conexión a PostgreSQL
$conn = null;

header("location: ../PHP/consulta_funcion.php");

?>
