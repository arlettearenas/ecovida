<?php

//obtener el número total de registros en la tabla "usuarios" de la base de datos.
function obtener_todos_registros(){
    include('../../Model/Conexion.php');
    $stmt = $conexion -> prepare("SELECT * from usuarios");
    $stmt ->execute();
    //se almacena el resultado en la variable $resultado
    $resultado = $stmt -> fetchAll();
    //se utiliza la función rowCount() para contar el número de filas devueltas por la consulta y se devuelve este valor.
    return $stmt -> rowCount(); 
}
?>