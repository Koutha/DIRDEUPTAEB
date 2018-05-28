<?php
session_start();
require_once('assets/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
        <a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;   
    }else {
        include_once('modelos/modelo_pdc.php');
        include_once('modelos/modelo_disciplina.php');
        $Opdc= new Cpdc();
        $Odisciplina= new Cdisciplina();
        $disciplinas=$Odisciplina->consultarTodos();
        if (isset($_GET['programa'])) {
            $id=$_GET['programa'];
            $pdc=$Opdc->consultarDatos($id);
            $id_pdc=$pdc['id_pdc'];
            if ($Opdc->consultarADP2($pdc['id_pdc'],$pdc['id_disciplina'])) {
                $atletas = $Opdc->consultarADP2($pdc['id_pdc'],$pdc['id_disciplina']); //registrados en la planificacion
            }else{
                $atletas = 0; //No hay Atletas para la disciplina a la que pertenece el pdc
            }
            //dompdf
            $dompdf = new Dompdf();
            //html aqui
            $html_discipliplina = "";
            foreach ($disciplinas as $key => $value) {
                if($pdc['id_disciplina']==$value['id_disciplina']){
                    $html_discipliplina= $value['nombre'];
                }
            }
         
            $html_atletas = "";
            if (!empty($atletas)){
                foreach ($atletas as $key => $value) {
                    $html_atletas.= "<tr><td>".$value['cedula_atleta']."</td>";
                    $html_atletas.= "<td>".$value['nombres']."</td>";
                    $html_atletas.= "<td>".$value['apellidos']."</td></tr>";
                }
            }
            $fi = new DateTime($pdc['fecha_inicio']);
            $begin = $fi->format('Y-m-d h:i A');;
            $ff = $ff= new DateTime($pdc['fecha_fin']);
            $end = $ff->format('Y-m-d h:i A'); ;
            $dompdf->load_html('
                <head>
                    <style>
                    table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }
                    td, th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }
                    tr:nth-child(even) {
                        background-color: #dddddd;
                    }
                    body {
                        
                    }
                    </style>
                </head>'.
                '<body>'.   
                    '<div >'.
                        '<img style="height: 45px;width: 100%;" src="assets/img/membrete.png">'.
                    '</div>'.
                    
                    '<h2 style="text-align: center;">Programa Directo de Competencia</h2>'.
                    '<p><strong>Nombre del programa: </strong>'.$pdc['nombre_pdc'].'</p>'.
                    '<p><strong>Descripcion: </strong>'.$pdc['descripcion'].'</p>'.
                    '<p><strong>Tipo de planificación: </strong>'.$pdc['tipo_pdc'].'</p>'.
                    '<p><strong>Disciplina: </strong>'.$html_discipliplina.'</p>'.
                    '<p><strong>Fecha de inicio: </strong>'.$begin.'</p>'.
                    '<p><strong>Fecha de finalización: </strong>'.$end.'</p>'.
                    '<h3 style="text-align: center;">Aspectos a trabajar:</h3>'.
                    '<div style="text-align: center;">
                        <span>
                            Técnico: '.$pdc['tecnica'].'%
                        </span>
                        <span>
                            Físico: '.$pdc['fisico'].'%
                        </span>
                        <span>
                            Táctico: '.$pdc['tactica'].'%
                        </span>
                        <span>
                            Psicológico: '.$pdc['psicologico'].'%
                        </span>
                        <span>
                            Velocidad: '.$pdc['velocidad'].'%
                        </span>
                    </div>'.
                    '<h3 style="text-align: center;">Atletas asignados:</h3>'.
                    '<table>
                        
                          <tr>
                            <th>Cedula</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                          </tr>
                          '.$html_atletas.'
                    </table>'.
                '</body>'
            );

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait'); //tamaño y orientacion (landscape = horizontal, portrait = vertial)
            $dompdf->render();
            date_default_timezone_set('America/Caracas');
            $doctitle = 'PDC_'.strftime( "%Y-%m-%d_%H-%M-%S", time());
            $dompdf->stream(
                $doctitle,
                array(
                    "Attachment"=> false
                )
            );
        }else{
            $pdc=$Opdc->consultarTodos();
            require('vistas/vista_generarReportesPdc.php');
            }
    }  
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  