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
            
            $todos=$Oatleta->consultarTodos(); 
            require('vistas/vista_consultarAplicacionPdcAtletas.php');
        }else if (isset($_GET['programa'])) {
                echo 'selecione un programa';

            }else{ //primera entrada a la consultar por programa
                require('vistas/vista_consultarAplicacionPdc.php');
            }
        
    }
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  