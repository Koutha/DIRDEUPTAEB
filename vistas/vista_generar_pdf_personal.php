<?php ob_start();

?>

<html >
<head>
  <title>Ficha de personal</title>
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

          <center><h3>FICHA DE PERSONAL</h3></center>
          <center><h2>Datos personales:</h2></center>
          <table><tr>
          <td class="img"><img src="<?php echo $personal['dir_foto'];?>" height="200" width="150px" ></td>
          <td class="img"><p>Nombres: <?php echo $personal['nombres'];?></p>
          <p>Apellidos: <?php echo $personal['apellidos'];?></p>
          <p>Cedula de Identidad N°: <?php echo $personal['cedula_et'];?></p>
          <p>Cargo: <?php echo $personal['cargo'];?></p>
          <p>Correo: <?php echo $personal['correo']; $nombre=$personal['nombres'].$personal['cedula_et'];?></p>
          </td></tr> </table>
          
          <center><h2>Datos deportivos:</h2></center>
          <table><tr> <td>
          <p>Discipllinas en las que labora: <?php echo $personalDisciplinas[0]['nombre'].', ';
                      if (isset($personalDisciplinas[1]['nombre'])) {
                           echo $personalDisciplinas[1]['nombre'];
                      } ?></p></td></tr></table>
          
          </div>
           


           </body>


<html/>


<?php 
require_once("assets/dompdf/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename =  'Ficha_personal '.$nombre.'.pdf';
$dompdf->stream($filename, array("attachment" =>0));
?>