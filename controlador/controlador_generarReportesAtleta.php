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
        include_once('modelos/modelo_atleta.php');
        include_once('modelos/modelo_disciplina.php');
        $Opdc= new Cpdc();
        $Oatleta= new Catleta();
        $Odisciplina= new Cdisciplina();
        $disciplinas=$Odisciplina->consultarTodos();
        $pdc=$Opdc->consultarTodos();
        if (isset($_GET['at'])) { //entra a la consultar por alteta
            if (isset($_GET['atleta'])) { //selecciono un atleta
                $cedula_atleta=$_GET['atleta'];
                $atleta = $Oatleta->consultarDatos($cedula_atleta);
                $atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($atleta['cedula_atleta']);
                $pdc_atleta= $Opdc->consultarEjecucionPdcAtleta($cedula_atleta);
                switch ($atleta['id_pnf']) {
                    case '1':
                        $pnf=' Administracion';
                        break;
                    case '2':
                        $pnf=' Ciencias de la Información';
                        break;
                    case '3':
                        $pnf=' Contaduría Publica';
                        break;
                    case '4':
                        $pnf=' Turismo';
                        break;
                    case '5':
                        $pnf=' Agroalimentación';
                        break;
                    case '6':
                        $pnf=' Higiene y seguridad laboral';
                        break;
                    case '7':
                        $pnf=' Informática';
                        break;
                    case '8':
                        $pnf=' Sistemas de calidad y ambiente';
                        break;
                    case '9':
                        $pnf=' Deportes';
                        break;
                }
                //dompdf
                $dompdf = new Dompdf();
                //html aqui
               
                $dompdf->load_html('
                    <html>
                        <head> 
                            <style>
                                .titulo{
                                    text-align: center;
                                    font-size: 14pt;
                                    font-weight: bold;
                                }
                                .subtitulo{
                                    text-align: center;
                                    font-size: 12pt;
                                    font-weight: bold;
                                }
                                .menu{  
                                    text-align: center;
                                    font-size: 14pt;
                                    font-weight: bold;
                                    height:10%;  
                                }
                                .foto{  
                                    height:150px; 
                                    float:left;  
                                    width:20%;
                                    margin-right:5px;
                                     

                                } 
                                .izquierda{  
                                     
                                    margin-right:5px;
                                    margin-left:5px;
                                    margin-top:5px;
                                    margin-bottom:5px;    
                                    float:left;  
                                    width:40%;  
                                }
                                .derecha{  
                                     
                                      
                                    float:right;  
                                    width:40%;  
                                }
                                <link href="assets/css/bootstrap.css" rel="stylesheet" />
                            </style> 
                        </head>
                        <body>

                            <div class="container-fluid" >
                                <div class="row">
                                    <div class="col-md-4"> 
                                    1111
                                    </div>
                                    <div class="col-md-4">
                                    222
                                    </div>
                                    <div class="col-md-4">
                                    333
                                    </div>
                                
                                </div>
                            </div>
                            <div >'.
                                '<img style="height: 47px;" src="assets/img/membrete.png">'.
                            '</div>'.
                                '<div class="titulo">'.
                                '<p>DIRECCIÓN DE DEPORTES UPTAEB</p>'.
                            '</div>'.
                            '<div class="subtitulo">'.
                                '<p>Ficha del atleta</p>'.
                            '</div>'.
                            '<div class ="foto">
                                <img style="height: 110px" src="assets/img/img_foto_atleta/203500272017-08-27-1310.jpg">
                            </div>'.
                            '<div class ="izquierda">
                                <p>Cedula: <span>V-</span>20350027</p>

                                <p>Nombres: Alvaro Sofi</p>

                                <p>Apellidos: Tirado Gil</p>
                            
                            
                                <p>Fecha de nacimiento: 1992-24-04</p>
                                <p>Dirección: Carrera 13 esq. Calle 18</p>
                                <p>Telefono movil: 04164645556</p>
                                <p>Telefono fijo: 04164645556</p>
                                <p>Correo: alvarot027@gmail.com</p>
                                <p>Sexo: masculino</p>
                                <p>Fecha de nacimiento: 1992-24-04</p>
                            </div>'.
                            '<div class ="derecha">
                                <p>Cedula: <span>V-</span>20350027</p>

                                <p>Nombres: Alvaro Sofi</p>

                                <p>Apellidos: Tirado Gil</p>
                            
                            
                                <p>Fecha de nacimiento: 1992-24-04</p>
                                <p>Fecha de nacimiento: 1992-24-04</p>
                                <p>Fecha de nacimiento: 1992-24-04</p>
                                <p>Fecha de nacimiento: 1992-24-04</p>
                                <p>Fecha de nacimiento: 1992-24-04</p>
                                <p>Fecha de nacimiento: 1992-24-04</p>
                                <p>Fecha de nacimiento: 1992-24-04</p>
                            </div>'.
                           
                                '<p>Datos Academicos</p>'.
                            
                         
                           

                        '</body>'.
                    '</html>'
            );

            // (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'portrait'); //tamaño y orientacion (landscape = horizontal, portrait = vertial)
            $dompdf->render();
            date_default_timezone_set('America/Caracas');
            $doctitle = 'FichaAtleta_'.strftime( "%Y-%m-%d_%H-%M-%S", time()); //titulo + fecha y hora
            $dompdf->stream(
                $doctitle,
                array(
                    "Attachment"=> false  //descarga automatica true - false
                )
            );
                //require('vistas/vista_consultarAplicacionPdcAtleta.php');
                echo 'selecione un atleta';
            } else{ //primera entrada a la consultar por atleta - no se han seleccionado atletas
                $todos=$Oatleta->consultarTodos(); 
                    require('vistas/vista_generarReportesAtleta.php');
                }
        }else if (isset($_GET['disciplina'])) { // selecciono una disciplina
                echo 'Selecione una disciplina';
            }else{ //primera entrada desde el menu para mostrar todos los programas
                
                require('vistas/vista_generarReportesAtletaDisciplina.php');
            }
    }
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
