<?php
/**
 * 
 */
include_once('modelos/modelo_base.php');

class Cpdc extends modelobase {

    private $id_pdc, $nombre_pdc, $descripcion, $tipo_pdc, $id_disciplina, $fecha_inicio, $fecha_fin,
            $tecnica, $tactica, $fisico, $velocidad, $psicologico;
    private $tabla;

    function __construct() {
        $this->tabla = "T_pdc";
        parent::__construct($this->tabla);
    }

    public function getId_pdc() {
        return $this->id_pdc;
    }

    public function getNombre_pdc() {
        return $this->nombre_pdc;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getTipo_pdc() {
        return $this->tipo_pdc;
    }

    public function getId_disciplina(){
        return $this->id_disciplina;
    }

    public function getFecha_inicio() {
        return $this->fecha_inicio;
    }

    public function getFecha_fin() {
        return $this->fecha_fin;
    }

    public function getTecnica() {
        return $this->tecnica;
    }

    public function getTactica() {
        return $this->tactica;
    }

    public function getFisico() {
        return $this->fisico;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }

    public function getPsicologico() {
        return $this->psicologico;
    }

    public function setId_pdc($id_pdc) {
        $this->id_pdc = $id_pdc;
    }

    public function setNombre_pdc($nombre_pdc) {
        $this->nombre_pdc = $nombre_pdc;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setTipo_pdc($tipo_pdc) {
        $this->tipo_pdc = $tipo_pdc;
    }

    public function setId_disciplina($id_disciplina){
        $this->id_disciplina= $id_disciplina;
    }

    public function setFecha_inicio($fecha_inicio) {
        $this->fecha_inicio = $fecha_inicio;
    }

    public function setFecha_fin($fecha_fin) {
        $this->fecha_fin = $fecha_fin;
    }

    public function setTecnica($tecnica) {
        $this->tecnica = $tecnica;
    }

    public function setTactica($tactica) {
        $this->tactica = $tactica;
    }

    public function setFisico($fisico) {
        $this->fisico = $fisico;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    public function setPsicologico($psicologico) {
        $this->psicologico = $psicologico;
    }

    public function registrarPdc(){
        try {
            $sql='INSERT INTO  "T_pdc"(nombre_pdc,descripcion,tipo_pdc,id_disciplina,fecha_inicio,
                                        fecha_fin,tecnica,tactica,fisico,velocidad,
                                        psicologico)
                        VALUES(?,?,?,?,?,?,?,?,?,?,?)';

            $db = $this->db();
            $query = $db->prepare($sql);
            $query->bindParam(1, $this->nombre_pdc);
            $query->bindParam(2, $this->descripcion);
            $query->bindParam(3, $this->tipo_pdc);
            $query->bindParam(4, $this->id_disciplina);
            $query->bindParam(5, $this->fecha_inicio);
            $query->bindParam(6, $this->fecha_fin);
            $query->bindParam(7, $this->tecnica);
            $query->bindParam(8, $this->tactica);
            $query->bindParam(9, $this->fisico);
            $query->bindParam(10, $this->velocidad);
            $query->bindParam(11, $this->psicologico);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function registrarDiaPdc($fecha,$id_pdc){
        try{
            $sql =  'INSERT INTO "T_dia_pdc" (fecha,id_pdc) 
                            VALUES (?,?)';
                            
            $db = $this->db();
            $query=$db->prepare($sql);
            $query->bindParam(1,$fecha);
            $query->bindParam(2,$id_pdc);
            
            $query->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
            exit;
        }
    }

    public function modificarPdc($id_pdc){
        try {
            $sql='UPDATE "T_pdc" SET nombre_pdc=:nombre_pdc, descripcion=:descripcion,
                                     tipo_pdc=:tipo_pdc, id_disciplina=:id_disciplina, 
                                     fecha_inicio=:fecha_inicio, fecha_fin=:fecha_fin,
                                     tecnica=:tecnica,tactica=:tactica,fisico=:fisico,
                                     velocidad=:velocidad, psicologico=:psicologico
                        WHERE id_pdc= :id_pdc';

            $db = $this->db();
            $query = $db->prepare($sql);
            $query->bindParam(':nombre_pdc', $this->nombre_pdc);
            $query->bindParam(':descripcion', $this->descripcion);
            $query->bindParam('tipo_pdc', $this->tipo_pdc);
            $query->bindParam('id_disciplina', $this->id_disciplina);
            $query->bindParam('fecha_inicio', $this->fecha_inicio);
            $query->bindParam('fecha_fin', $this->fecha_fin);
            $query->bindParam('tecnica', $this->tecnica);
            $query->bindParam('tactica', $this->tactica);
            $query->bindParam('fisico', $this->fisico);
            $query->bindParam('velocidad', $this->velocidad);
            $query->bindParam('psicologico', $this->psicologico);
            $query->bindParam('id_pdc', $id_pdc);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }

    }

    public function borrarDiasPdc($id_pdc){
        try {
            $sql= 'DELETE FROM "T_dia_pdc" WHERE id_pdc=?';
            $db=$this->db();
            $query=$db->prepare($sql);
            $query->bindParam(1, $id_pdc);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function aplicarPdc($cedula_atleta,$id_dp){
        try {
            $sql='INSERT INTO "T_atleta_ejecucion_pdc"(cedula_atleta, id_dp)
                    VALUES(:cedula_atleta,:id_dp)';
            $db=$this->db();
            $query=$db->prepare($sql);
            $query->bindParam(':cedula_atleta', $cedula_atleta);
            $query->bindParam(':id_dp', $id_dp);
            $query->execute();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    public function modificarAplicacion(){

    }

    public function consultarAplicacion($fecha, $id_pdc){ /*consulta los datos del dia recibiendo fecha y
                                                            la id del pdc al que pertenece */ 
        $sql= 'SELECT   id_dp, fecha as fecha_dia, tdp.tecnica as tecnica_dia,
                        tdp.tactica as tactica_dia, tdp.fisico as fisico_dia,
                        tdp.velocidad as velocidad_dia, tdp.psicologico as psicologico_dia,
                        tdp.id_pdc, tp.fecha_inicio, tp.fecha_fin, tp.tecnica,
                        tp.tactica, tp.fisico, tp.psicologico, tp.velocidad,
                        tp.id_disciplina, tp.tipo_pdc, tp.nombre_pdc, tp.descripcion,
                        td.nombre as nombre_disciplina, td.tipo_disciplina 
                FROM "T_dia_pdc" tdp JOIN "T_pdc" tp ON tdp.id_pdc=tp.id_pdc 
                JOIN "T_disciplina" td ON tp.id_disciplina=td.id_disciplina
                WHERE tdp.fecha = ? AND tdp.id_pdc= ?';
        $db=$this->db();
        $query=$db->prepare($sql);
        $query->bindParam(1, $fecha);
        $query->bindParam(2, $id_pdc);
        $query->execute();
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
             $resultado = $fila;
        }
        if (!empty($resultado)) {
            return $resultado;
        }
        else{
            return 0;
        }
        
    }

    public function consultarAplicacionDiaTodos($id_pdc){ /*consulta todos los dias de una plafinicacion */ 
        $sql= 'SELECT   id_dp, fecha as fecha_dia, tdp.tecnica as tecnica_dia,
                        tdp.tactica as tactica_dia, tdp.fisico as fisico_dia,
                        tdp.velocidad as velocidad_dia, tdp.psicologico as psicologico_dia,
                        tdp.id_pdc, tp.fecha_inicio, tp.fecha_fin, tp.tecnica,
                        tp.tactica, tp.fisico, tp.psicologico, tp.velocidad,
                        tp.id_disciplina, tp.tipo_pdc, tp.nombre_pdc, tp.descripcion,
                        td.nombre as nombre_disciplina, td.tipo_disciplina 
                FROM "T_dia_pdc" tdp JOIN "T_pdc" tp ON tdp.id_pdc=tp.id_pdc 
                JOIN "T_disciplina" td ON tp.id_disciplina=td.id_disciplina
                WHERE tp.id_pdc= :id_pdc';
        $db=$this->db();
        $query = $db->prepare($sql);
        $query->bindParam(':id_pdc', $id_pdc);
        $query->execute();
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
             $resultado[]= $fila;
        }
        if (!empty($resultado)) {
            return $resultado;
        }
        else{
            return 0;
        }
        
    }

    public function consultarAplicacionDia($id_dp){ //consulta los datos del dia recibiendo el id del dia
        $sql= 'SELECT   id_dp, fecha as fecha_dia, tdp.tecnica as tecnica_dia,
                        tdp.tactica as tactica_dia, tdp.fisico as fisico_dia,
                        tdp.velocidad as velocidad_dia, tdp.psicologico as psicologico_dia,
                        tdp.id_pdc, tp.fecha_inicio, tp.fecha_fin, tp.tecnica,
                        tp.tactica, tp.fisico, tp.psicologico, tp.velocidad,
                        tp.id_disciplina, tp.tipo_pdc, tp.nombre_pdc, tp.descripcion,
                        td.nombre as nombre_disciplina, td.tipo_disciplina 
                FROM "T_dia_pdc" tdp JOIN "T_pdc" tp ON tdp.id_pdc=tp.id_pdc 
                JOIN "T_disciplina" td ON tp.id_disciplina=td.id_disciplina
                WHERE tdp.id_dp=:id_dp';
        $db=$this->db();
        $query = $db->prepare($sql); 
        $query->bindParam(':id_dp', $id_dp);
        $query->execute();
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
             $resultado = $fila;
        }
        if (!empty($resultado)) {
            return $resultado;
        }
        else{
            return 0;
        }
        
    }

    public function consultarADP($id_disciplina){ //Consultar Atletas disponibles en la disciplina del programa
        try {
            $sql= ' SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos, tpdc.id_disciplina, td.nombre
                    FROM "T_atleta" ta 
                    JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
                    JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
                    JOIN "T_pdc" tpdc ON td.id_disciplina=tpdc.id_disciplina
                    WHERE tpdc.id_disciplina=:id_disciplina';
            $db = $this->db();
            $query=$db->prepare($sql);
            $query->bindParam(':id_disciplina', $id_disciplina);
            $query->execute();
            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                $resultado[] = $fila;
            }
            if (!empty($resultado)) {
                return $resultado;
            }
            else{
                return 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        
    }


    public function consultarADP1($id_pdc, $id_disciplina){ //Cosultar Atletas disponibles excluyendo los ya registrados
        try {
            $sql= 'SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos, tpdc.id_disciplina, td.nombre
            FROM "T_atleta" ta 
            JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
            JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
            JOIN "T_pdc" tpdc ON td.id_disciplina=tpdc.id_disciplina
            LEFT JOIN
            (SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos
            FROM "T_atleta" ta 
            JOIN "T_atleta_ejecucion_pdc" taep ON ta.cedula_atleta=taep.cedula_atleta 
            JOIN "T_dia_pdc" tdp ON tdp.id_dp=taep.id_dp
            JOIN "T_pdc" tpdc ON tpdc.id_pdc=tdp.id_pdc
            WHERE tpdc.id_pdc=?)as arg
            ON arg.cedula_atleta=ta.cedula_atleta
            WHERE tpdc.id_disciplina=? AND arg.cedula_atleta IS NULL';
            $db = $this->db();
            $query=$db->prepare($sql);
            $query->bindParam(1, $id_pdc);
            $query->bindParam(2, $id_disciplina);
            $query->execute();
            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                $resultado[] = $fila;
            }
            if (!empty($resultado)) {
                return $resultado;
            }
            else{
                return 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        
    }

    public function consultarADP2($id_pdc, $id_disciplina){ //consultar solo atletas registrados en la planificacion
        try {
            $sql= 'SELECT tblA.* 
                    FROM (SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos, tpdc.id_disciplina, td.nombre
                            FROM "T_atleta" ta 
                            JOIN "T_atleta_disciplina" tad ON ta.cedula_atleta=tad.cedula_atleta 
                            JOIN "T_disciplina" td ON tad.id_disciplina=td.id_disciplina
                            JOIN "T_pdc" tpdc ON td.id_disciplina=tpdc.id_disciplina) tblA
                    RIGHT JOIN
                    (SELECT DISTINCT ta.cedula_atleta, ta.nombres, ta.apellidos
                        FROM "T_atleta" ta 
                        JOIN "T_atleta_ejecucion_pdc" taep ON ta.cedula_atleta=taep.cedula_atleta 
                        JOIN "T_dia_pdc" tdp ON tdp.id_dp=taep.id_dp
                        JOIN "T_pdc" tpdc ON tpdc.id_pdc=tdp.id_pdc
                        WHERE tpdc.id_pdc=?) tblB
                    ON tblB.cedula_atleta=tblA.cedula_atleta
                    WHERE tblA.id_disciplina=?';
            $db = $this->db();
            $query=$db->prepare($sql);
            $query->bindParam(1, $id_pdc);
            $query->bindParam(2, $id_disciplina);
            $query->execute();
            while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
                $resultado[] = $fila;
            }
            if (!empty($resultado)) {
                return $resultado;
            }
            else{
                return 0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        
    }


    public function registrarEjecucionAtleta(){

    }

    public function consultarEjecucion(){

    }

    public function modificarEjecucion(){
    	
    }

    public function consultarTodos(){
        $sql= 'SELECT   id_pdc,tipo_pdc,nombre_pdc,descripcion,
                        fecha_inicio, fecha_fin, tecnica, tactica,
                        fisico, psicologico,velocidad,
                        td.nombre as nombre_disciplina,
                        tp.id_disciplina   
                FROM "T_pdc" tp, "T_disciplina" td
                WHERE tp.id_disciplina=td.id_disciplina';
        $query = $this->db()->query($sql);
        while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
             $resultado[] = $fila;
        }
        if (!empty($resultado)) {
            return $resultado;
        }
        else{
            return 0;
        }
    }

    public function consultarDatos($nombre){
        $sql ='SELECT   id_pdc,tipo_pdc,nombre_pdc,descripcion,
                        fecha_inicio, fecha_fin, tecnica, tactica,
                        fisico, psicologico,velocidad,
                        td.nombre as nombre_disciplina,
                        tp.id_disciplina   
                FROM "T_pdc" tp, "T_disciplina" td
                WHERE tp.id_disciplina=td.id_disciplina AND nombre_pdc=?';
        $db=$this->db();
        $query=$db->prepare($sql);
        $query->bindParam(1, $nombre);
        $query->execute();
        while ($fila=$query->fetch(PDO::FETCH_ASSOC)) {
            $resultado=$fila;
        }
        if (!empty($resultado)) {
            return $resultado;
        }
        else{
            return 0;
        }

    }

    public function determinarPeriodoPorDias($begin,$end) {
        //devuelve un arreglo con las fechas separadas por dia del intervalo recibido
        $days = [];
        $dayInterval = new DateInterval('P1D');
        $begin = new DateTime($begin);
        $end = new DateTime($end);
        $_end = clone $end; 
        $_end->modify('+1 day');
        foreach ((new DatePeriod($begin, $dayInterval, $_end)) as $i => $period) {
            $_begin = $period;
            if ($i) $_begin->setTime(06, 00, 00); //hora de inicio del dia
            if ($_begin > $end) break;
            $_end = clone $_begin;
            $_end->setTime(22, 00, 00); //hora de finalizacion maxima del dia
            if ($end < $_end) $_end = $end;
            $days[] = [
                'begin' => $_begin,
                'end' => $_end,
            ];
        }
        return $days;
    }

    public function datediffer($interval, $datefrom, $dateto, $using_timestamps = false) {
    /* Funcion para determinar horas, dias, semanas, años depende de cual sea el caso del formato indicado en $interval 
    entre dos fechas pasadas por parametro $datefrom, $dateto.
    $interval can be:
    yyyy - Number of full years
    q    - Number of full quarters
    m    - Number of full months
    y    - Difference between day numbers
           (eg 1st Jan 2004 is "1", the first day. 2nd Feb 2003 is "33". The datediff is "-32".)
    d    - Number of full days
    w    - Number of full weekdays
    ww   - Number of full weeks
    h    - Number of full hours
    n    - Number of full minutes
    s    - Number of full seconds (default)
    */

    if (!$using_timestamps) {
        $datefrom = strtotime($datefrom, 0);
        $dateto   = strtotime($dateto, 0);
    }

    $difference        = $dateto - $datefrom; // Difference in seconds
    $months_difference = 0;

    switch ($interval) {
        case 'yyyy': // Number of full years
            $years_difference = floor($difference / 31536000);
            if (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom), date("j", $datefrom), date("Y", $datefrom)+$years_difference) > $dateto) {
                $years_difference--;
            }

            if (mktime(date("H", $dateto), date("i", $dateto), date("s", $dateto), date("n", $dateto), date("j", $dateto), date("Y", $dateto)-($years_difference+1)) > $datefrom) {
                $years_difference++;
            }

            $datediff = $years_difference;
        break;

        case "q": // Number of full quarters
            $quarters_difference = floor($difference / 8035200);

            while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($quarters_difference*3), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                $months_difference++;
            }

            $quarters_difference--;
            $datediff = $quarters_difference;
        break;

        case "m": // Number of full months
            $months_difference = floor($difference / 2678400);

            while (mktime(date("H", $datefrom), date("i", $datefrom), date("s", $datefrom), date("n", $datefrom)+($months_difference), date("j", $dateto), date("Y", $datefrom)) < $dateto) {
                $months_difference++;
            }

            $months_difference--;

            $datediff = $months_difference;
        break;

        case 'y': // Difference between day numbers
            $datediff = date("z", $dateto) - date("z", $datefrom);
        break;

        case "d": // Number of full days
            $datediff = floor($difference / 86400);
        break;

        case "w": // Number of full weekdays
            $days_difference  = floor($difference / 86400);
            $weeks_difference = floor($days_difference / 7); // Complete weeks
            $first_day        = date("w", $datefrom);
            $days_remainder   = floor($days_difference % 7);
            $odd_days         = $first_day + $days_remainder; // Do we have a Saturday or Sunday in the remainder?

            if ($odd_days > 7) { // Sunday
                $days_remainder--;
            }

            if ($odd_days > 6) { // Saturday
                $days_remainder--;
            }

            $datediff = ($weeks_difference * 5) + $days_remainder;
        break;

        case "ww": // Number of full weeks
            $datediff = floor($difference / 604800);
        break;

        case "h": // Number of full hours
            $datediff = floor($difference / 3600);
        break;

        case "n": // Number of full minutes
            $datediff = floor($difference / 60);
        break;

        default: // Number of full seconds (default)
            $datediff = $difference;
        break;
    }

    return $datediff;
    }

}

?>