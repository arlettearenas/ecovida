<!--Validacion de Usuario y contraseña en la base de datos-->
<?php
include "controller_Login_select.php";

if ($_POST) {
    session_start();
    require('Model/Conexion.php');
    $u = $_POST['usuario'];
    $c = $_POST['clave'];
    $s = $_POST['sucursal'];

    if (empty($u) || empty($c) || empty($s)) {
        $m_error = 'Debe completar todos los campos.';
    } else {
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //hacemos la consulta en sql
        $query = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :u AND clave = :c AND sucursal = :s");
        $query->bindParam(":u", $u);
        $query->bindParam(":c", $c);
        $query->bindParam(":s", $s);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            $_SESSION['usuario'] = $usuario["usuario"];
            $m_exito = 'Bienvenido ' . $_SESSION['usuario'];
        } else {
            $m_error = 'Credenciales incorrectas.';
        }
    }
}

?>

<!--Se concatena el mensaje de la variable y se cierra corchetes de php -->
<script>
    <?php if (isset($m_exito)) : ?>
        setTimeout(function() {
            Swal.fire({
                position: 'top',
                icon: 'success',
                title: 'Usuario correcto',
                text: '<?= $m_exito ?>',
                footer: '',
            }).then(function() {
                window.location.href = "View/V_menuPrincipal.php";
            });
        }, 100);
    <?php endif; ?>

    <?php if (isset($m_error)) : ?>
        setTimeout(function() {
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: '<?= $m_error ?>',
                showConfirmButton: false,
                timer: 2500,

            });
        }, 100);
    <?php endif; ?>
</script>
<!--Fin del scrip-->