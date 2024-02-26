<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["p00"])) {
    // Redirige a la página de inicio de sesión
    header("Location: ../iniciar_sesion.html");
    exit(); // Asegúrate de detener el script después de redirigir
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../CSS/style_inicio.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="../img/image.png" type="image/png">
    <style>
        .pagina-inicio {
            background-image: url('');
            background-repeat: no-repeat;
            background-position: 50px;
            background-size: 1550px;
        
        }

        @media (max-width: 768px) {
            body {
                background-size: 100% 100%;
            }
        }
    </style>

</head>
<body class="pagina-inicio">
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../img/images.png" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name"> Bienvenido</span>
                    <h5>Usuario(a)</h5>
                </div>
            </div>


            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="home-usuario.php">
                        <img src="../iconos/home-regular-24.png"/>
                        <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    
                    <li class="nav-link">
                        <a href="consulta_para_usuarios.php">
                        <img src="../iconos/search-alt-2-regular-24.png"/>
                        <span class="text nav-text">Consultar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="../conexiones/cerrar_sesion.php">
                        <img src="../iconos/exit-regular-24.png"/>
                        <span class="text nav-text">Salir</span>
                        </a>
                    </li>

                    </li>

                </ul>
            </div>


            </div>
        </div>
    </nav>

    <section class="home">
        <?php 
        echo isset($contents) ?$contents:""; 
        ?>
    </section>
    <script src="../js/script_inicio.js"></script>
</body>
</html>
