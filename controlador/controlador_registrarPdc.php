<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//estan la sesion iniciada
    if ($now > $_SESSION['expire']) { //la sesion ya expiro
        session_destroy();
        echo "Su sesion a terminado,
        <a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    }
    else if (isset($_POST['submit']) && $_POST['submit']=='registrarPdc') {
            include_once('modelos/modelo_pdc.php');
            include_once('modelos/modelo_disciplina.php');
            $Opdc= new Cpdc();
            $Odisciplina= new Cdisciplina();
            $disciplinas=$Odisciplina->consultarTodos();
            $nombre=$_POST['nombre_pdc'];
            $pdc= $Opdc->consultarDatos($nombre);
            if ($pdc>0) {//validacion
                $existe=1;
                // echo 'entre por existe';
                require('vistas/vista_registrarPdc.php');
            }else if($_POST['tecnica']+$_POST['tactica']+$_POST['fisico']+$_POST['psicologico']+$_POST['velocidad']!=100){
                    //validacion del porcentaje
                    $porcentaje=1;
                    //echo 'porcentaje no valido';
                    require('vistas/vista_registrarPdc.php');
                }else if($_POST['fecha_inicio']>=$_POST['fecha_fin']){
                    //periodo invalido
                    $periodo=1;
                    echo 'periodo de fechas no valido';
                    require('vistas/vista_registrarPdc.php');
                    }else{
                        $descripcion=$_POST['descripcion'];
                        $id_disciplina=$_POST['id_disciplina'];
                        $tipo_pdc= $_POST['tipo_pdc'];
                        $fecha_inicio= $_POST['fecha_inicio'];
                        $fecha_fin= $_POST['fecha_fin'];
                        $tecnica= $_POST['tecnica'];
                        $tactica= $_POST['tactica'];
                        $fisico= $_POST['fisico'];
                        $psicologico= $_POST['psicologico'];
                        $velocidad= $_POST['velocidad'];
                        $Opdc->setNombre_pdc($nombre);
                        $Opdc->setDescripcion($descripcion);
                        $Opdc->setId_disciplina($id_disciplina);
                        $Opdc->setTipo_pdc($tipo_pdc);
                        $Opdc->setFecha_inicio($fecha_inicio);
                        $Opdc->setFecha_fin($fecha_fin);
                        $Opdc->setTecnica($tecnica);
                        $Opdc->setTactica($tactica);
                        $Opdc->setFisico($fisico);
                        $Opdc->setPsicologico($psicologico);
                        $Opdc->setVelocidad($velocidad);
                        $Opdc->registrarPdc();
                        $pdc_tmp=$Opdc->consultarDatos($nombre);
                        $periodo_planificacion=$Opdc->determinarPeriodoPorDias($fecha_inicio,$fecha_fin);
                        foreach ($periodo_planificacion as $dia) { 
                            $fecha=$dia['begin']->format('Y-m-d H:i:s');
                            $id_pdc=$pdc_tmp['id_pdc'];
                            $Opdc->registrarDiaPdc($fecha,$id_pdc);
                        }
                    
                        $registro= 1;
                        
                        unset($_POST);
                        $_SESSION['registro']=1;
                        //header('Location:?action=registrarPdc');
                        //require('vistas/vista_registrarPdc.php');
                        header('Location:?action=consultarPdc&id='.$pdc_tmp['nombre_pdc']);
                }
        }
        else{//entrada por enlace o get
            include_once('modelos/modelo_disciplina.php');
            $Odisciplina= new Cdisciplina();
            $disciplinas=$Odisciplina->consultarTodos();
            require('vistas/vista_registrarPdc.php');
        }
}
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
