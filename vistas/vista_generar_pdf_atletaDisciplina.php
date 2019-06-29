<?php ob_start();

?>

<html >
<head>
  <title>Registros en la disciplina</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style type="text/css">
   table{ width: 100%;} 
   thead{background-color: orange;
    border: solid 1px;}
     tbody{border: solid 1px;}
     th{width: 20%;}
    

  </style>

</head>



<body> 
	<div><img src="assets/images/cintillo.jpg" height="50" width="100%" >

          <center><h3>Lista de atletas registrados en la disciplina de: <strong><?php echo $disciplina['nombre'];?>.</strong></h3></center><br/>
          <table>
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cedula</th>
                  <th>PNF</th>
                  <th>Trayecto</th>
              </tr>
          </thead>
          <tbody><?php foreach ($atletaDisciplinas as $aDisciplina){ ?>
          <?php if($aDisciplina['id_disciplina']==$id_disciplina){ ?>
              <tr><?php $atleta = $Oatleta->consultarDatos($aDisciplina['cedula_atleta']);?>
                  <th><?php echo $atleta['nombres'] ?></th>
                  <th><?php echo $atleta['apellidos']; ?></th>
                  <th><?php echo $aDisciplina['cedula_atleta']; ?></th>
                  <th><?php $Opnf->setid_pnf($atleta['id_pnf']);
                  $pnf = $Opnf->consultarid_Pnf();
                  echo $pnf['nombre'];?></th>
                  <th><?php echo $atleta['trayecto']; ?></th>
              </tr>
          <?php }} ?>
                                            
          </tbody>
          </table><br/>
          <center><h4>Listado emitido por la Dirección de Deportes de la Universidad Politécnica 
            Territorial Andres Eloy Blanco (UPTAEB), en Barquisimeto-Lara el día <?php echo $fecha1;?>.<br/>
            Válido solo por el <?php  if ($fecha>=$fase) {
         echo "2do lapso ".date('Y')." (Junio-Diciembre)";
        }else{echo "1er lapso ".date('Y')." (Enero-Junio)";} ?>.</h4></center></p><br/><br/><br/><br/>
          <center><h3>_______________________________________</h3></center><br/>
        <center><h3>Lcdo Alfredo Perez.</h3></center>
        <center><h3>Jefe de la Dirección de deportes.</h3></center>


           </body>


<html/>


<?php 
require_once("assets/dompdf/dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf = $dompdf->output();
$filename =  'lista '.$disciplina['nombre'].$fecha1.'.pdf';
$dompdf->stream($filename, array("attachment" =>0));
?>