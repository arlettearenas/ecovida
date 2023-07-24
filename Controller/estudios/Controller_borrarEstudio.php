<?php

include('../../Model/Conexion.php');
include ("funciones.php");

if (isset($_POST["id_estudio"])) { // Verifica si se ha enviado la variable "id_estudio"

// Se prepara una consulta SQL para eliminar un registro de la tabla "usuarios" con el valor "id" igual a :id
$stmt = $conexion -> prepare("DELETE FROM estudio WHERE id=:id");

// Se ejecuta la consulta SQL, pasando el valor de "id_usuario" como valor para :id en la consulta preparada
// El resultado de la ejecución se almacena en la variable $resultado
$resultado = $stmt ->execute(
    array(
        ':id' => $_POST["id_estudio"]
        )
    );

    // Si el resultado no está vacío (es decir, la eliminación se realizó correctamente),
    // se muestra el mensaje "Registro eliminado"
    if (!empty($resultado)) {
        echo 'Registro eliminado';
    }
}
?>