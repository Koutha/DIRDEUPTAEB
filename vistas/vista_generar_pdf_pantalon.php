<?php ob_start();
?>

<html >
<head>
  <title>Reporte de discapacidad</title>
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

          <center><h3>listado de pantalon por tallas.</h3></center><br/>
          <table>
          <thead>
              <tr>
                  <th>XS</th>
                  <th>S</th>
                  <th>M</th>
                  <th>L</th>
                  <th>XL</th>
                  <th>XXl</th>
              </tr>
          </thead>
          <tbody><?php
          $XS=0;$S=0;$M=0;$L=0;$XL=0;$XXL=0; 
          foreach ($atletat as $key => $at) { 
            $atleta = $Oatleta->consultarDatos($at['cedula_atleta']);?>
                <?php switch ($atleta['talla_pantalon']) {
                    case 'XS':
                        $XS=$XS+1;
                        break;
                    case 'S':
                        $S=$S+1;
                        break;
                    case 'M':
                        $M=$M+1;
                        break;
                    case 'L':
                        $L=$L+1;
                        break;
                    case 'XL':
                        $XL=$XL+1;
                        break;
                    case 'XXL':
                        $XXL=$XXL+1;
                        break;                    
                    }
                    }?>
                <tr>
                    <th><?php echo $XS ?></th>
                    <th><?php echo $S ?></th>
                    <th><?php echo $M ?></th>
                    <th><?php echo $L ?></th>
                    <th><?php echo $XL ?></th>
                    <th><?php echo $XXL ?></th>
                </tr>
          
                                            
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
$filename =  'Reporte pantalon por tallas'.$fecha1.'.pdf';
$dompdf->stream($filename, array("attachment" =>0));
?>