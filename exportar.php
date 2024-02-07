<?php
// exportar.php

if (isset($_POST['exportar'])) {
    // Configuraciones de la base de datos
    $host = "localhost";
    $dbname = "Movilnet";
    $username = "postgres";
    $password = "postgres";

    // Crea una conexión a la base de datos
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Realiza la misma consulta que en consulta_funcion.php
    $SQL_READ = "SELECT * FROM servidores WHERE text(id) LIKE :buscar OR nombre LIKE :buscar OR ip LIKE :buscar OR ubicacion LIKE :buscar OR estatus LIKE :buscar";
    $stmt = $conn->prepare($SQL_READ);
    $buscar = "%" . $_POST['buscar'] . "%";  // Ajusta según sea necesario
    $stmt->bindParam(":buscar", $buscar);
    $stmt->execute();

    // Configura la cabecera para la descarga de un archivo CSV
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="exportacion.csv"');

    // Abre el archivo de salida en modo escritura
    $salida = fopen('php://output', 'w');

    // Escribe la cabecera del CSV
    fputcsv($salida, ["ID", "Nombre", "IP", "Tipos", "Ubicación", "SO", "Servicios", "Características", "Tipo de plataforma", "Observaciones", "Dependencias", "Conexiones", "Tipo de red", "Estatus", "Creado", "Modificado"]);

    // Escribe las filas de datos
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        fputcsv($salida, $row);
    }

    // Cierra el archivo
    fclose($salida);

    // Finaliza el script para evitar que se muestre el HTML de consulta_funcion.php
    exit();
} else {
    // Redirecciona si se accede directamente a exportar.php sin el parámetro adecuado
    header("Location: consulta_funcion.php");
    exit();
}
?>
