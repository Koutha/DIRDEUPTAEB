<?php ob_start();
?>

<html >
<head>
  <title>Aolicación de las pruebas</title>
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

          <center><h3>Evolución del atleta: <strong><?php echo $todosa['nombres']." ".$todosa['apellidos'];?></strong> C.I: <strong><?php echo $todosa['cedula_atleta'];?></strong> en las diversas pruebas.</h3></center><br/>
          <table>
          <thead>
              <tr>
                  <th>prueba</th>
                  <th>Fecha</th>
                  <th>Resultado de la prueba</th>
              </tr>
          </thead>
          <tbody><?php foreach ($todosap as $apruebas){ ?>
              <tr class="tr"><?php $deficiente=0; $regular=0; $bueno=0; $excelente=0; ?>
                  <th><?php foreach ($todosp as $pruebas){ if ($pruebas['id_prueba']==$apruebas['id_prueba']) {$condicion=$pruebas['condicion'];
                  $rango1=$pruebas['rango1'];$rango2=$pruebas['rango2'];$rango3=$pruebas['rango3'];$rango4=$pruebas['rango4'];
                    echo $pruebas['nombre'];}}?></th>
                  <th><?php echo $apruebas['fecha'] ?></th>
                  <th><?php if ($condicion=='1') {
                      if ($apruebas['medicion']<=$rango1) {$deficiente=$deficiente+1; echo $apruebas['medicion']." el  resultado es deficiente";
                      }
                      elseif (($apruebas['medicion']>$rango1) && ($apruebas['medicion']<= $rango2)){$regular=$regular+1; echo $apruebas['medicion']." el  resultado es regular";
                      }
                      elseif (($apruebas['medicion']>$rango2) && ($apruebas['medicion']<=$rango3)){$bueno=$bueno+1; echo $apruebas['medicion']." el  resultado es bueno";
                      }
                      else { $excelente=$excelente+1; echo $apruebas['medicion']." el  resultado es excelente";
                      }} 
                  else{if ($apruebas['medicion']>=$rango1) {$deficiente=$deficiente+1; echo $apruebas['medicion']." el  resultado es deficiente";
                      }
                      elseif (($apruebas['medicion']<$rango1) && ($apruebas['medicion']>= $rango2)){$regular=$regular+1; echo $apruebas['medicion']." el  resultado es regular";
                      }
                      elseif (($apruebas['medicion']<$rango2) && ($apruebas['medicion']>=$rango3)){$bueno=$bueno+1; echo $apruebas['medicion']." el  resultado es bueno";
                      }
                        else {$excelente=$excelente+1; echo $apruebas['medicion']." el  resultado es excelente";
                      }}?></th>
              </tr>
          <?php } ?>
                                            
          </tbody>
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
$filename =  'Evolución '.$todosa['nombres'].' '.$todosa['cedula_atleta'].' '.$fecha1.'.pdf';
$dompdf->stream($filename, array("attachment" =>0));
?>