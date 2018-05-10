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
        $end= new DateTime($pdc['fecha_dia']);
        $end->add(new DateInterval('PT16H')); //16 horas agregadas a la fecha de inicio
        $fin = (string)$end->format('Y-m-d h:i A');
        $atletas = $Opdc->consultarADP2($pdc['id_pdc'],$pdc['id_disciplina']); //registrados en la planificacion
        require('vistas/vista_asignarDiaPdc.php');

    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>