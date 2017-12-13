

<?php
 $mysqli = new mysqli("localhost", "root", "", "veterinaria");
/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", $mysqli->connect_error);
    exit();
}
 ?>

 