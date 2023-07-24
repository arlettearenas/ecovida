<?php
require('Model/Conexion.php');

$sucursalesQuery = $conexion->query("SELECT Sucursal FROM sucursal ORDER BY `sucursal` DESC ");
    $sucursales = $sucursalesQuery->fetchAll(PDO::FETCH_COLUMN);
?>