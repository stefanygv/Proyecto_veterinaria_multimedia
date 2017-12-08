 <?php
	include ('conexion.php');
	if(isset($_POST['submit'])){
	    
	    $nombre_mascota = $_POST['nombre_mascota'];
	    $tipo_sangre = $_POST['tipo_sangre'];
	    if (isset($_POST['vacuna'])) {
	      $vacuna = $_POST['vacuna'];
	    }
	    $enfermedad = $_POST['enfermedad'];
	    $tipo_raza = $_POST['tipo_raza'];
	    $sexo = $_POST['sexo'];
	    $estatus = $_POST['estatus'];
	    $id = $_POST['id'];

  		$insert_row = $mysqli->query("UPDATE mascota SET nombre_mascota = '".$nombre_mascota."', tipo_sangre = '".$tipo_sangre."', enfermedad = '".$enfermedad."', tipo_raza = '".$tipo_raza."', sexo = '".$sexo."', estatus = '".$estatus."' WHERE id = '".$id."'");

		if($insert_row){
		    header('Location: usuarios_modificar.php');                    
		    print 'Datos modificados' .$mysqli->insert_id .'<br />'; 
		}else{
		    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
	}

	if (isset($_POST['eliminar'])) {
		$id = $_POST['id'];

		$disable_row = $mysqli->query("UPDATE mascota SET estado = 0 WHERE id = '".$id."'");

		if($disable_row){
		    header('Location: usuarios_modificar.php');                    
		    print 'Datos modificados' .$mysqli->insert_id .'<br />'; 
		}else{
		    die('Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
	}

  ?>

<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" type="text/css" href="css/fonts.css">
    <link rel="stylesheet" type="text/css" href="css/stil.css">
    <link rel="icon" type="text/css" href="css/mascotas.ico">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet"  href="css/menu.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <style type="text/css">
      BODY { background: url(http://www.sanantoniotaxicabservice.com/wp-content/uploads/2013/07/minimal-gray-to-white-gradient-wallpapers1.jpg) repeat center center fixed;} 
    </style>
    <title>Modificar Mascotas</title>
  </head>

  <body>
    <ul>
     <li><a href="Bienvenidos.html">Bienvenidos</a></li>
      <li><a href="formulario.php">Ingresar Usuario</a></li>
      <li><a href="usuarios_modificar.php">Modificar Usuario</a></li> 
      <li><a href="listado.php">Ver Listado</a></li>
    <li><a href="logout.php">Logout</a></li>
    </ul>
    <br>
    <div class="row">
      <div class="container">
    
    <?php
      

      
      if(isset($_GET['rut'])) 
      {
        $rut = $_GET['rut'];
        $consulta = "SELECT * FROM mascota WHERE rut = '$rut' AND estado = 1";
        $res = $mysqli->query($consulta);
          while($row = $res->fetch_assoc())
          {
            echo '
              <form action="" method="post" id="formulario_mascota">
                <div class="col-md-4 well" style="margin-left:0px;">

                  Fecha De Nacimiento Mascota: <input type="date" name="fecha_nacimiento"  class="form-control"  value="'.$row['fecha_nacimiento'].'" readonly><br>
                  Nombre Mascota: <input type="text" name="nombre_mascota" class="form-control"  value="'.$row['nombre_mascota'].'"><br>
                  Tipo De Sangre: <input type="text" name="tipo_sangre" class="form-control" value="'.$row['tipo_sangre'].'"><br>
                  <tr>
                    <td>Vacunas: <br> </td>
                    <td>
                      <input type="checkbox" name="vacuna1"   value="'.$row['vacuna'].'"/> Rabia
                      <input type="checkbox" name="vacuna2"   /> Desparazitar 
                      <input type="checkbox" name="vacuna3"  /> Otras<br>  
                    </td>
                  </tr>
                  <br>
                  Enfermedad: <input type="text" name="enfermedad" class="form-control"  value="'.$row['enfermedad'].'"><br>
                  Tipo De Raza: <input type="text" name="tipo_raza" class="form-control" value="'.$row['tipo_raza'].'"><br>
                  Sexo: </br>
                  <input type="radio" name="sexo" value="macho" checked="checked" /> Macho
                  <input type="radio" name="sexo" value="hembra" value="'.$row['sexo'].'"/> Hembra <br>
                  <br>

                  Estatus: </br>
                  <input type="radio" name="estatus" value="activo" checked="checked" /> Activo
                  <input type="radio" name="estatus" value="inactivo" value="'.$row['estatus'].'"/> Inactivo <br>
                  <br>
                  <input type="hidden" name="id" value="'.$row['id'].'">


                  <input type="submit" name = "submit" value="Modificar" class="btn btn-danger">
                  <input type="submit" name = "eliminar" value="eliminar" class="btn btn-danger pull-right">
              </form>
              </div>';
        }
      }

 ?>
      </div>
    </div>
  </body>
</html>