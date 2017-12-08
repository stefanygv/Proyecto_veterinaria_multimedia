<?php  
    session_start();
    if (isset($_SESSION['id'])) {
        header('Location: principal.php');
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Bienvenido</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width-device-width, user-scalable=no, initial-scale=1 ,maxium-scale =1 , minium-scale =1">
    <link rel="stylesheet" href ="css/estilos.css">
  </head>
<body>
    <form action ="procesar.php" method="post">
    <h2> Bienvenido </h2>

    <input type="text" placeholder= "&#128272; usuario" name="usuario">
    <input type="password" placeholder="&#128272; password" name="password" >
    <input  type ="submit" value="Ingresar">
</form>
</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<style type="text/css">

BODY { background: url(https://professor-falken.com/wp-content/uploads/2017/09/mascotas-perro-gato-juego-amistad-amor-Fondos-de-Pantalla-HD-professor-falken.com_.jpg) center fixed repeat} 

</style></head>
 
<body>
</body>
</html>