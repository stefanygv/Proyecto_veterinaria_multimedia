<?php
include ('conexion.php');
if(isset($_GET['rut'])) {
$rut = $_GET['rut'];
$consulta = "SELECT * FROM dueno INNER JOIN mascota ON dueno.rut=mascota.rut";
$res = $mysqli->query($consulta);
    while ($row=$res->fetch_assoc()) { 
    
    $text ='   
        '.$row['nombre_dueno'].'
           '     
    ;
      $text2 ='   
        '.$row['rut'].'
           '       
    ;
      $text3 ='   
        '.$row['telefono'].'
           '       
    ;
      $text4 ='   
        '.$row['nombre_mascota'].'
           '       
    ;
       $text5 ='   
        '.$row['tipo_raza'].'
           '       
    ;
      $text6 ='   
        '.$row['sexo'].'
           '       
    ;
    }
   
    ob_start();

    require('libreria/tcpdf/tcpdf.php');
    
   $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetMargins(0, 1, 0, false); 
    $pdf->SetAutoPageBreak(10, 10); 
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->addPage();
    $pdf->Cell(30, 125, $text); //30 muevo rut hacia al lado, 50 hacia abajo
    $pdf->Cell(35, 125, $text2);
    $pdf->Cell(35, 125, $text3);
    $pdf->Cell(30, 125, $text4);
    $pdf->Cell(35, 125, $text5);
    $pdf->Cell(40, 125, $text6);
    $pdf -> Image("archivo/".$rut."/".$rut.".jpg",50,100,40);
    $pdf -> Image("archivo/".$rut."/".$rut.'QR'.".jpg",100,90,40);
   
    $text = '';
    
  $text .= '<br><br><br><br><br><br><br>
  FORMULARIO SISTEMA VETERINARIO<br><br><br><br><br>
       <div class="row">
          <div class="col-md-10">
        
      <table border="2" cellpadding="10">
        <thead>
          <tr>
            <th>NOMBRE</th>
            <th>RUT</th>
            <th>TELEFONO</th>
            <th>NOMBRE MASCOTA</th>
            <th>RAZA</th>
            <th>SEXO</th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
    ';
   
    $text .= '</table>';
    
  ;
 
 $pdf->writeHTML($text, true, 1, true, 1);
//$pdf->writeHTML($text2, true, 1, true, 1);
    $pdf->lastPage();
    $pdf->output('Reporte.pdf', 'I');
}?>