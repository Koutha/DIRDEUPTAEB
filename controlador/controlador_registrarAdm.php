<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
function randomGen($min, $max, $quantity, $imgcheck = null) {
    $numbers = range($min, $max); //generamos el arreglo
    foreach ($numbers as &$value) {
        $value = 'assets/img/estegan/img/test'.$value; //agregamos la ruta de las imagenes
    }
    if (array_search($imgcheck, $numbers)) {  //buscamos la imagen para no repetirla
        $key = array_search($imgcheck, $numbers);
        unset($numbers[$key]);
    }
    shuffle($numbers); //mezclamos el orden aleatoriamente
    return array_slice($numbers, 0, $quantity); // devolvemos la cantidad que $quantity nos indique sin repetirlos
}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	if ($now > $_SESSION['expire']) {
		session_destroy();
    	echo "Su sesion a terminado,
		<a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
    	exit;	
    }
    else if(isset($_POST['submit']) && $_POST['submit']=='registrarAdm'){
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
        if (isset ($_POST['pass']) && $_POST['pass']!=$_POST['rpass']){
            //verificamos si las contraseñas coinciden
            $arr = randomGen(1,18,4); //arreglo de imagenes
            $pass=0;
            require('vistas/vista_registrarAdm.php'); 
        }else{ 
            //coinciden las contraseñas enviadas
            include_once('modelos/modelo_usuario.php');
            include_once('modelos/modelo_personal.php');
            include_once('modelos/modelo_bitacora.php');
            $Obitacora=new Cbitacora();
            $Opersonal=new Cpersonal();
            $usuario=new usuario();
            $username=$_SESSION['username'];
            if ($usuario->getbyuser(htmlspecialchars($_POST['username'],ENT_QUOTES))) {
                //verificamos si el usuario existe
                $existe= 1;
                echo json_encode(true);
                $arr = randomGen(1,18,4); 
                require('vistas/vista_registrarAdm.php');
            }else{
                $parar=0;
                if((isset($_POST['cedula'])) && ($_POST['cedula']>0)) {  //se introdujo una cedula para el usuario
                    if ($Opersonal->consultarDatos(htmlspecialchars($_POST['cedula'],ENT_QUOTES))) { //la cedula existe en la tabla personal
                        if ($usuario->getbycedula(htmlspecialchars($_POST['cedula'],ENT_QUOTES))) { //otro usuario tiene la misma cedula
                            $existe= 2; 
                            $parar=1;
                            $arr = randomGen(1,18,4); 
                            require('vistas/vista_registrarAdm.php');
                        }else{ //registro de usuario incluyendo la cedula de personal tecnico
                            $hash=password_hash($_POST['pass'],PASSWORD_DEFAULT);
                            $imgSelected = $_POST['imgValid']; //imagen selecionada
                            //cifrado
                            $secretKey = bin2hex(random_bytes(5)); //llave secreta unica generada para el usuario
                            $skCifrada = base64_encode($secretKey); //llave secreta cifrada a base64 
                            $imgSCifrada = base64_encode($imgSelected); //imagen seleccionada cifrada
                            // end cifrado
                            $usuario->ingresarUsuario($_POST['username'], $hash, $_POST['email'], $_POST['cedula'],$skCifrada,$imgSCifrada);
                            $userid=$usuario->getbyuser($_POST['username']);
                            include_once('modelos/modelo_roles.php');
                            $roles=new roles();
                            $roles->asignarRol($_POST['optradio'], $userid['id_usuario']);
                            if ($_POST['optradio']!=1) {
                                foreach ($_POST['permisos'] as $key => $value) {
                                $roles->asignarPermisos($value, $userid['id_usuario']);
                                }
                            }
                            $_SESSION['registro'] = 1;
                            $t_usuario=$usuario->getbyuser($username);
                            $id_usuario=$t_usuario['id_usuario'];
                            $fecha=date('d/m/y');
                            $hora=date('H:i:s');
                            $actividad="registro un Usuario";
                            $Obitacora->setid_usuarios($id_usuario);
                            $Obitacora->setfecha($fecha);
                            $Obitacora->sethora($hora);
                            $Obitacora->setactividad($actividad);
                            $Obitacora->registrarbitacora();
                            header('Location:?action=registrarAdm');
                        }
                    }else { //no existe la cedula en la tabla personal
                        $existe=0; 
                        $parar=1;
                        $arr = randomGen(1,18,4);     
                        require('vistas/vista_registrarAdm.php');
                    }
                }else { //resgistro de usuario sin cedula de personal tecnico
                    $hash=password_hash($_POST['pass'],PASSWORD_DEFAULT);
                    $imgSelected = $_POST['imgValid']; //imagen selecionada
                    //cifrado
                    $secretKey = bin2hex(random_bytes(5)); //llave secreta unica generada para el usuario
                    $skCifrada = base64_encode($secretKey); //llave secreta cifrada a base64 
                    $imgSCifrada = base64_encode($imgSelected); //imagen seleccionada cifrada
                    // end cifrado
                    $usuario->ingresarUsuario($_POST['username'], $hash, $_POST['email'], $_POST['cedula'],$skCifrada,$imgSCifrada);
                    $userid=$usuario->getbyuser($_POST['username']);
                    include_once('modelos/modelo_roles.php');
                    $roles=new roles();
                    $roles->asignarRol($_POST['optradio'], $userid['id_usuario']);
                    if ($_POST['optradio']!=1) {
                        foreach ($_POST['permisos'] as $key => $value) {
                            $roles->asignarPermisos($value, $userid['id_usuario']);
                        }
                    }
                    $_SESSION['registro'] = 1;
                    $t_usuario=$usuario->getbyuser($username);
                    $id_usuario=$t_usuario['id_usuario'];
                    $fecha=date('d/m/y');
                    $hora=date('H:i:s');
                    $actividad="registro un Usuario";
                    $Obitacora->setid_usuarios($id_usuario);
                    $Obitacora->setfecha($fecha);
                    $Obitacora->sethora($hora);
                    $Obitacora->setactividad($actividad);
                    $Obitacora->registrarbitacora();
                    header('Location:?action=registrarAdm'); 
                 
                }
            }
        }
    } else if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1) { //primera entrada desde el menu via get
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
        $arr = randomGen(1,18,4);
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
  