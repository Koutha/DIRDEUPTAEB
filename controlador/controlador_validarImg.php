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
            $imgSelected = $_POST['imgValid'];
            $modulo =  $_POST['seleccion'];
            if (isset($_POST['seleccion2'])){
                $modulo2 = $_POST['seleccion2'];
            }
            include_once('modelos/modelo_cifrado.php');
            $ss = new StreamSteganography($imgSelected);
            
            $userSecret =  $ss->Read(); //leer el mensaje
            $decoded = base64_decode($userSecret);
            if ($decoded == base64_decode($_SESSION['secretKey'])) { //valido la imagen
                $_SESSION['imgCorrect'] = 1;
                if (isset($modulo2)){
                    header('Location:?action='.$modulo.'&'.$modulo2);
                }else{
                    $_SESSION['imgCorrect'] = 1;
                    header('Location:?action='.$modulo);
                }
                /*echo '<div class="col-sm-9 bg-info">
                <img src="'.$imgSelected.'" width="100px" height="100px" />
                </div>';
                echo 'imagen correcta';*/
            }else{ //imagen incorecta
                $_SESSION['imgIncorrect'] = 1;
                if (isset($modulo2)){
                    header('Location:?action=validarImg&mod='.$_POST['seleccion'].'&'.$modulo2);
                }else{
                    header('Location:?action=validarImg&mod='.$_POST['seleccion']);
                }
            }
        }
        else{//entrada por enlace o get primera pantalla
            
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
            $secretImg = base64_decode($_SESSION['secretImg']); //imagen secreta del usuario
            $arr = randomGen(1,18,3,$imgchek);
            array_push($arr,$secretImg ); //se introduce la imagen del user al arreglo
            shuffle($arr); //mezclamos el arreglo
            $seleccion  = $_GET['mod'];
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
