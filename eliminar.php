<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    // Conectar a la base de datos
    $db = new PDO("pgsql:host=localhost;dbname=Movilnet", "postgres", "postgres");

    // Obtener el ID del servidor a desincorporar
    $id = intval($_GET['id']);

    // Obtener los datos del desincorporar antes de restaurar
    $consultaSelect = "SELECT * FROM desincorporar WHERE id = :id";
    $statementSelect = $db->prepare($consultaSelect);
    $statementSelect->bindParam(':id', $id);
    $statementSelect->execute();
    $datosServidor = $statementSelect->fetch(PDO::FETCH_ASSOC);

    if ($datosServidor) {
        // Eliminar de la tabla principal
        $consultaDelete = "DELETE FROM desincorporar WHERE id = :id";
        $statementDelete = $db->prepare($consultaDelete);
        $statementDelete->bindParam(':id', $id);
        $exitoDelete = $statementDelete->execute();

        // Manejar la respuesta
        if ($exitoDelete) {
            echo "restauracion exitosa";
        } else {
            echo "Error al restaurar el servidor";
            print_r($statementDelete->errorInfo()); // Imprimir información sobre errores
        }
    } else {
        echo "No se encontraron datos del servidor";
    }

    // Cerrar la conexión a la base de datos
    $db = null;
} else {
    echo "Acceso no permitido";
}
?>

