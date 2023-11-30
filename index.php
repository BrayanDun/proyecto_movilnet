<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="style_inicio.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo movilnet.png" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">Movilnet</span>
                    <span class="profession">Usuario</span>
                </div>
            </div>


            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="./index.php">
                        <i class='bx bx-home icon' ></i>
                        <span class="text nav-text">Inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="registro.php">
                        <i class='bx bx-message-square-add icon'></i>
                        <span class="text nav-text">Registrar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="conexiones/consulta_servidores.php">
                        <i class='bx bx-search icon'></i>
                        <span class="text nav-text">Consultar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="modificarprueba.html">
                        <i class='bx bx-edit icon'></i>
                        <span class="text nav-text">Modificar</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                        <i class='bx bxs-folder-minus icon' ></i>
                        <span class="text nav-text">Desincorporar</span>
                        </a>
                    </li>

                    <li class="bottom-content">
                        <li>
                            <a href="#">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Salir</span>
                            </a>
                        </li>
                    </li>

                </ul>
            </div>

                <li class="mode">
                    <div class="moon-sun">
                        <i class="bx bx-moon icon moon"></i>
                        <i class="bx bx-sun icon sun"></i>

                    </div>
                        <span class="mode-text text">Modo Oscuro</span>
                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                </li>

            </div>
        </div>
    </nav>

    <section class="home">
        <div class="text">Inicio</div>
        <?php 
        echo isset($contents) ?$contents:"variable contents no encontrada"; 
        ?>
    </section>

    <script src="script_inicio.js"></script>

</body>
</html>