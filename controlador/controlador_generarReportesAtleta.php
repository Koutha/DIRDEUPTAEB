<?php
session_start();

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