<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="stylesheet" href="CSS/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="img\logo-movilnet2.PNG"> <!-- Logo del Sistema -->
    <title> Registrar</title> <!-- Nombre de la Interfaz -->
</head>

<body>

    <!-- Header de la Interfaz -->
    <header>

        <!-- Logo del Header, SENIAT -->
        <div class="logo">
            <a href="">
                <img src="img\logo-movilnet2.PNG" alt="logo">
            </a>
        </div>

    <!-- Interfaz -->
    <div class="container">
        <div class="flex-container">
            <div class="row full">
                <div class="col-md-12">
                    <div class="form-container">
                        <div class="row">
                            <!--    Titulo del "Formulario"    -->
                            <div class="TituloModulo">
                                <h3 class="lead-text">Contribuyente</h3>
                            </div>

                            <!--    Formulario    -->
                            <form action="crudAgregarContribuyente.php" id="form" method="POST">
                                <div class="user-details">
                                    <!--   Campos del Formularios   -->
                                    <div class="input-box"> <!-- 1 -->
                                        <label class="detail" for="Nom">Nombre</label>
                                        <input type="text" placeholder="Nombre del Contribuyente" name="nombre_contribuyente" id="input-nombre" />
                                        <div class="error"></div>
                                    </div>
                                    <div class="input-box"> <!-- 2 -->
                                        <label class="detail" for="rif">RIF</label>
                                        <input type="text" placeholder="Número del Rif" name="rif" id="input-rif" />
                                        <div class="error"></div>
                                    </div>

                                    <div class="input-box"> <!-- 3 -->
                                        <label class="detail" for="licencia">Licencia</label>
                                        <input type="text" placeholder="Número de Licencia" name="licencia_contribuyente" id="input-licencia" />
                                        <div class="error"></div>
                                    </div>

                                    <div class="input-box select-container">
                                        <label class="detail" for="est">Estado</label>

                                        <div class="selectestado">
                                            <select class="select-estado" name="estado" id="input-estado">
                                                <option class="selec_title" disabled selected>Selecciona un Estado</option>
                                                <option value="LG">LG</option>
                                                <option value="DC">DC</option>
                                                <option value="Miranda" >Miranda</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="input-box"> <!-- 5 -->
                                        <label class="detail" for="mun">Municipio</label>
                                        <input type="text" placeholder="Municipio" name="municipio" id="input-municipio" />
                                        <div class="error"></div>
                                    </div>

                                    <div class="input-box"> <!-- 6 -->
                                        <label class="detail" for="Parroquia">Dirección Específica</label>
                                        <input type="text" placeholder="Plaza Venezuela, Avenida Quito, Caracas 1052, Distrito Capital" name="direccion_especifica" id="input-parroquia" />
                                        <div class="error"></div>
                                    </div>

                                </div>
                                <!--    Fin de los campos del formulario    -->

                                <!--    Boton para registrar el liquidador    -->

                                <div class="btn-contributent">
                                    <button class="btn-contribuyente" type="submit" id="viewAlerta" value="Registrar Contribuyente" name="enviar_registro">
                                        Registrar Contribuyente
                                    </button>
                                </div> <!--    Fin de los botones    -->

                            </form>

                            <!--    Fin del Formulario    -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de los Div del formularios -->
    </form>
    <!--    Fin de los pasos    -->

    <!--    Fin de la Interfaz    -->



    <!--    Footer de las interfaces   -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->


    <!-- Script desde los JS -->
    <script src="../recursos/JS/errorCamposContribuyentes.js"></script>
    <script src="../recursos/JS/alertRegistroContribuyentes.js"></script>
</body>

</html>