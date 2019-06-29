<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }else if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
        //include_once('modelos/modelo_usuario.php');
        //$usuario= new usuario();
        //$todos=$usuario->consultarTodosPermisos();
        //$allusers=$usuario->listarAdm();
         //$valu=0;
         //include_once('modelos/modelo_base.php');
         //$Omodelo_base= new modelobase();
        include_once('modelos/modelo_bitacora.php');
        $Obitacora = new Cbitacora();
        $all = $Obitacora->getAutoSaves();
        //var_dump($all);
        $_SESSION['restoring'] = 1 ;
        unset($_SESSION['imgCorrect']);
    	require('vistas/vista_restoreAutoSave.php');
    }else{
        header('Location:?action=sindex');
    }
    
} 
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  