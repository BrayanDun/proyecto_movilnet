<?php ob_start(); ?>
    <?php 
    $host = "localhost";
    $dbname = "Movilnet";
    $username = "postgres";
    $password = "postgres";

    // Crea una conexión a la base de datos
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch the results of the PDO query into an array
    $SQL_READ = "SELECT tipos, COUNT(*) as count FROM servidores GROUP BY tipos";
    $stmt = $conn->prepare($SQL_READ);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <html>
    <head>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Task', 'Hours per Day'],
    <?php
        foreach ($results as $row) {
            echo "['".$row['tipos']."', ".$row['count']."],";
        }
    ?>
            ]);

            var options = {
            title: 'Grafica de tipos',
            is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
        </script>
    </head>
    <body>
        <div id="piechart_3d" 
        style="
        position: relative;
        left: 100px;
        top: 50px;
        width: 1100px;
        height: 630px;"></div>

    <div>
        <a href="javascript:history.back()" style="text-decoration: none;">
            <button style="
            padding: 20px;
            padding-right: 20px;
            text-align: center;
            background-color: #FF585F;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            position: absolute;
            margin-left: 60px;
            border-color: white;"
            <i class="fas fa-arrow-left"></i>Atrás</button></a>
    </div>
    </body>
    </html>

    <?php $contents = ob_get_clean(); ?>

    <?php 

    require("./index_usuario.php");

    ?>