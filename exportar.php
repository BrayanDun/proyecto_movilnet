<?php
// Verifica si se hizo clic en el botón de exportar
if (isset($_POST['exportar'])) {
    // Función para exportar datos de la tabla "servidores" a un PDF
    function exportarPDF() {
        // Configuraciones de la base de datos
        $host = "localhost";
        $dbname = "Movilnet";
        $username = "postgres";
        $password = "postgres";

        // Crea una conexión a la base de datos
        $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Consulta para obtener todos los datos de la tabla "servidores"
        $stmt = $conn->query("SELECT * FROM servidores");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Crear un nuevo objeto TCPDF
        require_once('TCPDF/tcpdf.php');
        $pdf = new TCPDF();

        // Agregar una nueva página al PDF
        $pdf->AddPage();

        // Configuraciones adicionales según tus necesidades
        $pdf->SetFont('times', '', 12);

        // Crear la tabla en el PDF
        $html = '<table border="1">';
        $html .= '<tr>';
        $html .= '<th>ID</th>';
        $html .= '<th>Nombre</th>';
        $html .= '<th>IP</th>';
        $html .= '<th>Tipos</th>';
        $html .= '<th>Ubicación</th>';
        $html .= '<th>Tipo de red</th>';
        $html .= '<th>Estatus</th>';
        $html .= '<th>Creado</th>';
        $html .= '<th>Modificado</th>';
        $html .= '</tr>';

        // Agregar datos a la tabla
        foreach ($result as $row) {
            $html .= '<tr>';
            $html .= '<td>' . $row['id'] . '</td>';
            $html .= '<td>' . $row['nombre'] . '</td>';
            $html .= '<td>' . $row['ip'] . '</td>';
            $html .= '<td>' . $row['tipos'] . '</td>';
            $html .= '<td>' . $row['ubicacion'] . '</td>';
            $html .= '<td>' . $row['tipo_red'] . '</td>';
            $html .= '<td>' . $row['estatus'] . '</td>';
            $html .= '<td>' . $row['creado_en'] . '</td>';
            $html .= '<td>' . $row['modificado_en'] . '</td>';
            $html .= '</tr>';
        }

        $html .= '</table>';

        // Escribir la tabla en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Nombre del archivo PDF
        $filename = 'exportacion_servidores.pdf';

        // Salida del PDF (descarga o visualización según el navegador)
        $pdf->Output($filename, 'D');
    }

    // Llama a la función para exportar el PDF
    exportarPDF();
}
?>