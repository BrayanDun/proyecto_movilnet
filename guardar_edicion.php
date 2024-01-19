<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Conectar a la base de datos
    $db = new PDO("pgsql:host=localhost;dbname=Movilnet", "postgres", "postgres");

    // Obtener los datos enviados desde la página HTML
    $id = $_GET['id'];
    $nombre = $_GET["nombre"];
    $ip = $_GET["ip"];
    $tipos = $_GET["tipos"];
    $ubicacion = $_GET["ubicacion"];
    $so = $_GET["so"];
    $servicios = $_GET["servicios"];
    $caracteristicas = $_GET["caracteristicas"];
    $tipo_plataforma = $_GET["tipo_plataforma"];
    $observaciones = $_GET["observaciones"];
    $dependencias = $_GET["dependencias"];
    $conexiones = $_GET["conexiones"];
    $tipo_red = $_GET["tipo_red"];
    $estatus = $_GET["estatus"];
    
    // Actualizar la fila en la base de datos
    $consulta = "UPDATE servidores SET nombre = :nombre, ip = :ip WHERE id = :id";
    $statement = $db->prepare($consulta);
    $statement->bindParam(':id', $id);
    $statement->bindParam(':nombre', $nombre);
    $statement->bindParam(':ip', $ip);
    $statement->bindParam(':tipos', $tipos);
    $statement->bindParam(':ubicacion', $ubicacion);
    $statement->bindParam(':so', $so);
    $statement->bindParam(':servicios', $servicios);
    $statement->bindParam(':caracteristicas', $caracteristicas);
    $statement->bindParam(':tipo_plataforma', $tipo_plataforma);
    $statement->bindParam(':observaciones', $observaciones);
    $statement->bindParam(':dependencias', $dependencias);
    $statement->bindParam(':conexiones', $conexiones);
    $statement->bindParam(':tipo_red', $tipo_red);
    $statement->bindParam(':estatus', $estatus);
    // Repetir el proceso para los demás campos

    $exito = $statement->execute();

    // Manejar la respuesta
    if ($exito) {
        echo "Actualización exitosa";
    } else {
        echo "Error al actualizar la base de datos";
    }

    // Cerrar la conexión a la base de datos
    $db = null;
} else {
    echo "Acceso no permitido";
}
?>
