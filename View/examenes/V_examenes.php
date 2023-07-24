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
        <link rel="preconnect" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ecovida/assets/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Krub:wght@400;700&display=swap" rel="stylesheet">
        <link rel="preload" href="http://localhost/ecovida/css/normalize.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/normalize.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/menu_lateral.css" type="text/css">
        <link rel="preload" href="http://localhost/ecovida/css/examenes.css" type="text/css" as="style">
        <link rel="stylesheet" href="http://localhost/ecovida/css/examenes.css" type="text/css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

        <title>Ecovida</title>
    </head>

    <body id="body">
        <header>
            <div class="icon__menu">
                <i class="fas fa-bars" id="btn_open"></i>
                <h1>EXAMENES</h1>
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

        <main>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <h4 class="text-center">Datos del Paciente</h4>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="post">
                    <div class="row">
                        <div class="col-lg-4">
                            <div>
                                <input type="hidden" id="idcliente" value="1" name="idcliente" required>
                                <label>Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese nombre del paciente" required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" name="apellidos" id="apellidos" class="form-control" disabled required>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" disabled required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="card">
        <div class="card-header text-center ">
                Datos del Estudio
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><i class="fas fa-user"></i> HOLA</label>
                            <p style="font-size:16px; text-transform: uppercase; color: purple;"><?php echo $_SESSION['usuario']; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Buscar estudio
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input id="producto" class="form-control" type="text" name="producto" placeholder="Ingresa la abreviatura o nombre">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <div class="table-responsive">
            <table class="table table-hover" id="tblDetalle">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Descuento</th>
                        <th>Total</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody id="detalle_venta">
                </tbody>
                <tfoot>
                    <tr class="font-weight-bold">
                        <td colspan=3>Total Pagar</td>
                        <td></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>
    <div class="col-md-6">
        <a href="#" class="btn" id="btn_generar"><i class="fas fa-save"></i> Generar Venta</a>
    </div>

</div>
        </main>

        <!-- Optional JavaScript; choose one of the two! -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
        <script src="https://kit.fontawesome.com/cbd3c2f268.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="../../js/menu_lateral.js"></script>
        <script src="../../js/examenes.js"></script>
        

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
} else {
    header("location:../../login.php");
}
?>