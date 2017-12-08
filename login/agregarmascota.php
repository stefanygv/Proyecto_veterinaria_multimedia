<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="icon" type="text/css" href="css/mascotas.ico">

<style type="text/css">
BODY { background: url(http://www.sanantoniotaxicabservice.com/wp-content/uploads/2013/07/minimal-gray-to-white-gradient-wallpapers1.jpg) repeat center center fixed;} 

</style></head>
</html>

<html>

<body>
	
	<title>Agregar Mascotas</title>
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
				<div class="col-md-8 col-md-offset-1 well"  class=img-responsive >
		<form name="formulario" method="post" action="formulario.php" enctype="multipart/form-data" id="formulario_mascota">
		<form class="form-horizontal">


<form method="post" name="formulario_mascota" id="formulario_mascota">


<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>

<?php  
	include('modelomascota.php');

	$mascota = new Mascota;
	$mascotas = $mascota->getMascotas($_GET['rut']);
?>

  <table class="table">
    <thead>
      <tr>
        <th>Nombre mascota</th>
        <th>Fecha Nacimiento</th>
 
        <th>Enfermedad</th>
        <th>Raza</th>
        <th>Sexo</th>     
        <th>Estado</th>
      </tr>
    </thead>
    <tbody id="listamascotas">

    </tbody>
  </table>
	<hr>

<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
 Agregar mascotas
</button>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
        	<form action="" method="post" id="formulario_mascota">
        		
Nombre Mascota: <input type="text" name="nombre_mascota" value="" class="form-control" placeholder="Ingresa Nombre de Mascota"><br>
Fecha De Nacimiento Mascota: <input type="date" name="fecha_nacimiento" class="form-control" placeholder="Ingresa Fecha Nacimiento"><br>
Tipo De Sangre: <input type="text" name="tipo_sangre" value="" class="form-control" placeholder="Ingresa Un Tipo de Sangre"><br> 
Enfermedad: <input type="text" name="enfermedad" value="" class="form-control" placeholder="Enfermedad de Mascota"><br>
Tipo De Raza: <input type="text" name="tipo_raza" value="" class="form-control" placeholder="Tipo de Raza" ><br>
Sexo: </br>
<input type="radio" name="sexo" value="macho" checked="checked" /> Macho
<input type="radio" name="sexo" value="hembra" /> Hembra <br>

<tr><td><br>
Vacunas: <br> </td>
             <td>
                <input type="checkbox" name="vacuna1" value="rabia" /> Rabia
                <input type="checkbox" name="vacuna2" value="desparazitar" /> Desparazitar 
                <input type="checkbox" name="vacuna3" value="otras" /> Otras<br>
             </td>
          </tr>

<br>
<br>
   Estatus: </br>
<input type="radio" name="estatus" value="activo" checked="checked" /> Activo
<input type="radio" name="estatus" value="inactivo" /> Inactivo <br>


        <input type="hidden" name="rut" value="<?php echo $_GET['rut']; ?>">
        	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-danger" id="agregar_mascota">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

    <script>
    $(function(){
      MostrarMascotas();

      $('#agregar_mascota').click(function(form){
      form.preventDefault();
      dataForm = $('#formulario_mascota').serialize();
      console.log(dataForm);
      $.ajax({
        type: 'ajax',
        method: 'post',
        url: 'proceso.php',
        data: dataForm,
        dataType: 'json',
        success: function(data){
          console.log(data);
          if (data.msj) {
            alert('mascota insertada');
            MostrarMascotas();
          }else{
            alert('complete todos los datos');
          }
        },
        error: function(){
          console.log("Error al enviar los datos");
        }
      });
    });

      function MostrarMascotas(){
        var dataForm = {
          "mostrar_mascotas" : "mostrar_mascotas",
          "rut" : <?php echo $_GET['rut']; ?>
        };

        var html = '';
        var i;

        $.ajax({
        type: 'ajax',
        method: 'post',
        url: 'proceso.php',
        data: dataForm,
        dataType: 'json',
        success: function(data){
          console.log(data);
          for (var i = 0; i < data.mascotas.length; i++) {
            html += '<tr>'+
                '<td>'+data.mascotas[i][2]+'</td>'+
                '<td>'+data.mascotas[i][3]+'</td>'+
               // '<td>'+data.mascotas[i][4]+'</td>'+
                '<td>'+data.mascotas[i][5]+'</td>'+
                '<td>'+data.mascotas[i][6]+'</td>'+
                '<td>'+data.mascotas[i][7]+'</td>'+
                '<td>'+data.mascotas[i][8]+'</td>'+
              '</tr>';
          }
          
          $('#listamascotas').html(html);
        },
        error: function(){
          console.log("Error al enviar los datos");
        }
      });
      }
    });
  </script>