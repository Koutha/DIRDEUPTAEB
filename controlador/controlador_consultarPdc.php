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
        if (isset($_GET['id'])) {
            $id=$_GET['id'];
            $pdc=$Opdc->consultarDatos($id);
            require('vistas/vista_consultarPdc.php');
        }else if(isset($_SESSION['imgCorrect'])&& $_SESSION['imgCorrect'] ==1){
            unset($_SESSION['imgCorrect']);
            $pdc=$Opdc->consultarTodos();
            require('vistas/vista_consultarTodosPdc.php');
            }else{
                header('Location:?action=sindex');
            }
    }  
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  