<?php
include('../../Model/Conexion.php');
include("funciones.php");

//se verifica si el valor de la variable $_POST["operacion"] es "Crear"
if ($_POST["operacion"] == "Crear") {


    //se prepara una consulta SQL para insertar los datos del nuevo usuario en la tabla "usuarios" utilizando los valores proporcionados en el formulario.
    // se utilizan para indicar los valores que serán reemplazados en la consulta.
    $stmt = $conexion->prepare("INSERT INTO estudio(nombre , abreviatura, toma, frecuencia, proceso, muestra ) VALUES(:nombre, :abreviatura,:toma, :frecuencia, :proceso, :muestra)");

    //se pasan los valores correspondientes utilizando un array asociativo
    $resultado = $stmt->execute(
        array(
            ':nombre' => $_POST["nombre"],
            ':abreviatura' => $_POST["abreviatura"],
            ':toma' => $_POST["toma"],
            ':frecuencia' => $_POST["frecuencia"],
            ':proceso' => $_POST["proceso"],
            ':muestra' => $_POST["muestra"],
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
    $stmt = $conexion->prepare("UPDATE estudio SET nombre=:nombre, abreviatura=:abreviatura,toma=:toma, frecuencia=:frecuencia, proceso=:proceso, muestra=:muestra WHERE id=:id");

    //se pasan los valores correspondientes utilizando un array asociativo
    $resultado = $stmt->execute(
        array(
            ':nombre' => $_POST["nombre"],
            ':abreviatura' => $_POST["abreviatura"],
            ':toma' => $_POST["toma"],
            ':frecuencia' => $_POST["frecuencia"],
            ':proceso' => $_POST["proceso"],
            ':muestra' => $_POST["muestra"],
            ':id' => $_POST["id_estudio"]
        )
    );

    //Si el resultado no está vacío, se muestra el mensaje "Registro actualizado".
    if (!empty($resultado)) {
        echo 'Registro actualizado';
    }
}

?>

