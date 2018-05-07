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
        include_once('modelos/modelo_disciplina.php');
        $Opdc= new Cpdc();
        $Odisciplina= new Cdisciplina();
        $disciplinas=$Odisciplina->consultarTodos();
        $nombre_pdc=$_POST['nombre_pdc'];
        $pdc=$Opdc->consultarDatos($nombre_pdc);
        if (isset($_POST['registrarAtletasPdc'])) { //input hidden que se envia al hace submit
            echo 'hola';
            $fecha_inicio= $pdc['fecha_inicio'];
            $fecha_fin= $pdc['fecha_fin'];
            $id_pdc=$pdc['id_pdc'];
            $periodo_planificacion=$Opdc->determinarPeriodoPorDias($fecha_inicio,$fecha_fin);
            foreach ($periodo_planificacion as $dia) { //para registrar cada dia del intervalo recibido
                $fecha=$dia['begin']->format('Y-m-d H:i:s');
                $Opdc->registrarDiaPdc($fecha,$id_pdc);
                $dia_pdc=$Opdc->consultarAplicacion($fecha,$id_pdc);
                foreach ($_POST['atletas'] as $cedula_atleta) { //para registrar todos los atletas en cada dia
                    $Opdc->aplicarPdc($cedula_atleta, $dia_pdc['id_dp']);
                }
            }
            $_SESSION['registro']= 1;
            echo 'registre';
            header('Location:?action=registrarAplicacionDiaPdc&id='.$id_pdc);
        }else{ //primera entrada desde seleccion en calendario
            
            $atletas = $Opdc->consultarADP($pdc['id_disciplina']); //atletas por disciplina por pdc
            require('vistas/vista_asignarAtletaPdc.php');
        }
    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>