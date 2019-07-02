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
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
        $Opdc= new Cpdc();
        $Odisciplina= new Cdisciplina();
        $disciplinas=$Odisciplina->consultarTodos();
        $id_pdc= $_POST['id_pdc'];
        $pdc=$Opdc->consultarAplicacionDiaTodosAsignados($id_pdc);
        require('vistas/vista_consultarAplicacionPdcDias.php');
     
        }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  