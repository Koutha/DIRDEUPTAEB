<?php ob_start();

?>

<html >
<head>
  <title>Constancia atleta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>



<body> 
	<div><img src="assets/images/cintillo.jpg" height="50" width="100%" >
          </div><div>
          <center><h3>CONSTANCIA</h3></center><br/>

          <p>Quien subscribe, Jefe de la Dirección de Deportes de la Universidad Politécnica Territorial del Estado Lara Andres Eloy 
          	Blanco (UPTAEB), hace constar que el (la) Ciudadano (a):</p><br/>
          <center><h3><?php echo $atleta['apellidos']." ".$atleta['nombres']; $nombre=$atleta['nombres'].$atleta['cedula_atleta'];?></h3></center><br/>
          <p>Cedula de Identidad N°:<strong><?php echo $atleta['cedula_atleta'];?></strong> es atleta regular en la Dirección de Deportes en el lapso 
            <?php  if ($fecha>=$fase) {
         echo "|-".date('Y')." JUNIO-DICIEMBRE en la disciplina:";
        }else{echo "|-".date('Y')." ENERO-JUNIO en la disciplina:";} ?></p><br/>
          <center><h3><?php echo $atletaDisciplinas[0]['nombre'].'<br/>';
                      if (isset($atletaDisciplinas[1]['nombre'])) {
                           echo $atletaDisciplinas[1]['nombre'];
                      } ?></h3></center><br/>
          <p>Así mismo; se hace constar que se ha observado buen rendimiento en dicha disciplina.</p><br/>
          <p>Constancia que se expide a peticion de parte interesada en Barquisimeto el dia: <strong><?php echo $fecha1;?></strong></p><br/><br/><br/><br/>
          <center><h3>_______________________________________</h3></center><br/>
  		  <center><h3>Lcdo Alfredo Perez</h3></center><br/>
  		  <center><h3>Jefe de la Dirección de deportes</h3></center><br/></div>
           


           </body>


<html/>


<?php 
require_once("assets/dompdf/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename =  'Constancia '.$nombre.'.pdf';
$dompdf->stream($filename, array("attachment" =>0));
?>