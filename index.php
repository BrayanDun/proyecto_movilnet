
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="CSS\style_inicio.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="img\logo-movilnet2.PNG" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">Movilnet</span>
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
                        <a href="consulta_servidores.php">
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
                        <a href="#">
                        <i class='bx bxs-folder-minus icon' ></i>
                        <span class="text nav-text">Desincorporar</span>
                        </a>
                    </li>

                    <li class="bottom-content">
                        <li>
                            <a href="iniciar_sesion.html">
                            <i class='bx bx-log-out icon'></i>
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
    <button class="text" a href="./index.php">Regresar  >
    <script src="script_inicio.js"></script>

</body>
</html>
