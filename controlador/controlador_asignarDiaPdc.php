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
        $pdc= $Opdc->consultarAplicacionDia($_POST['id_dp']);
        $id_pdc=$pdc['id_pdc'];
        $id_dp= $pdc['id_dp'];
        $end= new DateTime($pdc['fecha_dia']);
        $end->add(new DateInterval('PT16H')); //16 horas agregadas a la fecha de inicio
        $fin = (string)$end->format('Y-m-d h:i A');
        $atletas = $Opdc->consultarADP2($pdc['id_pdc'],$pdc['id_disciplina']); //registrados en la planificacion
        if (isset($_POST['registrarDiasPdc'])) {
            $tecnica_dia        = isset($_POST['tecnica_dia'])      ? $_POST['tecnica_dia']     : 0;
            $tactica_dia        = isset($_POST['tactica_dia'])      ? $_POST['tactica_dia']     : 0;
            $fisico_dia         = isset($_POST['fisico_dia'])       ? $_POST['fisico_dia']      : 0;
            $psicologico_dia    = isset($_POST['psicologico_dia'])  ? $_POST['psicologico_dia'] : 0;
            $velocidad_dia      = isset($_POST['velocidad_dia'])    ? $_POST['velocidad_dia']   : 0;
            $Opdc->aplicarDiasPdc($id_dp,$tecnica_dia,$tactica_dia,$fisico_dia,$psicologico_dia,$velocidad_dia);
            $_SESSION['registro']= 1;
            header('Location:?action=registrarAplicacionDiaPdc&id='.$id_pdc);
        }else{ //entrada desde el calendario para asignar el dia
            require('vistas/vista_asignarDiaPdc.php');
        }
        


    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>