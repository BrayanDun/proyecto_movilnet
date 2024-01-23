<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Conectar a la base de datos
    $db = new PDO("pgsql:host=localhost;dbname=Movilnet", "postgres", "postgres");

    // Obtener el ID del servidor a desincorporar
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        // Realizar la acción de desincorporación (cambiar el estado a 'Desincorporado')
        $consulta = "UPDATE servidores SET estatus = 'Desincorporado' WHERE id = :id";
        $statement = $db->prepare($consulta);
        $statement->bindParam(':id', $id);

        // Ejecutar la consulta
        $exito = $statement->execute();

        // Manejar la respuesta
        if ($exito) {
            echo "Desincorporación exitosa";
        } else {
            echo "Error al desincorporar el servidor";
            print_r($statement->errorInfo()); // Imprimir información sobre errores
        }
    } else {
        echo "ID de servidor no válido";
    }

    // Cerrar la conexión a la base de datos
    $db = null;
} else {
    echo "Acceso no permitido";
}
?>

