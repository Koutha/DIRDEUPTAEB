<?php
session_start();

$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//estan la sesion iniciada
    if ($now > $_SESSION['expire']) { //la sesion ya expiro
        session_destroy();
        echo "Su sesion a terminado,
        <a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    }
    else if (isset($_POST['submit']) && $_POST['submit']=='validarImg') { //via post para validar
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
            $img1string = base64_encode($contents); //cifrado de la imagen a base64
            $img1md5 = md5($img1string); //cifrado de la imagen por md5

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
                if (isset($modulo2)){
                    // header('Location:?action='.$modulo.'&'.$modulo2);
                    header('Location:?action=validarCode&mod='.$modulo.'&at');
                }else{
                    $_SESSION['imgCorrect'] = 1;
                    //header('Location:?action='.$modulo);
                    header('Location:?action=validarCode&mod='.$modulo);
                }
                //echo 'imagen correcta';
            }else{ //imagen incorecta
                $_SESSION['imgIncorrect'] = 1;
                if (isset($modulo2)){
                    header('Location:?action=validarImg&mod='.$_POST['seleccion'].'&'.$modulo2);
                }else{
                    header('Location:?action=validarImg&mod='.$_POST['seleccion']);
                }
            }
        }
        else{//entrada por get o primera entrada
            require('modelos/modelo_usuario.php');
            $Ousuario=new usuario();
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
            $imgchek = base64_decode($_SESSION['imgSelect']); //imagen del patron selecionada para verificar no repetirla
            //$secretImg = base64_decode($_SESSION['secretImg']); //imagen secreta del usuario
            $arr = randomGen(1,18,3,$imgchek);
            array_push($arr,$imgchek ); //se introduce la imagen del user al arreglo
            shuffle($arr); //mezclamos el arreglo
            $seleccion  = htmlspecialchars($_GET['mod'],ENT_QUOTES); //se indica el modulo a validar
            if (isset($_GET['at'])){ //para consultarAplicacionPdc&at
                $seleccion2 = 'at' ; 
            }
            require('vistas/vista_validarImg.php');
        }
}
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
