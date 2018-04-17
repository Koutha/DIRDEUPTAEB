<?php
session_start();
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($now > $_SESSION['expire']) {
        session_destroy();
        require('vistas/vista_ingresar.php');   
    }else {
    	header('Location:?action=sindex');
        //require('vistas/vista_sindex.php');
    }
} 
else{
    require('vistas/vista_ingresar.php');
}
?>