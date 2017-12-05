<?php

$usuario = "root";
$clave="";
$db_nombre="veterinaria";
$host="localhost";

$conn = new PDO("mysql:host=$host;dbname=$db_nombre",$usuario, $clave);

//$conn =null; cerrar

?>

<?php
 $mysqli = new mysqli("localhost", "root", "", "veterinaria");
/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
 ?>

 