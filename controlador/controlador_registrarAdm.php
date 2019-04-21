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
            if (isset ($_POST['pass']) && $_POST['pass']!=$_POST['rpass']){
                //verificamos si las contraseñas coinciden
                $pass=0;
                require('vistas/vista_registrarAdm.php'); 
            }else{ //coinciden las contraseñas enviadas
                include_once('modelos/modelo_usuario.php');
                include_once('modelos/modelo_personal.php');
                $Opersonal=new Cpersonal();
                $usuario=new usuario();
                if ($usuario->getbyuser($_POST['username'])) {
                    //verificamos si el usuario existe
                    $existe= 1;
                    require('vistas/vista_registrarAdm.php');
                }else{
                    $parar=0;
                    if ((isset($_POST['cedula'])) && ($_POST['cedula']>0)) { //se introdujo una cedula para el usuario
                        if ($Opersonal->consultarDatos($_POST['cedula'])) { //la cedula existe en la tabla personal
                            if ($usuario->getbycedula($_POST['cedula'])) { //otro usuario tiene la misma cedula
                                $existe= 2; 
                                $parar=1;
                                require('vistas/vista_registrarAdm.php');
                            }
                        }else{ //no existe la cedula en la tabla personal
                            $existe=0; 
                            $parar=1;    
                            require('vistas/vista_registrarAdm.php');
                        }
                    } 
                    else{ //continua el flujo por POST sin conflictos para registrar
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
                        header('Location:?action=registrarAdm'); 
                 
                    }
                }
            }
        }
    else if(isset($_SESSION['rol']) && $_SESSION['rol'] == 1) { //primera entrada desde el menu via get
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
  