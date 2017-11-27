<?php
include ('conexion.php');
if(isset($_GET['rut'])) {
$rut = $_GET['rut'];
$consulta = "SELECT nombre_dueno, rut, dv, fecha_de_nacimiento, nombre_mascota, tipo_sangre, vacuna, enfermedad, tipo_raza, sexo, telefono, imagen FROM mascotas WHERE rut = '$rut'";
$res = $mysqli->query($consulta);
while($row = $res->fetch_assoc()){

	$imagen = $row['imagen'];
	
	ob_start();

    require('libreria/doc181-html-ca/fpdf.php');
    
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',15);
    
    $text = "Nombre: " . $row['nombre_dueno'];
    $text2 = "Rut: " . $row['rut'];
    $text3 = "Nombre Mascota: " . $row['nombre_mascota'];
    $text4 = "Tipo de Sangre: " . $row['tipo_sangre'];
    $text5 = "Vacuna: " . $row['vacuna'];
    $text6 = "Enfermedad: " . $row['enfermedad'];
    $text7 = "Tipo de Raza: " . $row['tipo_raza'];
    $text8 = "Sexo: " . $row['sexo'];
    $text9 = "Telefono: " . $row['telefono'];

    $pdf->Cell(1,1,$text);
    $pdf->Cell(1,9,$text2);
	$pdf->Cell(1,17,$text3);
    $pdf->Cell(1,25,$text4);
    $pdf->Cell(1,33,$text5);
    $pdf->Cell(1,41,$text6);
    $pdf->Cell(1,49,$text7);
    $pdf->Cell(1,57,$text8);
    $pdf->Cell(1,65,$text9);
    $pdf -> Image("Usuarios/".$rut."/nuevaImagen.jpg",10,55,40);
    $pdf->Image("Usuarios/".$rut."/".$rut.".png",10,80,40);
	$filename = $row['rut'].".pdf";
	$directorio = 'C:/xampp/htdocs/AyudantiaMultimedia/login/PDFS/';
	$pdf->Output($directorio.$filename,'I');
    ob_end_flush();
}}

 ?>