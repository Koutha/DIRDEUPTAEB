<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }else {
        if ($_SESSION['rol']==1) {
        include_once('modelos/modelo_pruebas.php');
        require_once ('modelos/modelo_bitacora.php');
        require_once ('modelos/modelo_usuario.php');
        $Obitacora=new Cbitacora();
        $Ousuario=new usuario();
        $username=$_SESSION['username'];
        $t_usuario=$Ousuario->getbyuser($username);
        $id_usuario=$t_usuario['id_usuario'];
        $fecha=date('d/m/y');
        $hora=date('H:i:s');
        $actividad="Elimino una Prueba";
        $Obitacora->setid_usuarios($id_usuario);
        $Obitacora->setfecha($fecha);
        $Obitacora->sethora($hora);
        $Obitacora->setactividad($actividad);
        $Oprueba= new Cprueba();
        if (isset($_GET['id_prueba'])) {
            $id_prueba=htmlspecialchars($_GET['id_prueba'],ENT_QUOTES);
            $Oprueba->setid_prueba($id_prueba);
            $Oprueba->borrarPrueba();
            $Obitacora->registrarbitacora();
            $borrado = 1;
        }
        $todos=$Oprueba->consultarTodosp(); 
        require('vistas/vista_consultarPruebas.php');
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
  