<?php ob_start();

?>

<html >
<head>
  <title>Ficha de atleta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style type="text/css">
   table{ width: 100%; } 
    td { width: 50%;
     }
     .img{width: 33%}

  </style>

</head>



<body> 
	<div><img src="assets/images/cintillo.jpg" height="50" width="100%" >

          <center><h3>FICHA DE ATLETA</h3></center>
          <center><h2>Datos personales:</h2></center>
          <table><tr>
          <td class="img"><img src="<?php echo $atleta['dir_foto'];?>" height="200" width="150px" ></td>
          <td class="img"><p>Nombres: <?php echo $atleta['nombres'];?></p>
          <p>Apellidos: <?php echo $atleta['apellidos'];?></p>
          <p>Cedula de Identidad N°: <?php echo $atleta['cedula_atleta'];?></p>
          <p>Fecha de nacimiento: <?php echo $atleta['fecha_nacimiento'];?></p></td>
            <td class="img"><p>Direción: <?php echo $atleta['direccion'];?></p>
          <p>Telefono: <?php echo $atleta['tel_movil'];?>  <?php echo $atleta['tel_fijo'];?></p>
          <p>Correo: <?php echo $atleta['correo'];?></p>
          <p>Sexo: <?php echo $atleta['sexo'];?></p></td></tr> </table>
          
          <center><h2>Datos académicos/deportivos:</h2></center>
          <table><tr> <td><p>PNF: <?php echo $atletaPNF['nombre']; $nombre=$atleta['nombres'].$atleta['cedula_atleta'];?></p>
          <p>Trayecto: <?php echo $atleta['trayecto'];?></p></td><td>
          <p>Año de ingreso: <?php echo $atleta['año_ingreso'];?></p>
          <p>Discipllinas en las que participa: <?php echo $atletaDisciplinas[0]['nombre'].'<br/>';
                      if (isset($atletaDisciplinas[1]['nombre'])) {
                           echo $atletaDisciplinas[1]['nombre'];
                      } ?></p></td></tr></table>
          
          <center><h2>Datos médicos:</h2></center>
          <table><tr> <td><p>Estatura: <?php echo $atleta['estatura'];?></p>
          <p>Peso: <?php echo $atleta['peso'];?></p>
          <p>Tipo de sangre: <?php echo $atleta['tipo_sangre'];?></p>
          <p>Contactar en caso de Emergencia a: <?php echo $atleta['contacto_emergencia'];?></p></td><td>
          <p>Al número: <?php echo $atleta['tel_contacto'];?></p>
          <p>Alergias: <?php echo $atleta['info_alergias'];?></p>
          <p>Discapacidad: <?php echo $atleta['info_discapacidad'];?></p>
          <p>Observaciones médicas: <?php echo $atleta['observaciones'];?></p></td></tr>
          </table></div>
           


           </body>


<html/>


<?php 
require_once("assets/dompdf/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename =  'Ficha '.$nombre.'.pdf';
$dompdf->stream($filename, array("attachment" =>0));
?>