<?php ob_start();
?>

<html >
<head>
  <title>Reporte de atletas por disciplina y PNF</title>
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

          <center><h3>listado de atletas que pertenecen a la disciplina: <?php echo $disciplina['nombre'];?> y el <?php echo $atletaPNF['nombre'];?>.</h3></center><br/>
          <table>
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Cedula</th>
                  <th>Trayecto</th>
              </tr>
          </thead>
          <tbody><?php foreach ($atletaDpnf as $key => $aDpnf) { ?>
                <tr>
                    <th><?php echo $aDpnf['nombres'] ?></th>
                    <th><?php echo $aDpnf['apellidos']; ?></th>
                    <th><?php echo $aDpnf['cedula_atleta']; ?></th>
                    <th><?php echo $aDpnf['trayecto']; ?></th>
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
$filename =  'Reporte de disciplina '.$disciplina['nombre']." y pnf: ".$atletaPNF['nombre']." ".$fecha1.'.pdf';
$dompdf->stream($filename, array("attachment" =>0));
?>