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
        require('modelos/modelo_usuario.php');
        require('modelos/modelo_pruebas.php');
        $Opruebas=new Cprueba();
        $Ousuario=new usuario();
        $Opnf= new Cpnf();
        $Oatleta= new Catleta();
        $fecha=strtotime(date('Y/m/d'));
        $fecha1=date('d/m/Y');
        $fase=strtotime(date('Y/6/1'));
        $Odisciplina= new Cdisciplina();
        date_default_timezone_set('America/caracas');
        $atletat = $Oatleta->consultarTodos();
        if (isset($_POST['selectReporte'])) {
        switch ($_POST['selectReporte']) {
                    case '1':
                        $Oatleta->setInfo_discapacidad("");
                        $atletam = $Oatleta->consultarAtletaMedico();
                        if ($atletam>0) {
                        require('vistas/vista_generar_pdf_Discapacidad.php');
                        }else{
                            $discapacidad=0;
                        }
                        break;
                    case '2':
                        if (isset($_POST['estaturamin'])&isset($_POST['pesomin'])) {
                            $atletatp = $Oatleta->consultarAtletaTallaPeso($_POST['estaturamin'],$_POST['estaturamax'],$_POST['pesomin'],$_POST['pesomax']);
                            if ($atletatp>0) {
                                require('vistas/vista_generar_pdf_Talla_Peso.php');
                            }else{
                                $atletaestapeso=0;
                                $selectReporte=$_POST['selectReporte'];
                                require('vistas/vista_generarReportesPorParametros.php');
                            }
                        }else{
                            $selectReporte=$_POST['selectReporte'];
                            require('vistas/vista_generarReportesPorParametros.php');
                        }
                        break;
                    case '3':
                        require('vistas/vista_generar_pdf_franela.php');
                        break;
                    case '4':
                        require('vistas/vista_generar_pdf_pantalon.php');
                        break;
                    case '5':
                        require('vistas/vista_generar_pdf_Shorts.php');
                        break;
                    case '6':
                        $zapatos = $Oatleta->consultarTodoszapato();
                        require('vistas/vista_generar_pdf_zapatos.php');
                        break;
                    case '7':
                        require('vistas/vista_generar_pdf_gorra.php');
                        break;
                    case '8':
                        require('vistas/vista_generar_pdf_chaqueta.php');
                        break;
                    case '9':
                        $zapatos = $Oatleta->consultarTodoszapato();
                        require('vistas/vista_generar_pdf_tallas.php');
                        break;
                    case '10':
                        if (isset($_POST['id_disciplina'])) {
                            $Oatleta->setInfo_discapacidad("");
                            $atletaDD = $Oatleta->consultarAtletasPorDisciplinamedicos($_POST['id_disciplina']);
                            $Odisciplina->setid_disciplina($_POST['id_disciplina']);
                            $disciplina = $Odisciplina->consultarid();
                            if ($atletaDD>0) {
                                require('vistas/vista_generar_pdf_Disciplina_Discapacidad.php');
                            }else{
                                $atletadisciplinadiscapacidad=0;
                                $disciplinas=$Odisciplina->consultarTodos();
                                $selectReporte=$_POST['selectReporte'];
                                require('vistas/vista_generarReportesPorParametros.php');
                            }
                        }else{
                            $selectReporte=$_POST['selectReporte'];
                            $disciplinas=$Odisciplina->consultarTodos();
                            require('vistas/vista_generarReportesPorParametros.php');
                        }
                        break;
                    case '11':
                        if (isset($_POST['id_disciplina'])&isset($_POST['id_pnf'])) {
                            $atletaDpnf = $Oatleta->consultarAtletasPorDisciplinapnf($_POST['id_disciplina'], $_POST['id_pnf']);
                            $Odisciplina->setid_disciplina($_POST['id_disciplina']);
                            $disciplina = $Odisciplina->consultarid();
                            $Opnf->setid_pnf($_POST['id_pnf']);
                            $atletaPNF = $Opnf->consultarid_Pnf();
                            if ($atletaDpnf>0) {
                                require('vistas/vista_generar_pdf_Disciplina_PNF.php');
                            }else{
                                $atletadisciplinapnf=0;
                                $pnf = $Opnf->consultaTodo();
                                $disciplinas=$Odisciplina->consultarTodos();
                                $selectReporte=$_POST['selectReporte'];
                                require('vistas/vista_generarReportesPorParametros.php');
                            }
                        }else{
                            $selectReporte=$_POST['selectReporte'];
                            $pnf = $Opnf->consultaTodo();
                            $disciplinas=$Odisciplina->consultarTodos();
                            require('vistas/vista_generarReportesPorParametros.php');
                        }
                        break;
                    }
                }    
                if (isset($_POST['selectfecha'])) {
                        $cedula_atleta=20350027;
                        $atleta = $Oatleta->consultarDatos($cedula_atleta);
                        $fechainicial=strtotime($_POST['fechainicio']);
                        $fechafinal=strtotime($_POST['fechafinal']);
                        $atletafecha = $Opruebas->consultarapfecha($cedula_atleta);
                        foreach ($atletafecha as $key => $value) { 
                            if (strtotime($value['fecha'])>=$fechainicial&&strtotime($value['fecha'])<=$fechafinal) {
                                $atletaaplifecha=1;
                            }
                        }
                        if ($atletaaplifecha==1) {
                            require('vistas/vista_generar_pdf_aplicacion_fecha.php');
                        }else{
                            $atletaaplifecha=0;
                            header('Location:?action=consultarApliPruebas&atletaaplifecha=0&cedula_atleta='.$cedula_atleta);
                        }
                     
        }
        if (isset($_GET['at'])) { //entra a la consultar por alteta
            if (isset($_GET['const'])) { //selecciono un atleta
                $cedula_atleta=$_GET['atleta'];
                $atleta = $Oatleta->consultarDatos($cedula_atleta);
                $atletaDisciplinas=$Odisciplina->getDisciplinasPorAtleta($atleta['cedula_atleta']);
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
