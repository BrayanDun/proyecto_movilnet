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
        require_once('../TCPDF/tcpdf.php');
        $pdf = new TCPDF();

        // Agregar una nueva página al PDF
        $pdf->AddPage();

        // Configuraciones adicionales según tus necesidades
        $pdf->SetFont('times', '', 12);

        // Agregar una imagen en la esquina superior derecha del PDF
        $imagePath = '../img/Movilnet.jpg';
        $pdf->Image($imagePath, 170, 10, 30);

        // Crear la tabla en el PDF con diseño redondeado y colorido
        $html = '<h2 style="text-align:center; color: #FF585F;">Tabla de Servidores</h2>';

        // Ajustar el tamaño de la tabla y la posición de la imagen
        $html .= '<table border="0,5" 
            style="
            width: 100%;
            border-collapse: collapse;
            text-align: center;
            border-radius: 12px; 
            overflow: hidden;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);">';
        $html .= '<tr style="background-color: #FF585F; color: white; border-bottom: 2px solid #FF585F;">';
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

        // Agregar datos a la tabla con colores alternados
        $rowColor = '#F9F9F9'; // Color de fondo inicial
        foreach ($result as $row) {
            $html .= '<tr style="background-color: ' . $rowColor . ';">';
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

            // Cambiar el color de fondo para la siguiente fila
            $rowColor = ($rowColor === '#F9F9F9') ? '#FFFFFF' : '#F9F9F9';
        }

        $html .= '</table>';

        // Escribir la tabla en el PDF
        $pdf->writeHTML($html, true, false, true, false, '');

        // Nombre del archivo PDF
        $filename = 'Servidores.pdf';

        // Salida del PDF (descarga o visualización según el navegador)
        $pdf->Output($filename, 'D');
    }

    // Llama a la función para exportar el PDF
    exportarPDF();
}
?>