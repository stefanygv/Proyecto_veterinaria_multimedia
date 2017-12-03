<?php
include('modelomascota.php');

$data['msj'] = false;
$mascota = new Mascota;

if (isset($_POST['nombre_dueno']) and strlen($_POST['nombre_dueno']) > 2 and isset($_POST['rut']) and strlen($_POST['rut']) > 7 and isset($_POST['dv']) and strlen($_POST['dv']) > 0 and isset($_POST['telefono']) and strlen($_POST['telefono']) > 7) {
	//Aqui se inserta el usuario
	$data['datos'] = $mascota->insertUser($_POST['nombre_dueno'], $_POST['rut'], $_POST['dv'], $_POST['telefono']);
	$data['rut'] = $data['datos'][0]['rut'];
	$data['msj'] = true;
}

if (isset($_POST['mostrar_mascotas'])) {
	$data['mascotas'] = $mascota->getMascotas($_POST['rut']);
	$data['msj'] = true;
}

if (isset($_POST['nombre_mascota']) and strlen($_POST['nombre_mascota']) > 3 and $_POST['rut'] and strlen($_POST['rut']) > 7 and $_POST['fecha_nacimiento'] and $_POST['enfermedad'] and $_POST['tipo_raza'] and $_POST['sexo'] and $_POST['estatus'] and $_POST['tipo_sangre']) {
	$id = $mascota->insertMascota($_POST['nombre_mascota'], $_POST['rut'], $_POST['fecha_nacimiento'], $_POST['enfermedad'], $_POST['tipo_raza'], $_POST['sexo'], $_POST['estatus'],  $_POST['tipo_sangre'] );
	
	if (isset($_POST['vacuna1']))
		$mascota->insertVacuna($_POST['vacuna1'], $id);

	if (isset($_POST['vacuna2']))
		$mascota->insertVacuna($_POST['vacuna2'], $id);

	if (isset($_POST['vacuna3']))
		$mascota->insertVacuna($_POST['vacuna3'], $id);

	$data['msj'] = true;
}

echo json_encode($data);
?>