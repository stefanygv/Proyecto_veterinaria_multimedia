<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="fonts.css">
<link rel="icon" type="text/css" href="mascotas.ico">
<link rel="stylesheet"  href="menu.css">
<style type="text/css">
BODY { background: url(http://www.sanantoniotaxicabservice.com/wp-content/uploads/2013/07/minimal-gray-to-white-gradient-wallpapers1.jpg) no-repeat center center fixed;} 

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
<link rel="stylesheet" type="text/css" href="stil.css">

<table class="centrada"  width="100%" border=0> 
<th>Nombre Dueño</th>
<th>Rut</th>
<th>dv</th>
<th>Fecha Nacimiento Mascota</th>
<th>Nombre Mascota</th>
<th>Tipo de Sangre</th>
<th>Vacuna</th>
<th>Enfermedad</th>
<th>Tipo Raza</th>
<th>Sexo Mascota</th>
<th>Telefono</th>
<th>PDF</th>
</tr>
		<?php 
	include ('conexion.php');
	$consulta = "SELECT * FROM mascotas";
	$res = $mysqli->query($consulta);

	while($row = $res->fetch_assoc()){
		$rut = $row['rut'];
		$dv = $row['dv'];
		$Nombre = $row['nombre_dueno'];
		$Fecha = $row['fecha_de_nacimiento'];
		$nombre_mascota = $row['nombre_mascota'];
 		$tipo_sangre = $row['tipo_sangre'];
 		$vacuna = $row['vacuna'];
 		$enfermedad = $row['enfermedad'];
 		$tipo_raza = $row['tipo_raza'];
 		$sexo = $row['sexo'];
 		$telefono = $row['telefono'];
		
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
		echo $Fecha;
		echo "</td>";
		echo "<td>";
		echo $nombre_mascota;
		echo "</td>";
		echo "<td>";
		echo $tipo_sangre;
		echo "</td>";
		echo "<td>";
		echo $vacuna;
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
		echo $telefono;
		echo "</td>";
		echo "<td>";
		echo '<button><class="btn btn-danger"><a href="imprimirpdf.php?rut='.$rut.'">Generar PDF</a> </button>';
		echo "</td>";
		echo "</tr>";
	}
	?>
</table>
</body>
</html>	
</body>
</html>