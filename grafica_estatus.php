<?php ob_start(); ?>
<?php 
$host = "localhost";
$dbname = "Movilnet";
$username = "postgres";
$password = "postgres";

// Crea una conexión a la base de datos
$conn = new PDO("pgsql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
////aqui esta el error//////
<?php
      $SQL_READ = "SELECT estatus FROM servidores";
      $stmt = $conn->prepare($SQL_READ);
      while ($stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "['".$stmt[':estatus']."']";
      }
?>
////aqui esta el error////// no se esta mostrando la info de la bd
        ]);

        var options = {
          title: 'Grafica de estatus',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
  </body>
</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_usuario.php");

?>