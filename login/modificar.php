<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />


<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="icon" type="text/css" href="css/mascotas.ico">
<link rel="stylesheet"  href="css/menu.css">
<style type="text/css">
BODY { background: url(http://www.sanantoniotaxicabservice.com/wp-content/uploads/2013/07/minimal-gray-to-white-gradient-wallpapers1.jpg) repeat center center fixed;} 

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
    $consulta = "SELECT * FROM dueno WHERE rut = '$rut'";
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
Nombre Dueno: <input type="text" name="nombre_dueno"  class="form-control"  value="'.$row['nombre_dueno'].'"><br>
Rut: <input type="text" name="rut"   class="form-control"  value="'.$row['rut'].' " readonly><br>
Dv: <input type="text" name="dv"  class="form-control"   value="'.$row['dv'].'"><br>
Telefono: <input type="text" name="telefono" class="form-control" value="'.$row['telefono'].'"><br>

<input type="submit" name = "submit" value="Modificar" class="btn btn-danger">
<input type="submit" name="eliminar" value="eliminar" class="pull-right btn btn-danger">

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
</form>
';
    }
}

 ?>



 <?php 
if(isset($_POST['submit'])){
    $dv = $_POST['dv'];
    $nombre_dueno = $_POST['nombre_dueno'];
  
    $telefono = $_POST['telefono'];


  $insert_row = $mysqli->query("UPDATE dueno SET dv ='".$dv."', nombre_dueno ='".$nombre_dueno."', telefono = '".$telefono."' WHERE rut = '".$rut."'");

if($insert_row){
    header('Location: usuarios_modificar.php');                    
    print 'Datos modificados' .$mysqli->insert_id .'<br />'; 
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}
}

if (isset($_POST['eliminar'])) {
	$rut = $_POST['rut'];
	$disable_row = $mysqli->query("UPDATE dueno SET estado = 0 WHERE rut = '".$rut."'");

    if($disable_row){
      header('Location: usuarios_modificar.php');                    
      print 'Datos modificados' .$mysqli->insert_id .'<br />'; 
    }else{
      die('Error : ('. $mysqli->errno .') '. $mysqli->error);
    }
}

  ?>