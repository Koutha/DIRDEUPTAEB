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
        include_once('modelos/modelo_Pnf.php');
        $Opnf= new Cpnf();
        if (isset($_GET['id_pnf'])) {
            $id_pnf=$_GET['id_pnf'];
            $Opnf->setid_pnf($id_pnf);
            $Opnf->borrarpnf();
            $borrado = 1;
        }
        $todos=$Opnf->consultaTodo(); 
        require('vistas/vista_consultarPnf.php');
    }
    
} 

else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  