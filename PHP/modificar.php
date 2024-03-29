<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Consulta de servidores</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://kit.fontawesome.com/b408879b64.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../CSS/style_modificar.css">
    <link rel="icon" href="../img/image.png" type="image/png">
</head>

<body>
    <div class="container">
    </div>
    
    <a href="javascript:history.back()" style="text-decoration: none;">
        <button style="
            margin: 0px;
            margin-bottom: -176px;
            padding: 10px;
            background-color: #FF585F;
            color: white;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            position: absolute;
            border-color: white;
            margin-top: -26px;">

            <i class="fas fa-arrow-left"></i> Atrás
        </button>
    </a>
    
    <table>
        <thead>
            <tr>
                <th> ID </th>
                <th> Nombre </th>
                <th> IP </th>
                <th> Tipos </th>
                <th> Ubicación </th>
                <th> SO </th>
                <th> Servicios </th>
                <th> Características </th>
                <th> Tipo de plataforma </th>
                <th> Observaciones </th>
                <th> Dependencias </th>
                <th> Conexiones </th>
                <th> Tipo de red </th>
                <th> Estatus </th>
                <th> Creado </th>
                <th> Modificado </th>
                <th> Acciones </th>  <!-- Agregada columna de acciones -->
            </tr>
        </thead>
        <tbody>
            <?php
            $db = new PDO("pgsql:host=localhost;dbname=Movilnet", "postgres", "postgres");
            $consulta = "SELECT * FROM servidores";
            $resultado = $db->query($consulta);

            while ($fila = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr id='fila_{$fila['id']}'>";
                echo "<td>{$fila['id']}</td>";
                echo "<td><input type='text' value='{$fila['nombre']}' ></td>";
                echo "<td><input type='text' value='{$fila['ip']}'></td>";
            
                // Modificar para mostrar el valor actual en el primer <select>
                echo "<td><select>";
                echo "<option value='Base de Datos' " . ($fila['tipos'] === 'Base de Datos' ? 'selected' : '') . ">Base de Datos</option>";
                echo "<option value='Aplicativo' " . ($fila['tipos'] === 'Aplicativo' ? 'selected' : '') . ">Aplicativo</option>";
                echo "<option value='Respaldo' " . ($fila['tipos'] === 'Respaldo' ? 'selected' : '') . ">Respaldo</option>";
                echo "<option value='Manejo de Version' " . ($fila['tipos'] === 'Manejo de Version' ? 'selected' : '') . ">Manejo de Version</option>";
                echo "<option value='Gestión' " . ($fila['tipos'] === 'Gestión' ? 'selected' : '') . ">Gestión</option>";
                echo "<option value='Balanceo' " . ($fila['tipos'] === 'Balanceo' ? 'selected' : '') . ">Balanceo</option>";
                echo "<option value='Caché' " . ($fila['tipos'] === 'Caché' ? 'selected' : '') . ">Caché</option>";
                echo "</select></td>";
            
                // Repetir para los demás campos <select>
                
                echo "<td><input type='text' value='{$fila['ubicacion']}'></td>";
                echo "<td><input type='text' value='{$fila['so']}'></td>";
            
                echo "<td><select>";
                echo "<option value='DHCP' " . ($fila['servicios'] === 'DHCP' ? 'selected' : '') . ">DHCP</option>";
                echo "<option value='WebLogic' " . ($fila['servicios'] === 'WebLogic' ? 'selected' : '') . ">WebLogic</option>";
                echo "<option value='Correo' " . ($fila['servicios'] === 'Correo' ? 'selected' : '') . ">Correo</option>";
                echo "<option value='Aplicaciones' " . ($fila['servicios'] === 'Aplicaciones' ? 'selected' : '') . ">Aplicaciones</option>";
                echo "<option value='Versiones' " . ($fila['servicios'] === 'Versiones' ? 'selected' : '') . ">Versiones</option>";
                echo "</select></td>";
            
                echo "<td><input type='text' value='{$fila['caracteristicas']}'></td>";
            
                echo "<td><select>";
                echo "<option value='Desarrollo' " . ($fila['tipo_plataforma'] === 'Desarrollo' ? 'selected' : '') . ">Desarrollo</option>";
                echo "<option value='Calidad' " . ($fila['tipo_plataforma'] === 'Calidad' ? 'selected' : '') . ">Calidad</option>";
                echo "<option value='Producción' " . ($fila['tipo_plataforma'] === 'Producción' ? 'selected' : '') . ">Producción</option>";
                echo "</select></td>";
            
                echo "<td><input type='text' value='{$fila['observaciones']}'></td>";
                echo "<td><input type='text' value='{$fila['dependencias']}' readonly></td>";
                echo "<td><input type='text' value='{$fila['conexiones']}' readonly></td>";
                echo "<td><input type='text' value='{$fila['tipo_red']}'></td>";
            
                echo "<td><select>";
                echo "<option value='Habilitado' " . ($fila['estatus'] === 'Habilitado' ? 'selected' : '') . ">Habilitado</option>";
                echo "<option value='Inhabilitado' " . ($fila['estatus'] === 'Inhabilitado' ? 'selected' : '') . ">Inhabilitado</option>";
                echo "</select></td>";

                echo "<td>{$fila['creado_en']}</td>";  // Muestra la hora de creación
                echo "<td>{$fila['modificado_en']}</td>";  // Muestra la hora de modificación

                echo "<td><button class='modificar' onclick='editarFila({$fila['id']})'>Modificar</button></td>";
            }
            $db = null;
            ?>
        </tbody>
    </table>

    <script>
        function editarFila(id) {
            var fila = document.getElementById('fila_' + id);

            if (!fila) {
                console.error('Error: No se encontró la fila con el ID ' + 'fila_' + id);
                return;
            }

            // Hacer los campos editables
            for (var i = 2; i <= 14; i++) {
                var elemento = fila.querySelector("td:nth-child(" + i + ") input, td:nth-child(" + i + ") select");
                elemento.removeAttribute('readonly');
            }

            // Cambiar el botón "Modificar" a "Guardar"
            var botonModificar = fila.querySelector('.modificar');
            botonModificar.innerHTML = 'Guardar';
            botonModificar.onclick = function() {
                guardarEdicion(id);
            };
        }

        function guardarEdicion(id) {
            var fila = document.getElementById('fila_' + id);

            if (!fila) {
                console.error('Error: No se encontró la fila con el ID ' + 'fila_' + id);
                return;
            }

            // Obtener los nuevos valores desde los campos de entrada
            var idNuevo = id;
            var nombreNuevo = obtenerValor(fila, 2); // Índice ajustado para el nombre
            var ipNuevo = obtenerValor(fila, 3); // Índice ajustado para la IP
            var tiposNuevo = obtenerValor(fila, 4, 'select'); // Índice ajustado para los tipos
            var ubicacionNuevo = obtenerValor(fila, 5); // Índice ajustado para la ubicación
            var soNuevo = obtenerValor(fila, 6); // Índice ajustado para el SO
            var serviciosNuevo = obtenerValor(fila, 7, 'select'); // Índice ajustado para los servicios
            var caracteristicasNuevo = obtenerValor(fila, 8); // Índice ajustado para las características
            var tipoPlataformaNuevo = obtenerValor(fila, 9, 'select'); // Índice ajustado para la plataforma
            var observacionesNuevo = obtenerValor(fila, 10); // Índice ajustado para las observaciones
            var dependenciasNuevo = obtenerValor(fila, 11); // Índice ajustado para las dependencias
            var conexionesNuevo = obtenerValor(fila, 12); // Índice ajustado para las conexiones
            var tipoRedNuevo = obtenerValor(fila, 13); // Índice ajustado para el tipo de red
            var estatusNuevo = obtenerValor(fila, 14, 'select'); // Índice ajustado para el estatus

            // Enviar los datos al servidor mediante AJAX
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    console.log(this.responseText);
                    location.reload();
                }
            };

            // Construir el objeto de datos para enviar al servidor
            var data = {
                id: idNuevo,
                nombre: nombreNuevo,
                ip: ipNuevo,
                tipos: tiposNuevo,
                ubicacion: ubicacionNuevo,
                so: soNuevo,
                servicios: serviciosNuevo,
                caracteristicas: caracteristicasNuevo,
                tipo_plataforma: tipoPlataformaNuevo,
                observaciones: observacionesNuevo,
                dependencias: dependenciasNuevo,
                conexiones: conexionesNuevo,
                tipo_red: tipoRedNuevo,
                estatus: estatusNuevo
            };

            // Configurar la solicitud AJAX
            xmlhttp.open("POST", "../conexiones/guardar_edicion.php", true);
            xmlhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

            // Convertir el objeto de datos a formato JSON y enviarlo
            xmlhttp.send(JSON.stringify(data));

            // Cambiar el botón "Guardar" a "Modificar" después de guardar
            var fila = document.getElementById('fila_' + id);
            var botonModificar = fila.querySelector('.modificar');
            botonModificar.innerHTML = 'Modificar';
            botonModificar.onclick = function() {
                editarFila(id);
            };

        }

        function obtenerValor(fila, indice, tipo = 'input') {
            var elemento = fila.querySelector("td:nth-child(" + indice + ") " + tipo);

            if (!elemento) {
                console.error('Error: No se encontró el elemento ' + tipo + ' en la celda correspondiente.');
                return '';
            }

            if (tipo === 'select' && elemento.options && elemento.selectedIndex !== -1) {
                return elemento.options[elemento.selectedIndex].value;
            } else if (tipo === 'input') {
                return elemento.value;
            }

            console.error('Error: No se pudo obtener el valor del elemento ' + tipo + ' en la celda correspondiente.');
            return '';
            
        }
    </script>
</body>
</html>


<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_administrador.php");

?>