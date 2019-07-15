<?php
	date_default_timezone_set('America/caracas'); 
	$fecha = date('Y-m-d_H-i-s');
	$name = 'db-backup-autosave'.$fecha;
	//exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_dump.exe -h localhost -U usuario  -p 5432 -C -F c DIRDEUPTAEB > E:\laragon\www\DIRDEUPTAEB\db_autosave\db-backup-autosave'.$fecha.'.backup 2>&1');

	$backup_file = $name.'.backup'; //nombre del archivo
	$file_path = 'E:\laragon\www\DIRDEUPTAEB\db_autosave\db-backup-autosave'.$fecha.'.backup'; //ruta del archivo
	$date = date('Y-m-d H:i:s'); // fecha formateada para timestamp

	function saveBackup($backup_file,$fecha,$file_path){
			$host_db = "localhost";
			$user_db = "postgres";
			$pass_db = "123456";
			$db_name = "DIRDEUPTAEB";
			$db_port = 5432;
		try {

				$conexion = new PDO("pgsql:host=$host_db;port=$db_port;dbname=$db_name",$user_db,$pass_db);
	
			} catch (Exception $e) {
				echo "Fallo la conexion". $e->getMessage();
			}
			try {
				$sql = 'INSERT INTO db_backup_autosave (backup_file, backup_date, file_path) VALUES (?,?,?)';

				$query=$conexion->prepare($sql);

				$query->bindParam(1, $backup_file);
            	$query->bindParam(2, $fecha);
            	$query->bindParam(3, $file_path);

				$resultado = $query->execute();

			} catch (Exception $e) {
				echo $e->getMessage();
           		exit;
			}
	}
	$done = saveBackup($backup_file,$date,$file_path);
	exec('E:\laragon\bin\postgresql\postgresql-11.3-4\bin\pg_dump.exe -h localhost -U postgres -p 5432 -C -F c DIRDEUPTAEB > E:\laragon\www\DIRDEUPTAEB\db_autosave\db-backup-autosave'.$fecha.'.backup 2>&1');

 ?>