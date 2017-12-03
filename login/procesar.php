<?php  
	
$usuario =$_POST['usuario'];
$password=$_POST['password'];

//conectar a la base de datos
$conexion=mysqli_connect('localhost','root', '' ,'veterinaria');

$consulta="SELECT * FROM usuarios where usuario ='$usuario' and password='$password'";

$resultado = mysqli_query( $conexion , $consulta);

$filas = mysqli_num_rows($resultado);

if($filas > 0) {
      header("location:bienvenidos.html");
	}
else {
	      header("location:login.php");
		echo "Error en la autentificación";
}

mysqli_free_result($resultado); // que libere los resultados 
mysqli_close ($conexion);

?>
