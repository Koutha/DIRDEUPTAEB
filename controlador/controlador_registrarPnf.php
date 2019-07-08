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
    }
    else if (isset($_POST['submit']) && $_POST['submit']=='registrarPnf') {
           
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
            $actividad="registro un pnf";
            $Obitacora->setid_usuarios($id_usuario);
            $Obitacora->setfecha($fecha);
            $Obitacora->sethora($hora);
            $Obitacora->setactividad($actividad);
            $Obitacora->registrarbitacora();
            $Opnf= new Cpnf();
            $nombr=htmlspecialchars($_POST['nombre'],ENT_QUOTES);
            if ($Opnf->consulta($nombr)) {
                //si el nombre existe
                $existe= 1;
                require('vistas/vista_registrarPnf.php');
            }
            else{
                $nombre=htmlspecialchars($_POST['nombre'],ENT_QUOTES);
                $coordinador=htmlspecialchars($_POST['coordinador'],ENT_QUOTES);
                $Opnf->setnombre($nombre);
                $Opnf->setcoordinador($coordinador);
                //registrarlo
                $Opnf->registrarPnf();
               $registro= 1;
               require('vistas/vista_registrarPnf.php');
            }
    
        }
        else{
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
        if ($_SESSION['rol']==1) {
                require('vistas/vista_registrarPnf.php');
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
