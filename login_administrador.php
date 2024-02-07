<?php
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);

// Obtiene los datos del formulario
$p00 = isset($_POST["p00"]) ? $_POST["p00"] : "";
$contraseña = isset($_POST["contraseña"]) ? $_POST["contraseña"] : "";

// Verificar si ambos campos están completos
if (empty($p00) || empty($contraseña)) {
    header("Location: error-login.php?message=Por favor, completa ambos campos.");
    exit;
}

// Consulta SQL para buscar el usuario
$sql = "SELECT * FROM administrador WHERE p00 = :p00 AND contraseña = :contrasena";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':p00', $p00);
$stmt->bindParam(':contrasena', $contraseña);

// Ejecutar la consulta solo si los campos no están vacíos
if ($p00 !== "" && $contraseña !== "") {
    $stmt->execute();

    // Verifica si el usuario existe
    if ($stmt->rowCount() > 0) {
        // El usuario existe
        // Inicia sesión
        session_start();
        $_SESSION["p00"] = $p00;
        header("Location: home.php");
        exit;
    }
}

// El usuario no existe o los campos estaban vacíos
// Redirige a la página de error
header("Location: error-login.php");
exit;

// Cierra la conexión
$conn = null;
?>