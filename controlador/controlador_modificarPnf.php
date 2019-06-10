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
    } else if (isset($_POST['submit']) or isset($_GET['id_pnf'])) {
        if (isset($_POST['id_pnf'])) {
            $id_pnf = $_POST['id_pnf'];
        } else if (isset($_GET['id_pnf'])) {
            $id_pnf = $_GET['id_pnf'];
        }
        include_once('modelos/modelo_Pnf.php');
        require_once ('modelos/modelo_bitacora.php');
        require_once ('modelos/modelo_usuario.php');
        $Obitacora=new Cbitacora();
        $Ousuario=new usuario();
        $username=$_SESSION['username'];
        $t_usuario=$Ousuario->getbyuser($username);
        $id_usuario=$t_usuario['id_usuario'];
        $fecha=date('d/m/y');
        $hora=date('h:i:s');
        $actividad="Modifico un Pnf";
        $Obitacora->setid_usuarios($id_usuario);
        $Obitacora->setfecha($fecha);
        $Obitacora->sethora($hora);
        $Obitacora->setactividad($actividad);
        $Obitacora->registrarbitacora();
        $Opnf = new Cpnf();
        $Opnf->setid_pnf($id_pnf);
        $user = $Opnf->consultarid_Pnf();
		$todos=$Opnf->consultaTodo();
        if(isset($_POST['nombre'])){
                    $nombre= $_POST['nombre'];
                    $Opnf->setnombre($nombre);
                    $result = $Opnf->consulta();
                    if ($result > 0 && $user['nombre'] != $nombre){
                        $existe = 1;
                        require('vistas/vista_modificarPnf.php');
                    } 
                    else { 
                        $coordinador=$_POST['coordinador'];
                        $Opnf->setcoordinador($coordinador);
                        //aca  guardar en la base de datos
                        $Opnf->actualizarpnf();
                         
                        $actualizo = 1;
                       
                        $todos=$Opnf->consultaTodo(); 
                        require_once('vistas/vista_consultarPnf.php');
                    }
        }    
        else{
            require('vistas/vista_modificarPnf.php');
        }
    }
        
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
