<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos (ajusta los parámetros según tu configuración)
try {
    $db = new PDO("pgsql:host=localhost;dbname=Movilnet", "postgres", "postgres");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error al conectar: " . $e->getMessage());
}

// Recibir datos del cliente
$data = json_decode(file_get_contents("php://input"));

// Mensajes de depuración para verificar los datos
var_dump($data);

// Actualizar la fila en la base de datos
$query = "UPDATE servidores 
          SET nombre = :nombre, 
              ip = :ip, 
              tipos = :tipos, 
              ubicacion = :ubicacion, 
              so = :so, 
              servicios = :servicios,
              caracteristicas = :caracteristicas,
              tipo_plataforma = :tipo_plataforma,
              observaciones = :observaciones,
              dependencias = :dependencias,
              conexiones = :conexiones,
              tipo_red = :tipo_red,
              estatus = :estatus,
              modificado_en = CURRENT_TIMESTAMP  -- Actualiza la hora de modificación
          WHERE id = :id";

try {
    $stmt = $db->prepare($query);
    $stmt->bindParam(':nombre', $data->nombre);
    $stmt->bindParam(':ip', $data->ip);
    $stmt->bindParam(':tipos', $data->tipos);
    $stmt->bindParam(':ubicacion', $data->ubicacion);
    $stmt->bindParam(':so', $data->so);
    $stmt->bindParam(':servicios', $data->servicios);
    $stmt->bindParam(':caracteristicas', $data->caracteristicas);
    $stmt->bindParam(':tipo_plataforma', $data->tipo_plataforma);
    $stmt->bindParam(':observaciones', $data->observaciones);
    $stmt->bindParam(':dependencias', $data->dependencias);
    $stmt->bindParam(':conexiones', $data->conexiones);
    $stmt->bindParam(':tipo_red', $data->tipo_red);
    $stmt->bindParam(':estatus', $data->estatus);
    $stmt->bindParam(':id', $data->id);
    
    $stmt->execute();
    
    echo "Actualización exitosa";
} catch (PDOException $e) {
    echo "Error al actualizar la fila: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos
$db = null;
?>