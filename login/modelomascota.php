<?php  
	class Mascota
{
	function conectar(){

		$usuario = "root";
		$clave="";
		$db_nombre="veterinaria";
		$host="localhost";

		 return $conn = new PDO("mysql:host=$host;dbname=$db_nombre",$usuario, $clave);
	}

	function insertUser($nombre_dueno, $rut, $dv, $telefono,$imagen){
		$conn = $this->conectar();
		$sql = "INSERT INTO dueno (nombre_dueno, rut, dv, telefono,imagen) VALUES (?,?,?,?,?)";
		$st = $conn->prepare($sql);
		$st->bindParam(1, $nombre_dueno);
		$st->bindParam(2, $rut);
		$st->bindParam(3, $dv);
		$st->bindParam(4, $telefono);
		$st->bindParam(5, $imagen);
		$st->execute();
		return $this->getUser($rut);
	}

	function getUser($rut){
		$conn = $this->conectar();
		$sql = "SELECT * FROM dueno WHERE rut = ?";
		$st = $conn->prepare($sql);
		$st->bindParam(1, $rut);
		$st->execute();
		$resultado = $st->fetchAll();
		return $resultado;
	}

	function getMascotas($rut){
		$conn = $this->conectar();
		$sql = "SELECT * FROM mascota WHERE rut = ?";
		$st = $conn->prepare($sql);
		$st->bindParam(1, $rut);
		$st->execute();
		$resultado = $st->fetchAll();
		return $resultado;
	}

	function insertMascota($nombre_mascota, $rut, $fecha_nacimiento, $enfermedad, $tipo_raza, $sexo, $estatus, $tipo_sangre){
		$conn = $this->conectar();
		$sql = "INSERT INTO mascota (nombre_mascota, rut, fecha_nacimiento, enfermedad, tipo_raza, sexo, estatus, tipo_sangre) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$st = $conn->prepare($sql);
		$st->bindParam(1, $nombre_mascota);
		$st->bindParam(2, $rut);
		$st->bindParam(3, $fecha_nacimiento);
		$st->bindParam(4, $enfermedad);
		$st->bindParam(5, $tipo_raza);
		$st->bindParam(6, $sexo);
		$st->bindParam(7, $estatus);
		$st->bindParam(8, $tipo_sangre);
		$st->execute();
		return $conn->lastInsertId();
	}

	function insertVacuna($vacuna, $id_mascota){
		$conn = $this->conectar();
		$sql = "INSERT INTO vacuna (nombre, id_mascota) VALUES (?,?)";
		$st = $conn->prepare($sql);
		$st->bindParam(1, $vacuna);
		$st->bindParam(2, $id_mascota);
		$st->execute();
	}
}
?>