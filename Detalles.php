<?php ob_start(); ?>

<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del servidor</title>
  <link href='https://fonts.googleapis.com/css?family=Open Sans:400,300,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="CSS\style_detalles.css">
</head>

<a href="javascript:history.back()" style="text-decoration: none;">
        <button style="   
          margin-right: -99px;
          width: 13%;
          height: 40px;
          border: none;
          border-radius: 17px;
          color: #ffffff;
          background: #FF585F;
          cursor: pointer;
          ">
        <i class="fas fa-arrow-left"></i> Atrás
        </button>
    </a>

<body>
  <div class="container">
    <div class="frame">

    
    </div>
  </div>

</body>

</html>

<?php $contents = ob_get_clean(); ?>

<?php 

require("./index_administrador.php");

?>