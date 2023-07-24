<?php
require('../Model/Conexion.php');

//consulta para los usuarios
$query = $conexion->prepare("SELECT count(*) totalUsuarios FROM usuarios");
$query->execute();
$usuarios = $query->fetch(PDO::FETCH_ASSOC);

$totalUsuarios = $usuarios['totalUsuarios'];

//consulta para los Pacientes
$query = $conexion->prepare("SELECT count(*) totalPacientes FROM pacientes");
$query->execute();
$pacientes = $query->fetch(PDO::FETCH_ASSOC);
$totalPacientes = $pacientes['totalPacientes'];

//consulta para los doctores
// $query = $conexion->prepare("SELECT count(*) totalDoctores FROM Doctores");
// $query->execute();
// $doctores = $query->fetch(PDO::FETCH_ASSOC);
// $totalDoctores = $doctores['totalDoctores'];
?>