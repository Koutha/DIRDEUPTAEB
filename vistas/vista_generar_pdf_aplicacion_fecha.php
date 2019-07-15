<?php ob_start();
?>

<html >
<head>
  <title>Aolicación de las pruebas por fecha</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style type="text/css">
   table{border: solid 1px;width: 100%;    border-spacing: 0;
    border-collapse: collapse;display: table;} 
   thead{background-color: orange;
    border: solid 1px;}
      tbody th{border: 1px solid #ddd;
     }
     th{width: 20%;}
    

  </style>

</head>



<body> 
	<div><img src="assets/images/cintillo.jpg" height="50" width="100%" >

          <center><h3>Evolución del atleta: <strong><?php echo $atleta['nombres']." ".$atleta['apellidos'];?></strong> C.I: <strong><?php echo $atleta['cedula_atleta'];?></strong> en un rango de fecha comprendido desde: <?php echo $_POST['fechainicio']." hasta: ".$_POST['fechafinal'];?>.</h3></center><br/>
          <table>
          <thead>
              <tr>
                  <th>Fecha</th>
                  <th>prueba</th>
                  <th>Resultado de la prueba</th>
              </tr>
          </thead>
          <tbody><?php foreach ($atletafecha as $afecha){ 
                  if (strtotime($afecha['fecha'])>=$fechainicial&&strtotime($afecha['fecha'])<=$fechafinal) {?>
              <tr class="tr"><?php $deficiente=0; $regular=0; $bueno=0; $excelente=0; ?>
                  <th><?php echo $afecha['fecha'] ?></th>
                  <th><?php echo $afecha['nombre'];?></th>
                  <th><?php if ($afecha['condicion']=='1') {
                      if ($afecha['medicion']<=$afecha['rango1']) {$deficiente=$deficiente+1; echo $afecha['medicion']." el  resultado es deficiente";
                      }
                      elseif (($afecha['medicion']>$afecha['rango1']) && ($afecha['medicion']<= $afecha['rango2'])){$regular=$regular+1; echo $afecha['medicion']." el  resultado es regular";
                      }
                      elseif (($afecha['medicion']>$afecha['rango2']) && ($afecha['medicion']<=$afecha['rango3'])){$bueno=$bueno+1; echo $apruebas['medicion']." el  resultado es bueno";
                      }
                      else { $excelente=$excelente+1; echo $afecha['medicion']." el  resultado es excelente";
                      }} 
                  else{if ($afecha['medicion']>=$afecha['rango1']) {$deficiente=$deficiente+1; echo $afecha['medicion']." el  resultado es deficiente";
                      }
                      elseif (($afecha['medicion']<$afecha['rango1']) && ($afecha['medicion']>= $afecha['rango2'])){$regular=$regular+1; echo $afecha['medicion']." el  resultado es regular";
                      }
                      elseif (($afecha['medicion']<$afecha['rango2']) && ($afecha['medicion']>=$afecha['rango3'])){$bueno=$bueno+1; echo $afecha['medicion']." el  resultado es bueno";
                      }
                        else {$excelente=$excelente+1; echo $afecha['medicion']." el  resultado es excelente";
                      }}?></th>
              </tr>
          <?php }} ?>
                                            
          </tbody>
          <!--<h3>el porcentaje de cualitativo de las pruebas para deficiente: <?php echo $deficiente*100/4; ?>%, para regular: <?php echo $regular*100/4; ?>%, para bueno: <?php echo $bueno*100/4; ?>%, para exelente: <?php echo $excelente*100/4; ?>%, </h3>-->
          </table><br/>
          <center><h4>Listado emitido por la Dirección de Deportes de la Universidad Politécnica 
            Territorial Andres Eloy Blanco (UPTAEB), en Barquisimeto-Lara el día <?php echo $fecha1;?>.<br/>
            Válido solo por el <?php  if ($fecha>=$fase) {
         echo "2do lapso ".date('Y')." (Julio-Diciembre)";
        }else{echo "1er lapso ".date('Y')." (Enero-Junio)";} ?>.</h4></center></p><br/><br/><br/><br/>
          <center><h3>_______________________________________</h3></center>
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
$filename =  'Evolución por fecha '.$atleta['nombres'].' '.$atleta['cedula_atleta'].' desde '.$_POST['fechainicio'].' hasta '.$_POST['fechafinal'].'.pdf';
$dompdf->stream($filename, array("attachment" =>0));
?>