<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    } else if ((isset($_POST['Submit']) or isset($_GET['id'])) && ((isset($_SESSION['rol']) && $_SESSION['rol'] == 1))) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        } else if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        include_once('modelos/modelo_usuario.php');
        $usuario = new usuario();
        $user = $usuario->getby("id_usuario",$id);
        if (isset($_POST['pass']) && $_POST['pass'] != $_POST['rpass']) {
            $pass = 0;
            require('vistas/vista_modificarUser.php');
        } else if(isset($_POST['username'])){
                    $username= $_POST['username'];
                    $result = $usuario->getbyuser($username);
                    if ($result > 0 && $user["nombre_usuario"] != $username) {
                        $existe = 1;
                        require('vistas/vista_modificarUser.php');
                    } else {
                        $hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                        $usuario->actualizarUsuario($id, $_POST['username'], $hash, $_POST['email']);
                         //$userid=$usuario->getbyuser($_POST['username']);
                        include_once('modelos/modelo_roles.php');
                        $roles = new roles();
                        $roles->actualizarRol($_POST['optradio'], $id);
                        $actualizo = 1;
                        //aca instanciar el modelo y guardar en la base de datos
                        $allusers=$usuario->listarAdm();
    	                require('vistas/vista_consultaradm.php');
                    }
                }
                else {
                    require('vistas/vista_modificarUser.php');
                }
        }else{
        header('Location:?action=sindex');
        }
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  