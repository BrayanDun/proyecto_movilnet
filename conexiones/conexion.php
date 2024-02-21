<?php
// Parámetros de conexión a la base de datos
$host = "localhost";  // Cambia esto según tu configuración
$dbname = "Movilnet";  // Cambia esto según tu configuración
$user = "postgres";  // Cambia esto según tu configuración
$password = "postgres";  // Cambia esto según tu configuración

// Intenta establecer la conexión
try {
    $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Otros ajustes de conexión si es necesario
} catch (PDOException $e) {
    die("Error al conectar: " . $e->getMessage());
}
// Función para obtener el historial
function obtenerHistorial($db) {
    $stmt = $db->query("SELECT * FROM historial");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Función para registrar una actividad en el historial
function registrarActividad($db, $id_administrador, $modulo) {
    try {
        // Preparar la consulta SQL
        $query = "INSERT INTO historial (id_administrador, modulo, fecha_hora) VALUES (?, ?, CURRENT_TIMESTAMP)";
        $stmt = $db->prepare($query);

        // Asignar los valores y ejecutar la consulta
        $stmt->execute([$id_administrador, $modulo]);

        // Puedes agregar lógica adicional aquí, si es necesario

    } catch (PDOException $e) {
        // Manejar cualquier error de la base de datos
        echo "Error al registrar la actividad: " . $e->getMessage();
    }
}

?>
