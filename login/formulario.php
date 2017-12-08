<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="icon" type="text/css" href="css/mascotas.ico">
<link rel="stylesheet"  href="css/menu.css">
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

			
<title>Ingresar Usuarios</title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<html lang="en">
<head>
<meta charset="UTF-8">

<link rel="stylesheet" type="text/css" href="css/bootstrap.css">


</head>

<body>

<div class="container">
	<div class="row"> 
	
		<div class="col-md-4 col-md-offset-3 well"  class=img-responsive >
		<form name="formulario" method="post" action="formulario.php" enctype="multipart/form-data" id="formulario_mascota">
		<form class="form-horizontal">


<form method="post" name="formulario_mascota" id="formulario_mascota">
Nombre Dueño: <input type="text" name="nombre_dueno" id="nombre_dueno" value="" class="form-control" placeholder="Ingresa Nombre"></br> 
Rut: <input type="text" name="rut" id="rut" value="" class="form-control" placeholder="Ingresa Rut"><br> 
dv: <input type="text" name="dv" id="dv" value="" class="form-control" placeholder="Ingresa Codigo Verificador"><br> 
Telefono: <input type="text" name="telefono" id="telefono" value="" class="form-control" placeholder="Ingrese Telefono"><br>
<input type="file" name="imagen" id="imagen"/>
<br>


			<input type="button" value="Acceder a camara" class="btn btn-danger" onClick="setup(); $(this).hide().next().show();">
		<input type="button" value="Tomar Foto" class="btn btn-danger" onClick="take_snapshot()" style="display:none">
		<input type=button value="Reiniciar" class="btn btn-danger" onClick="Webcam.reset()">
		<br>
		<input type="submit" name="enviar" id="enviar" value="Registrar" class="btn btn-danger" />
	</form>
	
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<style type="text/css">
		body { font-family: Helvetica, sans-serif; }
		h2, h3 { margin-top:0; }
		form { margin-top: 15px; }
		form > input { margin-right: 15px; }
	 }
	</style>
</head>
<body>
	<div id="results"></div>
	

	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="../webcam.min.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 320,
			height: 240,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
	</script>
	<script language="JavaScript">
		function setup() {
			Webcam.reset();
			Webcam.attach( '#my_camera' );
		}
		
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Tu foto</h2>' + 
					'<img src="'+data_uri+'"/>';
			} );
		}
	</script>
	
</body>
</html>


<script>
	$(document).ready(function(){
	$("#enviar").click(function(){
	var nombre_dueno = $("#nombre_dueno").val();
	var rut = $("#rut").val();
	var dv = $("#dv").val();
	var telefono = $("#telefono").val();
	var imagen = $("#imagen").prop("files")[0];
	var formData = new FormData();
	formData.append('nombre_dueno' , nombre_dueno);
	formData.append('rut' , rut);
	formData.append('dv' , dv);
	formData.append('telefono' , telefono);
	formData.append('imagen' , imagen);
	 for (var pair of formData.entries()) {
            console.log(pair[0]+ ', ' + pair[1]); 
            }
	$.ajax({
	type: "POST",
	url: "proceso.php",
	data: formData,
	processData : false,
    contentType : false,
	success: function(result){
	document.location.href='agregarmascota.php?rut='+rut;
}
});

return false;
});
});
</script>