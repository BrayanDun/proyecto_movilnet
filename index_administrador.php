<?php
// Inicia la sesión
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION["p00"])) {
    // Redirige a la página de inicio de sesión
    header("Location: iniciar_sesion_administrador.html");
    exit(); // Asegúrate de detener el script después de redirigir
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="CSS\style_inicio.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .pagina-inicio {
            background-image: url('img/Movilnet-logo_0.png');
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
                    <img src="img\logo-movilnet2.PNG" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name"> Movilnet</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="home.php">
                        <i class='bx bx-home icon' ></i>
                        <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    
                    <li class="nav-link">
                        <a href="consulta_funcion.php">
                        <i class='bx bx-search icon'></i>
                        <span class="text nav-text">Consultar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="registro.php">
                        <i class='bx bx-message-square-add icon'></i>
                        <span class="text nav-text">Registrar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="modificar.php">
                        <i class='bx bx-edit icon'></i>
                        <span class="text nav-text">Modificar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="desincorporar.php">
                        <i class='bx bxs-folder-minus icon' ></i>
                        <span class="text nav-text">Desincorporar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="cerrar_sesion_administrador.php">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Salir</span>
                        </a>
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
    <script src="script_inicio.js"></script>
</body>
</html>
