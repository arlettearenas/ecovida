<?php
session_start();
if (isset($_SESSION['usuario'])) {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Bootstrap CSS -->
        <link rel="preconnect" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preload" href="http://localhost/ecovida/css/normalize.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/normalize.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <title>Ecovida</title>
    </head>

    <body id="body">
        <header>
            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
                <h1>PACIENTES</h1>
            </div>
        </header>

        <div class="menu__side" id="menu_side">

        <div class="name__page">
                <img src="../../img/ecovida_pequeño.png">
                <h3>Ecovida</h3>
            </div>

            <div class="name__page">
                <img src="../../img/avatar.png">
                <h3><?php echo "<p>Bienvenido " . $_SESSION['usuario'] . "</p>" ?></h3>
            </div>

            <div class="options__menu">

                <a href="../V_menuPrincipal.php" class="selected">
                    <div class="option">
                        <i class="fas fa-home" title="Principal"></i>
                        <h4>Principal</h4>
                    </div>
                </a>

                <a href="../calendario/V_calendario.php">
                    <div class="option">
                        <i class="fa-solid fa-calendar" title="Calendario"></i>
                        <h4>Calendario</h4>
                    </div>
                </a>

                <a href="../pacientes/V_pacientes.php">
                    <div class="option">
                        <i class="fa-solid fa-notes-medical" title="Pacientes"></i>
                        <h4>Pacientes</h4>
                    </div>
                </a>

                <a href="../medicos/V_medicos.php">
                    <div class="option">
                        <i class="fa-solid fa-user-doctor" title="Médico"></i>
                        <h4>Médico</h4>
                    </div>
                </a>

                <a href="../estudios/V_estudios.php">
                    <div class="option">
                        <i class="fa-solid fa-eye-dropper" title="Estudios"></i>
                        <h4>Estudios</h4>
                    </div>
                </a>

                <a href="../resultado/V_resultado.php">
                    <div class="option">
                        <i class="far fa-address-card" title="Resultados"></i>
                        <h4>Resultados</h4>
                    </div>
                </a>

                <a href="../examenes/V_examenes.php">
                    <div class="option">
                        <i class="fa-solid fa-microscope" title="Examenes"></i>
                        <h4>Examenes</h4>
                    </div>
                </a>

                <a href="../usuarios/V_Usuarios.php">
                    <div class="option">
                        <i class="fa-solid fa-user" title="Usuario"></i>
                        <h4>Usuarios</h4>
                    </div>
                </a>

                <a href="../historial/V_historial.php">
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

        <div class="container fondo">
            <h1 class="text-center">Pacientes</h1>
            <div class="row">
                <div class="col-2 offset-10">
                    <div class="text-center">
                        <!-- Boton para modal -->
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
                            <i class="bi bi-plus-circle-fill"></i> Crear
                        </button>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="table-responsive">
                <table id="datos_usuario" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Télefono</th>
                            <th>Email</th>
                            <th>Empresa</th>
                            <th>Localidad</th>
                            <th>Fecha Creación</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <!--Ventana para el modal-->
        <!--Tiene un atributo id con el valor "modalUsuario" que se utiliza para identificarla en el código JavaScript-->
        <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog"> <!--definen la estructura interna de la ventana modal-->
                <div class="modal-content"> <!--definen la estructura interna de la ventana modal-->
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="V_pacientes.php" id="formulario" method="POST">
                        <div class="moda-content">
                            <div class="modal-body"> <!--Dentro de modal-body se definen etiquetas <label> y campos de entrada <input>-->
                                <label for="nombre">Ingrese el nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" autocomplete="off">
                                <br>

                                <label for="apellidos">Ingrese los apellidos</label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" autocomplete="off">
                                <br>

                                <label for="fecha_nacimiento">Ingrese la fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" autocomplete="off">
                                <br>

                                <label for="telefono">Ingrese el télefono</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" autocomplete="off">
                                <br>

                                <label for="email">Ingrese el correo</label>
                                <input type="email" name="email" id="email" class="form-control" autocomplete="off">
                                <br>

                                <label for="empresa">Seleccione la empresa</label>
                                <select name="empresa" id="empresa" class="form-control">
                                    <option value="DIF">DIF</option>
                                    <option value="Publico">Publico en general</option>
                                </select>

                                <label for="localidad">Seleccione la localidad</label>
                                <select name="localidad" id="localidad" class="form-control">
                                    <option value="Huamantla">Huamantla</option>
                                    <option value="Cuapiaxtla">Cuapiaxtla</option>
                                    <option value="Grajales">Grajales</option>
                                </select>
                            </div>

                            <div class="modal-footer"> <!--se incluyen campos ocultos-->
                                <input type="hidden" name="id_usuario" id="id_usuario">
                                <input type="hidden" name="operacion" id="operacion">
                                <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://kit.fontawesome.com/cbd3c2f268.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../../js/menu_lateral.js"></script>
        <script src="../../js/pacientes.js"></script>
        

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
} else {
    header("location:../../login.php");
}
?>