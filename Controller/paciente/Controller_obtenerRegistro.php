<?php
include('../../Model/Conexion.php');
include ("funciones.php");

if (isset($_POST["id_usuario"])) { //Se verifica si se a enviado la variable "id_usuario" por metodo POST.
    $salida = array(); //Se crea un arreglo vacio para almacenar los datos del usuario.

    //Se prepara una consulta para seleccionar un registro de la tabla usuarios con el valor del id.
    $stmt = $conexion ->prepare("SELECT * FROM pacientes WHERE id = '".$_POST["id_usuario"]."' LIMIT 1");
    $stmt ->execute(); //se ejecuta la consulta
    $resultado = $stmt -> fetchAll(); //se obtienen todos los valores de la consulta  y se almacenan en la variable $resultado.
    foreach($resultado as $fila){
        //se itera sobre cada fila obtenida
        $salida["nombre"] = $fila["nombre"];
        $salida["apellidos"] = $fila["apellidos"];
        $salida["fecha_nacimiento"] = $fila["fecha_nacimiento"];
        $salida["telefono"] = $fila["telefono"];
        $salida["email"] = $fila["email"];
        $salida["empresa"] = $fila["empresa"];
        $salida["localidad"] = $fila["localidad"];

    }

    // Los datos del usuario se codifican en formato JSON utilizando json_encode() y se muestran en la salida mediante echo.
    echo json_encode($salida); 
}
?>
