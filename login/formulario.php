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
<input type="submit" name="Registrar" id="enviar" class="btn btn-danger" />

</form>


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