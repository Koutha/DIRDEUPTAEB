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
    else if (isset($_POST['submit']) or isset($_GET['cedula_et'])) {
            if (isset($_POST['cedula_et'])) {
            $cedula_et = $_POST['cedula_et'];
            } else if (isset($_GET['cedula_et'])) {
            $cedula_et = $_GET['cedula_et'];
            }
            include_once('modelos/modelo_personal.php');
            include_once('modelos/modelo_disciplina.php');
            $Opersonal= new Cpersonal();
            $Odisciplina= new Cdisciplina();
            $personal = $Opersonal->consultarDatos($cedula_et);
            //entra por post
            if (isset($_POST['cedula_et'])) {
                $cedula=$_POST['cedula_et'];
                $personal_tmp = $Opersonal->consultarDatos($cedula);
                
                //validacion
                if($personal_tmp>0 && $personal['cedula_et']!=$cedula){
                    $existe= 1;
                    echo 'entre por existe';
                    $personal=$Opersonal->consultarTodos();
                    $personalDisciplinas=$Odisciplina->getDisciplinasPorperosnal($personal['cedula_et']);
                    require('vistas/vista_modificarPersonal.php');
                }
                else{
                    
                    $nombres=$_POST['nombres'];
                    $apellidos=$_POST['apellidos'];
                    $tel_movil=$_POST['tel_movil'];
                    $correo=$_POST['correo'];
                    $cargo=$_POST['cargo'];
                    $Opersonal->setCedula($cedula);
                    $Opersonal->setNombres($nombres);
                    $Opersonal->setApellidos($apellidos);
                    //$Opersonal->setDireccion($direccion);
                    $Opersonal->setTel_movil($tel_movil);
                    $Opersonal->setCorreo($correo);
                    $Opersonal->setCargo($cargo);
                    if (isset($_FILES["dir_foto"]["name"]) && !empty($_FILES["dir_foto"]["name"])) {
                        //cargar Foto
                        unlink($personal['dir_foto']);
                        $target_dir = "assets/img/img_foto_personal/";
                        $target_file_foto = $target_dir .$cedula. basename($_FILES["dir_foto"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file_foto,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["dir_foto"]["tmp_name"], $target_file_foto);
                        $Opersonal->setDir_foto($target_file_foto);
                    
                    }else{
                        //no se modifico
                        $Opersonal->setDir_foto($personal['dir_foto']);
                    }

                    if (isset($_FILES["dir_cedula"]["name"])&& !empty($_FILES["dir_cedula"]["name"])) {
                        // cargar cedula
                        unlink($personal['dir_cedula']);
                        $target_dir = "assets/img/img_ced_peronsal/";
                        $target_file_cedula = $target_dir .$cedula. basename($_FILES["dir_cedula"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file_cedula,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["dir_cedula"]["tmp_name"], $target_file_cedula);
                        $Opersonal->setDir_cedula($target_file_cedula);
                    }else{
                        //no se modifico
                        $Opersonal->setDir_cedula($personal['dir_cedula']);
                    }
                     // switch
                    header('Location:?action=detallePersonal&cedula_et='.$cedula_et);
                  // require('vistas/vista_detalleAtleta.php');
                } //else linea 31 validacion
            }//if de la entrada por post linea 22
            else {
                //entra por get
                $Odisciplina= new Cdisciplina();
                $disciplina=$Odisciplina->consultarTodos();
                $perosonalDisciplinas=$Odisciplina->getDisciplinasPorPersonal($cedula_et);
                require('vistas/vista_modificarPersonal.php');
            } //else del get linea 169
        }//else linea 12
} //if linea 5 validacion de sesion
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
