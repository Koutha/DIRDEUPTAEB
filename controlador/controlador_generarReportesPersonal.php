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
        include_once('modelos/modelo_personal.php');
        include_once('modelos/modelo_disciplina.php');
        $Opersonal= new Cpersonal();
        $Odisciplina= new Cdisciplina();
        date_default_timezone_set('America/caracas');
        if (isset($_GET['pe'])) { //entra a la consultar por alteta
            if (isset($_GET['const'])) { //selecciono un atleta
                $cedula_personal=$_GET['personal'];
                $personal = $Opersonal->consultarDatos($cedula_personal);
                $personalDisciplinas=$Odisciplina->getDisciplinasPorPersonal($personal['cedula_et']);
                $fecha=strtotime(date('Y/m/d'));
                $fecha1=date('d/m/Y');
                $fase=strtotime(date('Y/6/1'));
                require('vistas/vista_generar_pdf_constancia_personal.php');
               
            }
            else if (isset($_GET['personal'])) { //selecciono un atleta
                $cedula_personal=$_GET['personal'];
                $personal = $Opersonal->consultarDatos($cedula_personal);
                $personalDisciplinas=$Odisciplina->getDisciplinasPorPersonal($personal['cedula_et']);
                require('vistas/vista_generar_pdf_personal.php');
            } else{ //primera entrada a la consultar por atleta - no se han seleccionado atletas
                $todos=$Opersonal->consultarTodos(); 
                    require('vistas/vista_generarReportesPersonal.php');
                }
        }else if (isset($_GET['disciplina'])) { // selecciono una disciplina
                $id_disciplina=$_GET['disciplina'];
                $personalDisciplinas=$Odisciplina->consultarTodospd();
                $Odisciplina->setid_disciplina($id_disciplina);
                $disciplina = $Odisciplina->consultarid();
                $fecha=strtotime(date('Y/m/d'));
                $fecha1=date('d/m/Y');
                $fase=strtotime(date('Y/6/1'));
                require('vistas/vista_generar_pdf_personalDisciplina.php');
            }else{ //primera entrada desde el menu para mostrar todos los programas
                $disciplinas=$Odisciplina->consultarTodos();
                require('vistas/vista_generarReportesPersonalDisciplina.php');
            }
    }
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
