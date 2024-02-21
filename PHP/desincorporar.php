<?php ob_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Desincorporados</title>
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
    margin-top: 100px;
    margin-left: 350px;
}

label {
    position: absolute;
    margin: -25px;
    margin-left: 90px;
    font-size: xx-large;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #FF585F;
}


button:hover {
    background-color: darkred;
}


table {
    position: relative;
    left: 10%;
    top: 10%;
    transform: translate(-11.5%, -5%);
    background-color: rgb(255 255 255);
    margin-top: 50px;
    width: 96%;
    border-collapse: 35px;
    border-radius: 8px;
}

th, td {
    border: 1px solid #FF585F;
    border-radius: 6px;
    padding: 7px;
    text-align: left;
    font-size: 0.8rem;
}
th {
    background-color: #FF585F;
    color: white;
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


.papelera {
    background-color: #FF585F;
    padding: 8px 15px;
    position: absolute;
    margin-left: -14px;
    margin-top: 110PX;
    border-radius: 9px;
    color: white;
    cursor: pointer;
    border-color: whitesmoke;
}

h1 {
    margin-top: 43px;
    position: center;
    margin-LEFT: 399px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    color: #FF585F;
}

</style>

    <form action="consulta_desincorporados.php">
    <button class='papelera'>Desincorporados</button>
    </form>

    
<body>
    <div class="container">
    </div>

    <table>
        <thead>
            <tr>
                <th> ID </th>
                <th> Nombre </th>
                <th> IP </th>
                <th> Tipos </th>
                <th> Ubicación </th>
                <th> Servicios </th>
                <th> Tipo de plataforma </th>
                <th> Dependencias </th>
                <th> Conexiones </th>
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
                echo "<td>{$fila['nombre']}</td>";
                echo "<td>{$fila['ip']}</td>";
                echo "<td>{$fila['tipos']}</td>";
                echo "<td>{$fila['ubicacion']}</td>";
                echo "<td>{$fila['servicios']}</td>";
                echo "<td>{$fila['tipo_plataforma']}</td>";
                echo "<td>{$fila['dependencias']}</td>";
                echo "<td>{$fila['conexiones']}</td>";
                echo "<td>{$fila['estatus']}</td>";
                echo "<td>{$fila['creado_en']}</td>";
                echo "<td>{$fila['modificado_en']}</td>";
                echo "<td><button class='desincorp' onclick='desincorporarServidor({$fila['id']})'>Desincorporar</button>
                </td>";
                echo "</tr>";
            }
            $db = null;
            ?>
        </tbody>
    </table>
    <script>
    function desincorporarServidor(id) {
        // Realizar la solicitud al servidor para desincorporar el servidor
        fetch(`../conexiones/desincorporar_servidor.php?id=${id}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error de red: ${response.status}`);
                }
                return response.text();
            })
            .then(data => {
                // Manejar la respuesta del servidor
                console.log(data);
                location.reload();  // Recargar la página después de la desincorporación
            })
            .catch(error => {
                console.error('Error al desincorporar el servidor:', error);
            });
    }
</script>

</body>
</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_administrador.php");

?>
