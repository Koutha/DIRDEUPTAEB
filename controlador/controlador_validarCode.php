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
    else if (isset($_POST['submit']) && $_POST['submit']=='validarCode') { //via post para validar
            
            $modulo =  $_POST['seleccion']; // modulo que se esta validando
            if (isset($_POST['seleccion2'])){
                $modulo2 = $_POST['seleccion2'];// modulo que se esta validando
            }
            
            $code = $_POST['code'];
            $token= $_POST['token'];

           
            if ($code == $token) { //validacion del codigo
                $_SESSION['codeCorrect'] = 1;
                if (isset($modulo2)){
                    header('Location:?action='.$modulo.'&'.$modulo2);
                }else{
                    $_SESSION['codeCorrect'] = 1;
                    header('Location:?action='.$modulo);
                }
                
                //echo 'imagen correcta';
            }else{ //imagen incorecta
                $_SESSION['codeIncorrect'] = 1;
                if (isset($modulo2)){
                    header('Location:?action=validarCode&mod='.$_POST['seleccion'].'&'.$modulo2);
                }else{
                    header('Location:?action=validarCode&mod='.$_POST['seleccion']);
                }
            }
        }
        else{//primera entrada despues de validar la imagen

        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
            $seleccion  = $_GET['mod']; //se indica el modulo a validar
            if (isset($_GET['at'])){ //para consultarAplicacionPdc&at
                $seleccion2 = 'at' ; 
            }
            $token = bin2hex(random_bytes(16)); //generamos el codigo de seguridad para ser inviado al usuario
            //utilizacion de servidor de correos o mensajes SMS para enviar el codigo al usuario
            
            require('vistas/vista_validarCode.php');
        }
}
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
