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
        require_once ('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
            if ($_SESSION['rol']==1 or $Ousuario->consultarPermisosUsu("Eliminar Atleta",$_SESSION['id_usuario'])) {     
        include_once('modelos/modelo_atleta.php');
        include_once('modelos/modelo_disciplina.php'); 
        require_once ('modelos/modelo_bitacora.php');
        $Obitacora=new Cbitacora();
        $username=$_SESSION['username'];
        $t_usuario=$Ousuario->getbyuser($username);
        $id_usuario=$t_usuario['id_usuario'];
        $fecha=date('d/m/y');
        $hora=date('H:i:s');
        $actividad="Elimino un Atleta";
        $Obitacora->setid_usuarios($id_usuario);
        $Obitacora->setfecha($fecha);
        $Obitacora->sethora($hora);
        $Obitacora->setactividad($actividad);
        $Oatleta= new Catleta();
        $Odisciplina= new Cdisciplina();
        if (isset($_GET['id'])) {
            $id=htmlspecialchars($_GET['id'],ENT_QUOTES);
            $Oatleta->borrarAtleta($id);
            $Obitacora->registrarbitacora();
            $borrado = 1;
        }
        $todos=$Oatleta->consultarTodos(); 
        require('vistas/vista_consultarAtleta.php');
    }
            else{
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
  