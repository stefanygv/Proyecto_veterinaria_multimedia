<?php  
	session_start();
	if (isset($_SESSION['id'])) {
		echo "Bienvenido ".$_SESSION['id'];
		echo '<a href="logout.php">Desloguear</a>';
	}else{
		header('Location: login.php');
	}
?>