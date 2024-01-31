
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

$SQL_READ = "SELECT * FROM servidores WHERE id LIKE :buscar OR nombre LIKE :buscar OR ip LIKE :buscar";
$stmt = $conn->prepare($SQL_READ);
$stmt->bindParam(':buscar', $buscar); // Use prepared statements for security
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>ip</th>";
    echo "<th>tipos</th>";
    echo "<th>ubicacion</th>";
    echo "<th>so</th>";
    echo "<th>servicios</th>";
    echo "<th>caracteristicas</th>";
    echo "<th>tipo_plataforma</th>";
    echo "<th>observaciones</th>";
    echo "<th>dependencias</th>";
    echo "<th>conexiones</th>";
    echo "<th>tipo_red</th>";
    echo "<th>estatus</th>";
    echo "</tr>";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}
?>