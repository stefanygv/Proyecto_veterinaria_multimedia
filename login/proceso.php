 <?php
include('modelomascota.php');
include ('libreria/phpqrcode/qrlib.php');
$data['msj'] = false;
$mascota = new Mascota;
if (isset($_POST['nombre_dueno']) and strlen($_POST['nombre_dueno']) > 2 and isset($_POST['rut']) and strlen($_POST['rut']) > 7 and isset($_POST['dv']) and strlen($_POST['dv']) > 0 and isset($_POST['telefono']) and strlen($_POST['telefono']) > 7) {
	$file_name = $_FILES['imagen']['name'];
    $file_tmp =$_FILES['imagen']['tmp_name'];
    $file_type=$_FILES['imagen']['type'];
    echo $file_name;
	$data['datos'] = $mascota->insertUser($_POST['nombre_dueno'], $_POST['rut'], $_POST['dv'], $_POST['telefono'],$file_name);
	$data['rut'] = $data['datos'][0]['rut'];
	$data['msj'] = true;
	$dirname = "archivo/".$_POST['rut'];
	if (!is_dir($dirname)) {
    	mkdir($dirname);
	}
	move_uploaded_file($file_tmp, $dirname."/".$_POST['rut'].".png");
	$ImagenGuar = "localhost/login/archivo/".$_POST['rut']."/".$_POST['rut'].".png";

    $codeContents  = 'BEGIN:VCARD'."\n"; 
    $codeContents .= 'FN:'.$_POST['nombre_dueno']."\n";  
    $codeContents .= 'TEL;WORK;VOICE:'.$_POST['telefono']."\n";  
    $codeContents .= 'END:VCARD'; 
  
    QRcode::png($codeContents,"archivo/".$_POST['rut']."/".$_POST['rut'].'QR'.".png");
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