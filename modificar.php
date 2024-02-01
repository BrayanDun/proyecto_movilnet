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
</head>
<style>
body {
    display: flex;
    background-color: rgba(180, 173, 168, 0.466);
    align-items: center;
    justify-content: center;
}

.container {
    position: relative;
    margin-top: 130px;
    margin-left: 350px;
}

label {
    position: absolute;
    margin-top: -100px;
    margin-left: 90px;
    font-size: xx-large;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #FF585F;
}

input {
    width: 150px;
    padding: 15px;
    padding-right: 35px;
    font-size: 1rem;
    border-radius: 10px;
    border: 0;
    outline: none;
    font-family: 'Poppins', sans-serif;
}

.boton_busq {
    background-color: #FF585F;
    padding: 17px 15px;
    position: relative;
    margin: auto;
    border-radius: 15px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

button:hover {
    background-color: darkred;
}

.modif_desin {
    margin-top: -20px;
}

.modificar {
    background-color: #FF585F;
    padding: 6px 6px;
    position: relative;
    margin-right: 10px;
    border-radius: 9px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

.guardar {
    background-color: #FF585F;
    padding: 6px 6px;
    position: relative;
    margin-right: 10px;
    border-radius: 9px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

.desincorp {
    background-color: #FF585F;
    padding: 6px 6px;
    position: relative;
    margin-right: 10px;
    border-radius: 9px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

table {
    position: absolute;
    background-color: rgb(252, 248, 248);
    margin-top: 10px;
    width: 100%;  /* Ajuste el ancho de la tabla al 100% para que ocupe todo el contenedor */
    border-collapse: collapse;  /* Añadido para colapsar los bordes de las celdas */
}

th, td {
    border: 2px solid #FF585F;
    padding: 8px;
    text-align: left;
    font-size: 0.8rem;
}

th {
    background-color: #FF585F;
    color: white;
}

</style>

<body>
    <div class="container">
        <label> MODIFICAR </label>
    </div>

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
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['ip']}</td>";
                echo "<td>{$fila['tipos']}</td>";
                echo "<td>{$fila['ubicacion']}</td>";
                echo "<td>{$fila['so']}</td>";
                echo "<td>{$fila['servicios']}</td>";
                echo "<td>{$fila['caracteristicas']}</td>";
                echo "<td>{$fila['tipo_plataforma']}</td>";
                echo "<td>{$fila['observaciones']}</td>";
                echo "<td>{$fila['dependencias']}</td>";
                echo "<td>{$fila['conexiones']}</td>";
                echo "<td>{$fila['tipo_red']}</td>";
                echo "<td>{$fila['estatus']}</td>";
                echo "<td><button class='modificar' onclick='editarFila({$fila['id']})'>Modificar</button></td>";
                echo "</tr>";
            }
            $db = null;
            ?>
        </tbody>
    </table>

    <script>
    function editarFila(id) {
        var fila = document.getElementById('fila_' + id);
        fila.innerHTML = "<td><input type='text' value='" + fila.cells[0].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[1].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[2].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[3].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[4].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[5].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[6].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[7].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[8].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[9].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[10].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[11].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[12].innerText + "'></td>" +
                         "<td><input type='text' value='" + fila.cells[13].innerText + "'></td>" +
                         "<td><button class='guardar' onclick='guardarEdicion(" + id + ")'>Guardar</button></td>";
    }

    function guardarEdicion(id) {
        // Obtener los nuevos valores desde los campos de entrada
        var idNuevo = document.querySelector("#fila_" + id + " td:nth-child(1) input").value;
        var nombreNuevo = document.querySelector("#fila_" + id + " td:nth-child(2) input").value;
        var ipNuevo = document.querySelector("#fila_" + id + " td:nth-child(3) input").value;
        var tiposNuevo = document.querySelector("#fila_" + id + " td:nth-child(4) input").value;
        var ubicacionNuevo = document.querySelector("#fila_" + id + " td:nth-child(5) input").value;
        var soNuevo = document.querySelector("#fila_" + id + " td:nth-child(6) input").value;
        var serviciosNuevo = document.querySelector("#fila_" + id + " td:nth-child(7) input").value;
        var caracteristicasNuevo = document.querySelector("#fila_" + id + " td:nth-child(8) input").value;
        var tipoPlataformaNuevo = document.querySelector("#fila_" + id + " td:nth-child(9) input").value;
        var observacionesNuevo = document.querySelector("#fila_" + id + " td:nth-child(10) input").value;
        var dependenciasNuevo = document.querySelector("#fila_" + id + " td:nth-child(11) input").value;
        var conexionesNuevo = document.querySelector("#fila_" + id + " td:nth-child(12) input").value;
        var tipoRedNuevo = document.querySelector("#fila_" + id + " td:nth-child(13) input").value;
        var estatusNuevo = document.querySelector("#fila_" + id + " td:nth-child(14) input").value;

        // Enviar los datos al servidor mediante AJAX
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Manejar la respuesta del servidor si es necesario
                console.log(this.responseText);
                location.reload();  // Recargar la página después de la actualización
            }
        };

        // Construir la cadena de consulta con todos los campos
        var queryString = "id=" + idNuevo +
                          "&nombre=" + nombreNuevo +
                          "&ip=" + ipNuevo +
                          "&tipos=" + tiposNuevo +
                          "&ubicacion=" + ubicacionNuevo +
                          "&so=" + soNuevo +
                          "&servicios=" + serviciosNuevo +
                          "&caracteristicas=" + caracteristicasNuevo +
                          "&tipo_plataforma=" + tipoPlataformaNuevo +
                          "&observaciones=" + observacionesNuevo +
                          "&dependencias=" + dependenciasNuevo +
                          "&conexiones=" + conexionesNuevo +
                          "&tipo_red=" + tipoRedNuevo +
                          "&estatus=" + estatusNuevo;

        // Agregar la cadena de consulta a la URL
        xmlhttp.open("GET", "guardar_edicion.php?" + queryString, true);
        xmlhttp.send();
    }
</script>
</body>
</html>


<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_administrador.php");

?>