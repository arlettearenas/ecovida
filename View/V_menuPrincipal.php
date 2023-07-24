<?php
require "../Controller/principal/Controller_resumen.php";
session_start();
if (isset($_SESSION['usuario'])) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/cbd3c2f268.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link rel="preload" href="http://localhost/ecovida/css/normalize.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/normalize.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/principal.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/principal.css" type="text/css">
        <title>Menu Principal</title>
    </head>

    <body id="body">
        <header>
            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
                <h1>PRINCIPAL</h1>
            </div>
        </header>

        <div class="menu__side" id="menu_side">

            <div class="name__page">
                <img src="../img/ecovida_pequeño.png">
                <h3>Ecovida</h3>
            </div>

            <div class="name__page">
                <img src="../img/avatar.png">
                <h3><?php echo "<p>Bienvenido " . $_SESSION['usuario'] . "</p>" ?></h3>
            </div>

            <div class="options__menu">

                <a href="../View/V_menuPrincipal.php" class="selected">
                    <div class="option">
                        <i class="fas fa-home" title="Principal"></i>
                        <h4>Principal</h4>
                    </div>
                </a>

                <a href="../View/calendario/V_calendario">
                    <div class="option">
                        <i class="fa-solid fa-calendar" title="Calendario"></i>
                        <h4>Calendario</h4>
                    </div>
                </a>

                <a href="../View/pacientes/V_pacientes.php">
                    <div class="option">
                        <i class="fa-solid fa-notes-medical" title="Pacientes"></i>
                        <h4>Pacientes</h4>
                    </div>
                </a>

                <a href="../View/medicos/V_medicos.php">
                    <div class="option">
                        <i class="fa-solid fa-user-doctor" title="Médico"></i>
                        <h4>Médico</h4>
                    </div>
                </a>

                <a href="../View/estudios/V_estudios.php">
                    <div class="option">
                        <i class="fa-solid fa-eye-dropper" title="Estudios"></i>
                        <h4>Estudios</h4>
                    </div>
                </a>

                <a href="../View/resultado/V_resultado.php">
                    <div class="option">
                        <i class="far fa-address-card" title="Resultados"></i>
                        <h4>Resultados</h4>
                    </div>
                </a>

                <a href="../View/examenes/V_examenes.php">
                    <div class="option">
                        <i class="fa-solid fa-microscope" title="Examenes"></i>
                        <h4>Examenes</h4>
                    </div>
                </a>

                <a href="../View/usuarios/V_Usuarios.php">
                    <div class="option">
                        <i class="fa-solid fa-user" title="Usuario"></i>
                        <h4>Usuarios</h4>
                    </div>
                </a>

                <a href="../View/historial/V_historial.php">
                    <div class="option">
                        <i class="fa-solid fa-clock-rotate-left" title="Historial"></i>
                        <h4>Historial</h4>
                    </div>
                </a>

                <a href="../salir.php" onclick="salir(event)">
                    <div class="option">
                        <i class="fa-solid fa-door-closed" title="Cerrar sesión"></i>
                        <h4>Cerrar sesión</h4>
                    </div>
                </a>

            </div>
        </div><!--Fin del menu lateral-->

        <main>
            <div class="resumen">
                <div class="cartaR">
                    <h2>Resumen</h2>
                    <div class="contenedor">
                        <div class="usuarios">
                            <p class="total"><?php echo $totalUsuarios ?> </p>
                            <h3>Usuarios</h3>
                        </div>
                        <div class="pacientes">
                            <p class="total"><?php echo $totalPacientes ?></p>
                            <h3>Pacientes</h3>
                        </div>
                        <div class="doctores">
                            <p class="total">3</p>
                            <h3>Doctores</h3>
                        </div>
                    </div>
                </div>
            </div><!--Resumen-->
            <div class="cartas">
            <section class="carta">
                <h2>Pacientes</h2>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <div class="info">
                    <a href="../View/pacientes/V_pacientes.php">Más Informacion</a>
                </div>
            </section>
            <section class="carta">
                <h2>Doctores</h2>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p> 
                <div class="info">
                    <a href="#">Más Informacion</a>
                </div>
            </section>
            <section class="carta">
                <h2>Usuarios</h2>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <p>Oskar</p>
                <div class="info">
                    <a href="../View/V_Usuarios.php">Más Informacion</a>
                </div>
            </section>
            </div>
        </main>

        <!--Scripts JS-->
        <script src="../js/menu_lateral.js"></script>
        <script src="../js/login.js"></script>
        <script src="../js/principal.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:../login.php");
}
?>