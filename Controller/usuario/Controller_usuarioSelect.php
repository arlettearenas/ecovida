<?php
require('../../Model/Conexion.php');

$sucursalesQuery = $conexion->query("SELECT sucursal FROM sucursal ORDER BY `sucursal` DESC ");
    $sucursales = $sucursalesQuery->fetchAll(PDO::FETCH_COLUMN);

$genero = $conexion->query("SELECT genero FROM genero ORDER BY `genero` DESC");
$generoTotal = $genero -> fetchAll(PDO::FETCH_COLUMN);

$cargo = $conexion -> query("SELECT descripcion FROM cargo ORDER BY `descripcion` DESC");
$cargoTotal = $cargo -> fetchAll(PDO::FETCH_COLUMN);

?>