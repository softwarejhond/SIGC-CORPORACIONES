<?php
/*Datos de conexion a la base de datos*/
$db_host = "157.90.91.29";
$db_user = "agenciae";
$db_pass = "q294g.#PwM9SYy";
$db_name = "agenciae_coardecom";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
mysqli_set_charset($con, 'utf8'); //Muy importante esta linea, guardara el contenido que contenga acentos de manera correcta configurando la bd con el UTF-8 spanis ci
if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
?>