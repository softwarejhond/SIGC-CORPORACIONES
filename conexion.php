<?php
/*Datos de conexion a la base de datos*/
$db_host = getenv('SIGC_DB_HOST') ?: "148.113.221.17";
$db_user = getenv('SIGC_DB_USER') ?: "agenciae_jacMarcoFidel";
$db_pass = getenv('SIGC_DB_PASS') ?: "II91up?&JB+]X)R0";
$db_name = getenv('SIGC_DB_NAME') ?: "agenciae_cartasJAC"; //nombre de la base de datos

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($con, 'utf8'); //Muy importante esta linea, guardara el contenido que contenga acentos de manera correcta configurando la bd con el UTF-8 spanis ci
if (mysqli_connect_errno()) {
    error_log('No se pudo conectar a la base de datos: ' . mysqli_connect_error());
    echo 'No se pudo conectar a la base de datos.';
}
?>
