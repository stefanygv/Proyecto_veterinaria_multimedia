<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<link rel="stylesheet" type="text/css" href="fonts.css">
<link rel="stylesheet" type="text/css" href="still.css">
<link rel="icon" type="text/css" href="mascotas.ico">
<link rel="stylesheet"  href="menu.css">
<style type="text/css">
BODY { background: url(http://www.sanantoniotaxicabservice.com/wp-content/uploads/2013/07/minimal-gray-to-white-gradient-wallpapers1.jpg) no-repeat center center fixed;} 

</style></head>
 
<body>
</body>
</html>

<body>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">

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

<?php 
include ('conexion.php');
if(isset($_GET['rut'])) {
    $rut = $_GET['rut'];
    $consulta = "SELECT * FROM mascotas WHERE rut = '$rut'";
    $res = $mysqli->query($consulta);
    while($row = $res->fetch_assoc()){
    	echo '<form action="" method="post">
    	<html lang="en">
<head>
<meta charset="UTF-8">


<link rel="stylesheet" type="text/css" href="css/bootstrap.css">


</head>

<body>

<div class="container">
  <div class="row"> 
    <div class="col-md-4 well">
Nombre Due&ntildeo: <input type="text" name="nombre_dueno"  class="form-control"  value="'.$row['nombre_dueno'].'"><br>
Rut: <input type="text" name="rut"   class="form-control"  value="'.$row['rut'].' " readonly><br>
Dv: <input type="text" name="dv"  class="form-control"   value="'.$row['dv'].'"><br>
Fecha De Nacimiento Mascota: <input type="date" name="fecha_de_nacimiento"  class="form-control"  readonly><br>
Nombre Mascota: <input type="text" name="nombre_mascota" class="form-control"  value="'.$row['nombre_mascota'].'"><br>
Tipo De Sangre: <input type="text" name="tipo_sangre" class="form-control" value="'.$row['tipo_sangre'].'"><br>
Vacuna: <input type="text" name="vacuna" class="form-control"  value="'.$row['vacuna'].'"><br>
Enfermedad: <input type="text" name="enfermedad" class="form-control"  value="'.$row['enfermedad'].'"><br>
Tipo De Raza: <input type="text" name="tipo_raza" class="form-control" value="'.$row['tipo_raza'].'"><br>
Sexo: <input type="text" name="sexo" class="form-control"  value="'.$row['sexo'].'"><br>
Telefono: <input type="text" name="telefono" class="form-control" value="'.$row['telefono'].'"><br>

<input type="submit" name = "submit" value="Modificar" class="btn btn-danger">

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</form>';
    }
}

 ?>



 <?php 
if(isset($_POST['submit'])){
		$dv = $_POST['dv'];
		$nombre_dueno = $_POST['nombre_dueno'];
		$nombre_mascota = $_POST['nombre_mascota'];
 		$tipo_sangre = $_POST['tipo_sangre'];
 		$vacuna = $_POST['vacuna'];
 		$enfermedad = $_POST['enfermedad'];
 		$tipo_raza = $_POST['tipo_raza'];
 		$sexo = $_POST['sexo'];
 		$telefono = $_POST['telefono'];


	$insert_row = $mysqli->query("UPDATE mascotas SET dv ='".$dv."', nombre_dueno ='".$nombre_dueno."', nombre_mascota = '".$nombre_mascota."', tipo_sangre = '".$tipo_sangre."', vacuna = '".$vacuna."', enfermedad = '".$enfermedad."', tipo_raza = '".$tipo_raza."', sexo = '".$sexo."', telefono = '".$telefono."' WHERE rut = '".$rut."'");

if($insert_row){
    header('Location: usuarios_modificar.php');                    
    print 'Datos modificados' .$mysqli->insert_id .'<br />'; 
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}
}

  ?>