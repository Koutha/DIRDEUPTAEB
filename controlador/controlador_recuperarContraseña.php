<?php
session_start();
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

 if (isset($_POST['imgValid'])) { //via post para validar
    if (isset($_SESSION['logg']) && $_SESSION['logg'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "Su sesion a terminado,
        <a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;   
    }
            $imgSelected = $_POST['imgValid']; //imagen seleccionada en pantalla de validacion
            $modulo =  $_POST['seleccion']; // modulo que se esta validando
            if (isset($_POST['seleccion2'])){
                $modulo2 = $_POST['seleccion2'];// modulo que se esta validando
            }
            include_once('modelos/modelo_cifrado.php');
            //imagen seleccionada
            $ss = new StreamSteganography($imgSelected);
            $ss->Write($_SESSION['secretKey']);
            $img1 = $ss->readImg();
            ob_start(); // Let's start output buffering.
            imagepng($img1);//This will normally output the image, but because of ob_start(), it won't.
            $contents = ob_get_contents(); // read from buffer //Instead, output above is saved to $contents
            ob_end_clean(); //End the output buffer.
            $img1string = base64_encode($contents);
            $img1md5 = md5($img1string);

            //imagen del usuario
            $Userimg = base64_decode($_SESSION['imgSelect']);
            $UserSS = new StreamSteganography($Userimg.'.png');
            $UserSS->Write($_SESSION['secretKey']);
            $UserSSimg = $UserSS->readImg();
            ob_start(); // Let's start output buffering.
            imagepng($UserSSimg);//This will normally output the image, but because of ob_start(), it won't.
            $UserContents = ob_get_contents(); // read from buffer //Instead, output above is saved to $contents
            ob_end_clean(); //End the output buffer.
            $UserSSimgString = base64_encode($UserContents);
            $UserSSimgMd5 = md5($UserSSimgString);

            if ($img1md5 == $UserSSimgMd5) { //valido la imagen
                
                    $_SESSION['imgCorrect'] = 1;
                    //header('Location:?action='.$modulo);
                    header('Location:?action=nuevaContraseña');
                
                //echo 'imagen correcta';
            }else{ //imagen incorecta
                $_SESSION['imgIncorrect'] = 1;
                
                header('Location:?action=recuperarContraseña');
                
            }
    } 

else{
    echo "debe entrar pulsando el boton recuperar contraseña que se encuentra en el login.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}
        }
        else if (isset($_POST['submit']) && $_POST['submit']=='recuperarContraseña') {//entrada para validar el usuario
            include_once('modelos/modelo_usuario.php');
            $usuario = new usuario();
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
            $result = $usuario->getbyuser($username);
            if ($result>0) {

                $_SESSION['logg'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (60*6);
                $_SESSION['secretKey'] = $result['secret_key'];
                $_SESSION['imgSelect'] = $result['img_select'];
            
        $imgchek = base64_decode($_SESSION['imgSelect']); //imagen del patron selecionada para verificar no repetirla
        //$secretImg = base64_decode($_SESSION['secretImg']); //imagen secreta del usuario
        $arr = randomGen(1,18,3,$imgchek);
        array_push($arr,$imgchek ); //se introduce la imagen del user al arreglo
        shuffle($arr); //mezclamos el arreglo
        $seleccion  = "nuevaContraseña"; //se indica el modulo a validar
        require('vistas/vista_recuperarContraseña.php');
    //require ('controlador_sindex.php');

    } else {
        $user=0;
        require_once('vistas/vista_recuperarContraseña.php');
    }

}
else{   
        if (isset($_SESSION['imgSelect'])) {
            $imgchek = base64_decode($_SESSION['imgSelect']); //imagen del patron selecionada para verificar no repetirla
            $arr = randomGen(1,18,3,$imgchek);
            array_push($arr,$imgchek ); //se introduce la imagen del user al arreglo
            shuffle($arr); //mezclamos el arreglo
        }
        
    require('vistas/vista_recuperarContraseña.php');


}



?>
