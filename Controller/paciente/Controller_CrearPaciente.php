<?php
include('../../Model/Conexion.php');
include("funciones.php");

//se verifica si el valor de la variable $_POST["operacion"] es "Crear"
if ($_POST["operacion"] == "Crear") {


    //se prepara una consulta SQL para insertar los datos del nuevo usuario en la tabla "usuarios" utilizando los valores proporcionados en el formulario.
    // se utilizan para indicar los valores que serán reemplazados en la consulta.
    $stmt = $conexion->prepare("INSERT INTO pacientes(nombre , apellidos, fecha_nacimiento, empresa, telefono, email, localidad) VALUES(:nombre, :apellidos,:fecha_nacimiento, :empresa, :telefono, :email, :localidad)");

    //se pasan los valores correspondientes utilizando un array asociativo
    $resultado = $stmt->execute(
        array(
            ':nombre' => $_POST["nombre"],
            ':apellidos' => $_POST["apellidos"],
            ':fecha_nacimiento' => $_POST["fecha_nacimiento"],
            ':telefono' => $_POST["telefono"],
            ':email' => $_POST["email"],
            ':empresa' => $_POST["empresa"],
            ':localidad' => $_POST["localidad"],
        )

    );

    //se verifica si el resultado no está vacío y se muestra el mensaje "Registro creado" en caso afirmativo.
    if (!empty($resultado)) {
        echo "Registro creado con exito";
    }
}

//CODIGO DE EDITAR ACTUALIZADO Y CON LA MEJORA DE QUERER ACTUALIZAR CON IMAGEN INDEPENDIENTEMENTE DEL USUARIO
//se verifica si el valor de la variable $_POST["operacion"] es "Editar"
if ($_POST["operacion"] == "Editar") {

    //se prepara una consulta SQL para actualizar los datos del usuario en la tabla "usuarios". Se utiliza el método prepare() en la conexión $conexion
    $stmt = $conexion->prepare("UPDATE pacientes SET nombre=:nombre, apellidos=:apellidos,fecha_nacimiento=:fecha_nacimiento, empresa=:empresa, telefono=:telefono, email=:email, localidad=:localidad WHERE id=:id");

    //se pasan los valores correspondientes utilizando un array asociativo
    $resultado = $stmt->execute(
        array(
            ':nombre' => $_POST["nombre"],
            ':apellidos' => $_POST["apellidos"],
            ':fecha_nacimiento' => $_POST["fecha_nacimiento"],
            ':telefono' => $_POST["telefono"],
            ':email' => $_POST["email"],
            ':empresa' => $_POST["empresa"],
            ':localidad' => $_POST["localidad"],
            ':id' => $_POST["id_usuario"]
        )
    );

    //Si el resultado no está vacío, se muestra el mensaje "Registro actualizado".
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}

?>

