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
 <li><a style="text-decoration: none; color:#767676" href="Bienvenidos.html">Bienvenidos</a></li>
  <li><a style="text-decoration: none; color:#767676" href="formulario.php">Ingresar Usuario</a></li>
  <li><a style="text-decoration: none; color:#767676" href="usuarios_modificar.php">Modificar Usuario</a></li> 
  <li><a style="text-decoration: none; color:#767676" href="listado.php">Ver Listado</a></li>
  <li><a style="text-decoration: none; color:#767676" href="logout.php">Logout</a></li>
</ul>
</nav>
</body>
</html>
<html lang="en">
<head>
<meta charset="UTF-8">
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>

<div class="modal" id="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crop Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php  
        $directory_img = 'C:/xampp/htdocs/proyecto_veterinaria_multimedia/login/archivo/'.$_GET['rut'].'/'.$_GET['rut'].'camera.jpeg';
        echo '<img src="archivo/'.$_GET['rut'].'/'.$_GET['rut'].'camera.jpeg"  width="240" height="240"id="target" alt="Flowers">';
        ?>
        <form action="agregarmascota.php?rut=<?php echo $_GET['rut'] ?>" method="post" onsubmit="return checkCoords();">
      <input type="hidden" id="x" name="x" />
      <input type="hidden" id="y" name="y" />
      <input type="hidden" id="w" name="w" />
      <input type="hidden" id="h" name="h" />
      <input type="submit" value="Crop" class="btn btn-large btn-inverse" />
    </form>
    <?php  
  /*if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  echo "recibido";
  $targ_w = $targ_h = 150;
  $jpeg_quality = 90;

  $src = 'archivo/'.$_GET['rut'].'/'.$_GET['rut'].'camera.jpeg';
  $img_r = imagecreatefromjpeg($src);
  $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

  imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
  $targ_w,$targ_h,$_POST['w'],$_POST['h']);

  header('Content-type: image/jpeg');
  imagejpeg($dst_r,null,$jpeg_quality);
}*/
?>
    
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-danger">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $("#modal").modal('show');
    }  );


</script>


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

<script src="crop/js/jquery.Jcrop.js"></script>
<script src="crop/js/jquery.color.js"></script>
 <link rel="stylesheet" href="crop/css/jquery.Jcrop.css" type="text/css" />
<script type="text/javascript">

  $(function(){

    $('#target').Jcrop({
      aspectRatio: 1,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>

