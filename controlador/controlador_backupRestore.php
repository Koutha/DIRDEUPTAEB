<?php
session_start();
date_default_timezone_set('America/caracas');
$now = time();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {//estan la sesion iniciada
    if ($now > $_SESSION['expire']) { //la sesion ya expiro
        session_destroy();
        echo "Su sesion a terminado,
        <a href='?action=ingresar'>Click aqui para ingresar de nuevo</a>";
        exit;
    }
    else if (isset($_POST['submit']) && $_POST['submit']=='backupRestore') {
            require_once ('modelos/modelo_bitacora.php');
            require_once ('modelos/modelo_usuario.php');
            $Obitacora=new Cbitacora();
            $Ousuario=new usuario();
            $username=$_SESSION['username'];
            $t_usuario=$Ousuario->getbyuser($username);
            $id_usuario=$t_usuario['id_usuario'];
            $fecha=date('d/m/y');
            $hora=date('H:i:s');
            $Obitacora->setid_usuarios($id_usuario);
            $Obitacora->setfecha($fecha);
            $Obitacora->sethora($hora);
            //var_dump($_POST);
            if (isset($_POST['exportFormat'])) {//validacion para exportar
                if ($_POST['exportFormat']==".backup") { //formato .backup
                    echo "binario";
                    $fecha = date('Y-m-d_H-i-s'); //fecha para el nombre del archivo
                    $name = 'db-backup'.$fecha;
                    $actividad="Exporto la Base de datos .BACKUP"; //cambiar aqui
                    $Obitacora->setactividad($actividad);
                    $Obitacora->registrarbitacora(); //IMPORTANTE DECOMENTAR AL FINALIZAR EL DESARROLLO
                    exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_dump.exe -h localhost -U postgres -C -p 5432 -F c DIRDEUPTAEB > db_backup\db-backup'.$fecha.'.backup 2>&1');
                    $path = 'db_backup/';
                    $filepath = $path.$name.'.backup';
                    $fp = @fopen($filepath, 'rb');
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.$filepath.'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: '.filesize($filepath));
                    ob_end_clean();//required here or large files will not work
                    fpassthru($fp);
                    fclose($fp); 
                }else{ //formato .sql
                    //echo "sql";
                    $fecha = date('Y-m-d_H-i-s'); //fecha para el nombre del archivo
                    $name = 'db-backup'.$fecha;
                    $actividad="Exporto la Base de datos .SQL"; //cambiar aqui
                    $Obitacora->setactividad($actividad);
                    $Obitacora->registrarbitacora(); //IMPORTANTE DECOMENTAR AL FINALIZAR EL DESARROLLO
                    exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_dump.exe -h localhost -U postgres -C -p 5432 DIRDEUPTAEB > db_backup\db-backup'.$fecha.'.sql 2>&1');
                    $path = 'db_backup/';
                    $filepath = $path.$name.'.sql';
                    $fp = @fopen($filepath, 'rb');
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename="'.$filepath.'"');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: '.filesize($filepath));
                    ob_end_clean();//required here or large files will not work
                    fpassthru($fp);
                    fclose($fp); 
                }
                require('vistas/vista_backupRestore.php');
            }else if(isset($_FILES['restoreFile'])){//validacion para importar/restauracion
                    //echo 'selecione restauracion';
                    //var_dump($_FILES);
                    unset($Obitacora);
                    unset($Ousuario); //para desconectar las estancias de la base de datos 
                    $file = $_FILES['restoreFile']['tmp_name'];
                    echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\dropdb.exe -U postgres DIRDEUPTAEB'); //borrar base de datos

                    echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\createdb.exe -U postgres -E UTF8 -O postgres DIRDEUPTAEB'); //crear base de datos
                    echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_restore.exe -h localhost -p 5432 -U postgres -C -d DIRDEUPTAEB '.$file);
                    $Obitacora=new Cbitacora();
                    $Ousuario=new usuario();
                    $username=$_SESSION['username'];
                    $t_usuario=$Ousuario->getbyuser($username);
                    $id_usuario=$t_usuario['id_usuario'];
                    $fecha=date('d/m/y');
                    $hora=date('H:i:s');
                    $Obitacora->setid_usuarios($id_usuario);
                    $Obitacora->setfecha($fecha);
                    $Obitacora->sethora($hora);
                    $actividad="Realizo una restauracion de Base de datos"; //cambiar aqui
                    $Obitacora->setactividad($actividad);
                    $Obitacora->registrarbitacora();
                    $_SESSION['restore'] = 1 ;
                    require('vistas/vista_backupRestore.php');
                }
                //echo "estoy aqui";
        }
        else if (isset($_SESSION['imgCorrect'])&& $_SESSION['imgCorrect'] ==1) { //entrada despues de validacion de usuario se puede agregar variable de tiempo
        require('modelos/modelo_usuario.php');
        $Ousuario=new usuario();
            unset($_SESSION['imgCorrect']); //IMPORTANTE DECOMENTAR AL FINALIZAR EL DESARROLLO
            require('vistas/vista_backupRestore.php');
        }else if (isset($_SESSION['restoring'])&& $_SESSION['restoring']== 1){
                //echo 'hola tu acertaste agregar aqui el codigo para restaurar la bd';
                $backupInfo = unserialize($_GET['id']);
                var_dump($backupInfo);
                $file = $backupInfo['file_path'];
                echo $file;
                echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\dropdb.exe -U postgres DIRDEUPTAEB'); //borrar base de datos

                echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\createdb.exe -U postgres -E UTF8 -O postgres DIRDEUPTAEB'); //crear base de datos
                echo exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_restore.exe -h localhost -p 5432 -U postgres -C -d DIRDEUPTAEB '.$file);

                unset($_SESSION['restoring']);
                $_SESSION['restored'] = 1 ;
                header('Location:?action=restoreAutoSave');
            }else{//entrada por enlace o get
            header('Location:?action=sindex');
        }
}
else{
    echo "Esta pagina es solo para usuarios registrados.<br>";
    echo "<br><a href='?action=ingresar'>Login</a>";
    exit; 
}

?>
