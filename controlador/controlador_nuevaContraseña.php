<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['logg']) && $_SESSION['logg'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
        <a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;   
    }
    else if(isset($_POST['submit']) && $_POST['submit']=='nuevaContraseña'){
            if (isset ($_POST['passn']) && $_POST['passn']!=$_POST['rpassn']){
                //verificamos si las contraseñas coinciden
                $pass=0;
                require('vistas/vista_nuevaContraseña.php'); 
            }else{ //coinciden las contraseñas enviadas
                include_once('modelos/modelo_usuario.php');
                include_once('modelos/modelo_bitacora.php');
                $Obitacora=new Cbitacora();
                $usuario=new usuario();
                $username=$_SESSION['username'];
                 
                    //continua el flujo por POST sin conflictos para registrar
                        $hash=password_hash($_POST['passn'],PASSWORD_DEFAULT);
                        // end cifrado
                        $usuario->actualizarContrasena($username, $hash);
                        $t_usuario=$usuario->getbyuser($username);
                        $fecha=date('d/m/y');
                        $hora=date('H:i:s');
                        $actividad="Recupero su contraseña";
                        $Obitacora->setid_usuarios($t_usuario['id_usuario']);
                        $Obitacora->setfecha($fecha);
                        $Obitacora->sethora($hora);
                        $Obitacora->setactividad($actividad);
                        $Obitacora->registrarbitacora();
                        unset ($SESSION['username']);
                        session_destroy();
                        header('Location:?action=ingresar&recupero=1'); 
                 
                    }
                }
            
        
    else {$username=$_SESSION['username'];
        require('vistas/vista_nuevaContraseña.php');
    }
    
} 

else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  