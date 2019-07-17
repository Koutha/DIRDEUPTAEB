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
     else if (isset($_POST['submit'])&&isset($_POST['actual'])) {
        include_once('modelos/modelo_usuario.php');
        $usuario = new usuario();
        $username=$_SESSION['username'];
        $password=$_POST['actual'];
        $consult=$usuario->getbyuser($username);
        if(password_verify($password, $consult['password'])){
            
        if (isset($_POST['passa']) && $_POST['passa'] != $_POST['rpassa']) {
            $pass = 0;
            require('vistas/vista_modificarContraseña.php');
        } else {
                $hash = password_hash($_POST['passa'], PASSWORD_DEFAULT);
                $usuario->actualizarContrasena($username, $hash);
                        $actualizo = 1;
                        //aca instanciar el modelo y guardar en la base de datos
    	                require('vistas/vista_modificarContraseña.php');
                    }
        }
        else{ $pass = 1;
            require('vistas/vista_modificarContraseña.php');
        }}
        else if ((isset($_GET['id_username'])) or (isset($_POST['submit']))) {
        include_once('modelos/modelo_usuario.php');
        $usuario = new usuario();
        $id_username=$_GET['id_username'];
        if(isset($_POST['passa'])){
            if (isset($_POST['passa']) && $_POST['passa'] != $_POST['rpassa']) {
                $pass = 0;
                require('vistas/vista_modificarContraseña.php');
            } else {
                $hash = password_hash($_POST['passa'], PASSWORD_DEFAULT);
                $usuario->activarUsuario($_POST['id_username'], $hash);
                        $activado = 1;
                        //aca instanciar el modelo y guardar en la base de datos
                header('Location:?action=modificarUser&activado='.$activado);
                    }
            }
            else{ require('vistas/vista_modificarContraseña.php'); }
        }
        elseif (isset($_GET['id'])&&$_GET['id']==1) {
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
            $id=$_GET['id'];
            require('vistas/vista_modificarContraseña.php');
        }
        else{
            
        header('Location:?action=sindex');
        }
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  