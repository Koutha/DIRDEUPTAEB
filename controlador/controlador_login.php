<?php
session_start();
?>
<?php

include_once('modelos/modelo_usuario.php');
$usuario = new usuario();
$username = $_POST['username'];
$password = $_POST['password'];
$result = $usuario->getbyuser($username);

if ($result>0) {
    include_once('modelos/modelo_roles.php');
    $roles= new roles();
    $userRol= $roles->getRol($result['id_usuario']);
    if (password_verify($password, $result['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['rol'] = $userRol['id_rol'];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (60*60);

        //echo "Bienvenido! " . $_SESSION['username'];
        //echo "<br><br><a href=sindex.php>Panel de Control</a>"; 
        header('Location:?action=sindex');
        //require ('controlador_sindex.php');
    } else {
        $pw=0;
        require_once('vistas/vista_ingresar.php');

       /* echo "Password esta incorrecto.";

        echo "<br><a href='?action=ingresar'>Volver a Intentarlo</a>";*/
    }
} else {
    $user=0;
    require_once('vistas/vista_ingresar.php');
    /*echo "Usuario incorrecto.";

    echo "<br><a href='?action=ingresar'>Volver a Intentarlo</a>";*/
}

$db = null;
$con = null;
?>