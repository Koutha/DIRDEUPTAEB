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
     else if (isset($_GET['activado'])) {
        include_once('modelos/modelo_usuario.php');
        $usuario = new usuario();
        $todos=$usuario->consultarTodosPermisos();
        $valu=1;
        $allusers=$usuario->listarAdm();
            $activado=$_GET['activado'];
            require('vistas/vista_consultarAdm.php');
            }
            else if ((isset($_POST['Submit']) or isset($_GET['id'])) && ((isset($_SESSION['rol']) && $_SESSION['rol'] == 1))) {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        } else if (isset($_GET['id'])) {
            $id = $_GET['id'];
        }
        include_once('modelos/modelo_usuario.php');
        include_once('modelos/modelo_roles.php');
        include_once('modelos/modelo_personal.php');
        $usuario = new usuario();
        $roles = new roles();
        $Opersonal = new Cpersonal();
        $user = $usuario->getby("id_usuario",$id);
        $userrol = $roles->getby("id_usuario",$id);
        if (isset($_GET['id_username'])) {
           
            $id_username = $_GET['id_username'];
            header('Location:?action=modificarContraseña&id_username='.$id_username);
        }
        if(isset($_POST['username'])){
                    $username= $_POST['username'];
                    $result = $usuario->getbyuser($username);
                    $todos=$usuario->consultarTodosPermisos();
                    if ($result > 0 && $user["nombre_usuario"] != $username) {
                        if ($result['status']==0) {
                            $existe = 1;
                            $restar = 1;
                        require('vistas/vista_modificarUser.php');
                        }
                        $existe = 1;
                        require('vistas/vista_modificarUser.php');
                    }

                    else { $parar=0;
                        if($_POST['cedula']>0){
                            $consultusuario=$Opersonal->consultarDatos($_POST['cedula']);
                            $consult=$usuario->getbycedula($_POST['cedula']);
                            $cedula=$_POST['cedula']; $id_cedula=$_POST['id_cedula'];
                         if($consultusuario>0){
                            if ($consult>0&&$consult['cedula']!=$id_cedula) {
                                $todos=$usuario->consultarTodosPermisos();
                                $existe= 2;
                                $parar=1;
                            require('vistas/vista_modificarUser.php');
                        }}if ($consultusuario==0) {
                           $todos=$usuario->consultarTodosPermisos();
                                
                                $existe= 0;
                                $parar=1;
                            require('vistas/vista_modificarUser.php');
                        }}
                    if($parar!=1){
                        $usuario->actualizarUsuario($id, $_POST['username'], $_POST['email'], $_POST['cedula']);
                         //$userid=$usuario->getbyuser($_POST['username']);
                        
                        $roles->actualizarRol($_POST['optradio'], $id);
                        $roles->borrarPermisos($result['id_usuario']);
                        if($_POST['optradio']!=1){
                       foreach ($_POST['permisos'] as $key => $value) {
                        $roles->asignarPermisos($value, $result['id_usuario']);
                    }
                    }
                        $actualizo = 1; $valu=1;
                        $todos=$usuario->consultarTodosPermisos();
                        //aca instanciar el modelo y guardar en la base de datos
                        $allusers=$usuario->listarAdm();
    	                require('vistas/vista_consultarAdm.php');
                    }}
                }
                else {
                  $todos=$usuario->consultarTodosPermisos(); 
                    require('vistas/vista_modificarUser.php');
                }
        }else{echo "entre";
        header('Location:?action=sindex');
        }
} else {
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit;
}
?>
  