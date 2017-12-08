<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="icon" type="text/css" href="css/mascotas.ico">
<link rel="stylesheet"  href="css/menu.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/stil.css">
<style type="text/css">
BODY { background: url(http://www.sanantoniotaxicabservice.com/wp-content/uploads/2013/07/minimal-gray-to-white-gradient-wallpapers1.jpg) repeat center center fixed;} 

</style></head>
</html>

<html>
<body>

	<title>Lista</title>
<ul>
 <li><a href="Bienvenidos.html">Bienvenidos</a></li>
  <li><a href="formulario.php">Ingresar Usuario</a></li>
  <li><a href="usuarios_modificar.php">Modificar Usuario</a></li> 
  <li><a href="listado.php">Ver Listado</a></li>
  <li><a href="logout.php">Logout</a></li>

</ul>
<br>
</br>
</body>
</html>


<body>

		<form name="formulario" method="post" action="formulario.php" enctype="multipart/form-data" >
	
</head>
<body>


<table class="centrada"  width="100%" border=0> 
<th>Nombre Dueño</th>
<th>Rut</th>
<th>dv</th>
<th>Telefono</th>
<th>Nombre Mascota</th>
<th>Fecha de Nacimiento</th>
<th>Enfermedad</th>
<th>Raza</th>
<th>Sexo</th>
<th>Estatus</th>
<th>Tipo de Sangre</th>
<th>PDF</th>
</tr>
		<?php 
	include ('conexion.php');
	$consulta = "SELECT * FROM dueno INNER JOIN mascota ON dueno.rut=mascota.rut";
	$res = $mysqli->query($consulta);

	while($row = $res->fetch_assoc()){
		$rut = $row['rut'];
		$dv = $row['dv'];
		$Nombre = $row['nombre_dueno'];
		$telefono = $row['telefono'];
		$nombre_mascota = $row['nombre_mascota'];
		$fecha_nacimiento = $row['fecha_nacimiento'];
		$enfermedad = $row['enfermedad'];
		$tipo_raza = $row['tipo_raza'];
		$sexo = $row['sexo'];
		$estatus = $row['estatus'];
		$tipo_sangre = $row['tipo_sangre'];
	
		echo "<tr>";
		echo "<td>";
		echo $Nombre;
		echo "</td>";
		echo "<td>";
		echo $rut;
		echo "</td>";
		echo "<td>";
		echo $dv;
		echo "</td>";
		echo "<td>";
		echo $telefono;
		echo "</td>";
		echo "<td>";
		echo $nombre_mascota;
		echo "</td>";
		echo "<td>";
		echo $fecha_nacimiento;
		echo "</td>";
		echo "<td>";
		echo $enfermedad;
		echo "</td>";
		echo "<td>";
		echo $tipo_raza;
		echo "</td>";
		echo "<td>";
		echo $sexo;
		echo "</td>";
		echo "<td>";
		echo $estatus;
		echo "</td>";
		echo "<td>";
		echo $tipo_sangre;
		echo "</td>";
		echo "<td>";
		echo '<button class="btn btn-danger"><a href="imprimirpdf.php?rut='.$rut.'">Generar PDF</a> </button>';
		echo "</td>";
		echo "</tr>";
	}
	?>
</table>
</body>
</html>	
</body>
</html>