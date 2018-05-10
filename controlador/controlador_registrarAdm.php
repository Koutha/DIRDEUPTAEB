<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }
    else if(isset($_POST['submit']) && $_POST['submit']=='registrarAdm'){
            if (isset ($_POST['pass'])&& $_POST['pass']!=$_POST['rpass']){
                //verificamos si las contraseñas coinciden
                $pass=0;
                require('vistas/vista_registrarAdm.php'); 
            }
            else{
                include_once('modelos/modelo_usuario.php');
                include_once('modelos/modelo_personal.php');
                $Opersonal=new Cpersonal();
                $usuario=new usuario();
                if ($usuario->getbyuser($_POST['username'])) {
                    //verificamos si el usuario existe
                    $existe= 1;
                    require('vistas/vista_registrarAdm.php');
                }
                elseif ((isset($_POST['cedula']))&&($_POST['cedula']>0)) {
                    if ($Opersonal->consultarDatos($_POST['cedula'])) {
                        if ($usuario->getbycedula($_POST['cedula'])) {
                        $existe= 2;
                        require('vistas/vista_registrarAdm.php');
                    }}
                    else{
                        $existe= 0;     
                    require('vistas/vista_registrarAdm.php');}
                    }
                    
                else{
                    $hash=password_hash($_POST['pass'],PASSWORD_DEFAULT);
                    $usuario->ingresarUsuario($_POST['username'], $hash, $_POST['email'], $_POST['cedula']);
                    $userid=$usuario->getbyuser($_POST['username']);
                    include_once('modelos/modelo_roles.php');
                    $roles=new roles();
                    $roles->asignarRol($_POST['optradio'], $userid['id_usuario']);
                    if ($_POST['optradio']!=1) {
                       foreach ($_POST['permisos'] as $key => $value) {
                        $roles->asignarPermisos($value, $userid['id_usuario']);
                    }
                    }
                    
                    $registro = 1;     
                    require('vistas/vista_registrarAdm.php');
                }
            } 
    }
    else if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1) {
    	require('vistas/vista_registrarAdm.php');
    }else {
        header('Location:?action=sindex');
    }
    
} 

else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
  