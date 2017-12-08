<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="icon" type="text/css" href="css/mascotas.ico">
<link rel="stylesheet"  href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/stil.css">
<style type="text/css">
BODY { background: url(http://www.sanantoniotaxicabservice.com/wp-content/uploads/2013/07/minimal-gray-to-white-gradient-wallpapers1.jpg) repeat center center fixed;} 
</style></head>
</html>

<body>
<ul>
 <li><a href="Bienvenidos.html">Bienvenidos</a></li>
  <li><a href="formulario.php">Ingresar Usuario</a></li>
  <li><a href="usuarios_modificar.php">Modificar Usuario</a></li> 
  <li><a href="listado.php">Ver Listado</a></li>
 <li><a href="logout.php">Logout</a></li>
</ul>
</body>
</html>


<body>
	<title>Modificar Usuarios</title>

<table class="centrada"  width="50%" border=0> 
<tr>
<br>
<th>Nombre Dueño</th>
<th>Rut</th>
<th>Editar Usuario</th>
<th>Editar Mascota</th>
<th>Agregar Mascota</th>
</tr>
	<?php 
	include ('conexion.php');
	$consulta = "SELECT nombre_dueno, rut FROM dueno WHERE estado=1";

	$res = $mysqli->query($consulta);
	while($row = $res->fetch_assoc()){
		$rut = $row['rut'];	
		echo "<tr>";
		echo "<td>";
		echo $row['nombre_dueno'];
		echo "</td>";
		echo "<td>";
		echo $row['rut'];
		echo "</td>";
		echo "<td>";
		echo '<button type="button" class="btn btn-danger"><a href="modificar.php?rut='.$rut.'">Editar Usuario </a></button>'; 
		echo "</td>";
		echo "<td>";
		echo '<button class="btn btn-danger"><a href="modificarmascotas.php?rut='.$rut.'">Editar Mascotas </a></button>'; 
		echo "</td>";
		echo "<td>";
		echo '<button class="btn btn-danger"><a href="agregarmascota.php?rut='.$rut.'">Agregar Mascotas </a></button>'; 
		echo "</td>";
		echo "</tr>";

	}
	?>
</table>
</body>
</html>