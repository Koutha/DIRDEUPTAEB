<?php
session_start();
date_default_timezone_set('America/caracas');
?>
<?php

include_once('modelos/modelo_usuario.php');
$usuario = new usuario();
$username = htmlspecialchars($_POST['username'], ENT_QUOTES);
$password = $_POST['password'];
$result = $usuario->getbyuser($username);
$permisos = $usuario->consultarTodosPermisos();
if ($result>0) {
    if ($result['status']>=2) {
        $bloqueado=1;
        require_once('vistas/vista_ingresar.php');
    }else{
    include_once('modelos/modelo_roles.php');
    include_once('modelos/modelo_usuario.php');
    $roles= new roles();
    $Ousuario= new usuario();
    $userRol= $roles->getRol($result['id_usuario']);
    if (password_verify($password, $result['password'])) {
        $_SESSION['loggedin']       = true;
        $_SESSION['username']       = $username;
        $_SESSION['id_usuario']     = $result['id_usuario'];
        $_SESSION['rol']            = $userRol['id_rol'];
        $_SESSION['start']          = time();
        $_SESSION['expire']         = $_SESSION['start'] + (60*90);
        $_SESSION['secretKey']      = $result['secret_key'];
        $_SESSION['imgSelect']      = $result['img_select'];
        unset ($_SESSION['fallido']);
        foreach ($permisos as $key => $value) {if($value['id_usuario']==$result['id_usuario']){$userpermisos[]=$value['permisos'];}
        }if (isset($userpermisos)) {
            $_SESSION['permisos']   = $userpermisos;
        }
        //echo "Bienvenido! " . $_SESSION['username'];
        //echo "<br><br><a href=sindex.php>Panel de Control</a>"; 
        header('Location:?action=sindex');
        //require ('controlador_sindex.php');
    } else { $now = time();
        if (isset($_SESSION['nombre']) && $_SESSION['nombre']==$_POST['username']) {
            if ($_SESSION['esperar']>$now && $result['status']<2) {
                $_SESSION['fallido']=$_SESSION['fallido']+1;
            $pw=0; 
            }else{
                $_SESSION['fallido']=1;   
                $_SESSION['esperar'] = time() + (60*30);
                $_SESSION['nombre']=$_POST['username'];
                $pw=0; 
            }
            
        }else
        {   $_SESSION['fallido']=1;   
            $_SESSION['esperar'] = time() + (60*30);
            $_SESSION['nombre']=$_POST['username'];
            $pw=0; 
        }
        if ($_SESSION['fallido']>=3) {
            $Ousuario->bloquear_contra(2,$result['id_usuario']);
            $bloqueado=1;
            $pw=2;
            session_destroy();
            echo $_SESSION['nombre'];
            require_once('vistas/vista_ingresar.php');
        }else{ require_once('vistas/vista_ingresar.php');}
        

       

       } 
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