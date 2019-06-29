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
        include_once('modelos/modelo_atleta.php');
        include_once('modelos/modelo_disciplina.php');
        include_once('modelos/modelo_Pnf.php');
        $Opnf= new Cpnf();
        $Oatleta= new Catleta();
        $Odisciplina= new Cdisciplina();
        date_default_timezone_set('America/caracas');
        if (isset($_GET['at'])) { //entra a la consultar por alteta
            if (isset($_GET['const'])) { //selecciono un atleta
                $cedula_atleta=$_GET['atleta'];
                $atleta = $Oatleta->consultarDatos($cedula_atleta);
                $atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($atleta['cedula_atleta']);
                $fecha=strtotime(date('Y/m/d'));
                $fecha1=date('d/m/Y');
                $fase=strtotime(date('Y/6/1'));
                require('vistas/vista_generar_pdf_constancia.php');
               
            }
            else if (isset($_GET['atleta'])) { //selecciono un atleta
                $cedula_atleta=$_GET['atleta'];
                $atleta = $Oatleta->consultarDatos($cedula_atleta);
                $atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($atleta['cedula_atleta']);
                $Opnf->setid_pnf($atleta['id_pnf']);
                $atletaPNF = $Opnf->consultarid_Pnf();
                require('vistas/vista_generar_pdf_atleta.php');
            } else{ //primera entrada a la consultar por atleta - no se han seleccionado atletas
                $todos=$Oatleta->consultarTodos(); 
                    require('vistas/vista_generarReportesAtleta.php');
                }
        }else if (isset($_GET['disciplina'])) { // selecciono una disciplina
                $id_disciplina=$_GET['disciplina'];
                $atletaDisciplinas=$Odisciplina->consultarTodosad();
                $Odisciplina->setid_disciplina($id_disciplina);
                $disciplina = $Odisciplina->consultarid();
                $pnf = $Opnf->consultaTodo();
                $fecha=strtotime(date('Y/m/d'));
                $fecha1=date('d/m/Y');
                $fase=strtotime(date('Y/6/1'));
                require('vistas/vista_generar_pdf_atletaDisciplina.php');
            }else{ //primera entrada desde el menu para mostrar todos los programas
                $disciplinas=$Odisciplina->consultarTodos();
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
