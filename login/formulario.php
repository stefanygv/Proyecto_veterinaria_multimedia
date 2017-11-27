<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="fonts.css">
<link rel="stylesheet" type="text/css" href="still.css">
<link rel="stylesheet" type="text/css" href="menu.css">
<link rel="icon" type="text/css" href="mascotas.ico">


<style type="text/css">
BODY { background: url(http://www.sanantoniotaxicabservice.com/wp-content/uploads/2013/07/minimal-gray-to-white-gradient-wallpapers1.jpg) no-repeat center center fixed;} 

</style></head>
</html>

<html>

<body>
	
	<title>Formulario</title>
<ul>
 <li><a href="Bienvenidos.html">Bienvenidos</a></li>
  <li><a href="formulario.php">Ingresar Usuario</a></li>
  <li><a href="usuarios_modificar.php">Modificar Usuario</a></li> 
  <li><a href="listado.php">Ver Listado</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
</nav>
  </header>
</body>
</html>

<html lang="en">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
<div class="container">
	<div class="row"> 	
		<div class="col-md-4 col-md-offset-3 well"  class=img-responsive >
		<form name="formulario" method="post" action="formulario.php" enctype="multipart/form-data" >
		<form class="form-horizontal">
			
<title>Ingresar Usuarios</title>

Nombre Dueño: <input type="text" name="nombre_dueno" value="" class="form-control" placeholder="Ingresa Nombre"></br> 
Rut: <input type="text" name="rut" value="" class="form-control" placeholder="Ingresa Rut"><br> 
dv: <input type="text" name="dv" value="" class="form-control" placeholder="Ingresa Codigo Verificador"><br> 
Fecha De Nacimiento Mascota: <input type="date" name="fecha_de_nacimiento" class="form-control" placeholder="Ingresa Fecha Nacimiento"><br>
Nombre Mascota: <input type="text" name="nombre_mascota" value="" class="form-control" placeholder="Ingresa Nombre de Mascota"></br> 
Tipo De Sangre: <input type="text" name="tipo_sangre" value="" class="form-control" placeholder="Ingresa Un Tipo de Sangre"><br> 
Vacunas: <input type="text" name="vacuna" value="" class="form-control" placeholder="Tipo de Vacuna"><br> 
Enfermedad: <input type="text" name="enfermedad" value="" class="form-control" placeholder="Enfermedad de Mascota"><br>
Tipo De Raza: <input type="text" name="tipo_raza" value="" class="form-control" placeholder="Tipo de Raza" ><br> 
<!--Sexo: <input type="text" name="sexo" value="" class="form-control" placeholder="Macho o Hembra"><br> -->
Telefono: <input type="text" name="telefono" value="" class="form-control" placeholder="Ingrese Telefono"><br> 
Sexo: </br>
<input type="radio" name="sexo" value="macho" checked="checked" /> Macho
<input type="radio" name="sexo" value="hembra" /> Hembra<br>
<br>
<input type="file" name="imagen" id="imagen"><br>
<br>
<input type="submit" name="submit" value = "enviar" class="btn btn-danger" />

</form>
		</div>
</div>
	</div>
	
</body>
</html>	

<?php
include ('libreria/phpqrcode/qrlib.php');
include ('conexion.php');
if(isset($_POST['submit'])){
	$extensionespermitidas = array('jpg', 'jpeg', 'gif', 'png', 'tif', 'tiff', 'bmp');
	$nombrebre_orig = $_FILES['imagen']['name']; 
    $array_nombre = explode('.',$nombrebre_orig); 
    $cuenta_arr_nombre = count($array_nombre); 
    $extension = strtolower($array_nombre[--$cuenta_arr_nombre]);
     if(in_array($extension, $extensionespermitidas)){
	if ($_FILES['imagen']['size'] <= 2000000) {
		$nombre_dueno = $_POST['nombre_dueno'];
 		$rut = $_POST['rut'];
 		$dv = $_POST['dv'];
 		$fecha_de_nacimiento = $_POST['fecha_de_nacimiento'];
 		$nombre_mascota = $_POST['nombre_mascota'];
 		$tipo_sangre = $_POST['tipo_sangre'];
 		$vacuna = $_POST['vacuna'];
 		$enfermedad = $_POST['enfermedad'];
 		$tipo_raza = $_POST['tipo_raza'];
 		$sexo = $_POST['sexo'];
 		$telefono = $_POST['telefono'];
 		
		if (file_exists($rut)) {
			print "LA CARPETA YA EXISTE";
			}else{
				mkdir("Usuarios/$rut");
				copy($_FILES['imagen']['tmp_name'], "Usuarios/$rut/nuevaImagen.jpg");
				$urlimagen = "Usuarios/$rut/nuevaimagen.png";
				$insert_row = $mysqli->query("INSERT INTO mascotas (nombre_dueno, rut, dv, fecha_de_nacimiento, nombre_mascota, tipo_sangre, vacuna, enfermedad, tipo_raza, sexo, telefono, Imagen) 
				VALUES('".$nombre_dueno."', '".$rut."', '".$dv."', '".$fecha_de_nacimiento."', '".$nombre_mascota."', '".$tipo_sangre."','".$vacuna."','".$enfermedad."','".$tipo_raza."','".$sexo."','".$telefono."','".$urlimagen."')");
					
					if($insert_row){
    print 'Success! ID of last inserted record is : ' .$mysqli->insert_id .'<br />'; 
}else{
    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
}
	
	$ImagenGuar = "localhost/tarea2/Usuarios/".$rut."/".$rut.".png";

    $codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'FN:'.$nombre_dueno."\n";
    $codeContents .= 'FN:'.$nombre_mascota."\n";
    $codeContents .= 'TEL;WORK;VOICE:'.$telefono."\n";  
    $codeContents .= 'END:VCARD'; 
  
    QRcode::png($codeContents,"Usuarios/$rut/".$rut.".png",L,4,1);
						
					header('Location: bienvenidos.html');
					}
		}else{
			print("EL TAMAÑO DE LA IMAGEN ES MUY GRANDE");
		}
	}else{
		print ("EL FORMATO ES INCORRECTO");
	}

}
?>