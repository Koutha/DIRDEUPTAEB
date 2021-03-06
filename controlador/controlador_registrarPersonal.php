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
    else if (isset($_POST['submit']) && $_POST['submit']=='registrarPersonal') { 
            include_once('modelos/modelo_personal.php');
            include_once('modelos/modelo_disciplina.php');
            $Oatleta= new Cpersonal();
            $Odisciplina= new Cdisciplina();
            $cedula=$_POST['cedula_et'];
            $atleta= $Oatleta->consultarDatos($cedula);
            if ($atleta>0) {
                $existe=1;
                echo 'entre por existe';
                $disciplinas=$Odisciplina->consultarTodos();
                require('vistas/vista_registrarPersonal.php');
            }else{
                $nombres=$_POST['nombres'];
                $apellidos=$_POST['apellidos'];
                $tel_movil=$_POST['tel_movil'];
                $correo=$_POST['correo'];
                $cargo=$_POST['cargo'];
                $Oatleta->setCedula($cedula);
                $Oatleta->setNombres($nombres);
                $Oatleta->setApellidos($apellidos);
                $Oatleta->setTel_movil($tel_movil);
                $Oatleta->setCorreo($correo);
                $Oatleta->setcargo($cargo);
                //cargar Foto
                $target_dir = "assets/img/img_foto_personal/";
                $target_file_foto = $target_dir .$cedula. basename($_FILES["dir_foto"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file_foto,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["dir_foto"]["tmp_name"], $target_file_foto);
                $Oatleta->setDir_foto($target_file_foto);
                // cargar cedula
                $target_dir = "assets/img/img_ced_personal/";
                $target_file_cedula = $target_dir .$cedula. basename($_FILES["dir_cedula"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file_cedula,PATHINFO_EXTENSION));
                move_uploaded_file($_FILES["dir_cedula"]["tmp_name"], $target_file_cedula);
                $Oatleta->setDir_cedula($target_file_cedula);
                $Oatleta->registrarPersonal();
                if(!empty($_POST['id_disciplina'])){
                    foreach ($_POST['id_disciplina'] as $key => $value) {
                        $Oatleta->asignarDisciplina($value);
                    }
                }
                $registro= 1;
                echo 'registre';
                require('vistas/vista_registrarPersonal.php');
            }
        }
        else{
            include_once('modelos/modelo_disciplina.php');
            $Odisciplina= new Cdisciplina();
            $disciplinas=$Odisciplina->consultarTodos();
            require('vistas/vista_registrarPersonal.php');
        }
}
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
