<?php
//declaracion de variables
$servidor = 'localhost:3307';
$db = 'ecovidaa';
$user = 'root';
$pass ='';

//hacemos la conexion con la base de datos
try{
    $conexion = new PDO('mysql:host='.$servidor.';dbname='.$db, $user,$pass);
}catch(PDOException $e){
    echo "Error al conectar con la base de datos";
    exit;
}

return $conexion;

?>