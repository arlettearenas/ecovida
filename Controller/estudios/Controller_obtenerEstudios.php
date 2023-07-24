<?php
include('../../Model/Conexion.php');
include("funciones.php");

$query = "";
$salida = array();
$query = "SELECT * FROM estudio "; //Se asigna a $query una consulta SQL que selecciona todos los datos de la tabla "usuarios".

if (isset($_POST["search"]["value"])) {
    // Se verifica si se ha enviado una cadena de búsqueda desde una solicitud POST
    //filtrar los resultados
    $query .= 'WHERE nombre LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR abreviatura LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR toma LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR frecuencia LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR proceso LIKE "%' . $_POST["search"]["value"] . '%" ';
    $query .= 'OR muestra LIKE "%' . $_POST["search"]["value"] . '%" ';
}

// Se verifica si se han enviado datos de ordenamiento desde una solicitud POST
if (isset($_POST["order"]) && isset($_POST["order"]["0"]) && isset($_POST["order"]["0"]["column"]) && isset($_POST["order"]["0"]["dir"])) {

    //se concatenan condiciones a la consulta SQL para ordenar los resultados según las columnas y dirección especificadas. De lo contrario, se ordenan los resultados por el ID de forma descendente.
    $query .= 'ORDER BY ' . $_POST["order"]["0"]["column"] . ' ' . $_POST["order"]["0"]["dir"] . ' ';
} else {
    $query .= 'ORDER BY id DESC ';
}

//Se hizo una modificacion para las variables start y length que son valores de dataTables ya que me presentaban un error al momento de paginar.
//Estas variables se utilizan para paginar los resultados de la consulta.
$start = isset($_POST["start"]) ? $_POST["start"] : 0; 
$length = isset($_POST["length"]) ? $_POST["length"] : -1;

if ($length != -1) {
    $query .= 'LIMIT ' . $start . ',' . $length;
}

//Se hace una consulta y se guarda en la variable resultado.
$stmt = $conexion->prepare($query);
$stmt->execute();
$resultado = $stmt->fetchAll();
$datos = array(); //Se crea un arreglo $datos para almacenar los datos de cada fila obtenida de la consulta. 
$filtered_rows = $stmt->rowCount(); //$filtered_rows se utiliza para guardar el número de filas filtradas por la consulta.

foreach ($resultado as $fila) {
    //se agregan los valores de los campos a $sub_array. Finalmente, $sub_array se agrega al arreglo $datos.
    $sub_array = array();
    $sub_array[] = $fila["id"];
    $sub_array[] = $fila["nombre"];
    $sub_array[] = $fila["abreviatura"];
    $sub_array[] = $fila["toma"];
    $sub_array[] = $fila["frecuencia"];
    $sub_array[] = $fila["proceso"];
    $sub_array[] = $fila["muestra"];
    $sub_array[] = '<button type="button" name="editar" id="' . $fila["id"] . '" class="btn btn-warning btn-xs editar">Editar</button>';
    $sub_array[] = '<button type="button" name="borrar" id="' . $fila["id"] . '" class="btn btn-danger btn-xs borrar">Borrar</button>';
    $datos[] = $sub_array;
}

//Se construye un arreglo $salida que contiene los datos necesarios para la respuesta JSON
$salida = array(
    "draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => obtener_todos_registros(),
    "data" => $datos
);

//El arreglo $salida se codifica en formato JSON utilizando json_encode() y se muestra en la salida mediante echo.
echo json_encode($salida);
?>
