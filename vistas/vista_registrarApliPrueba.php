<?php
require('core/sist-header.php');
?>
<body>
    <div id="wrapper">
        <!--Barras de navegacion-->
        <?php require('core/sist-navbar.php'); ?>
        <!--/Barras de navegacion-->

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        
                        <?php if (isset($registro)&&$registro==1) {?>
                               <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Registrado!</strong> La prueba fue registrada exitosamente.
                                </div>
                        <?php } ?>
                    </div>
                </div>

                <h2>Pruebas (Test) 
                    <ul class="nav nav-tabs">
                        <li style="float: right;">
                            <a class="btn btn-infoda" href="?action=consultarApliPruebas">Consultar</a>
                        </li>
                    </ul>
                </h2>

                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements --> 	
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Registro que mide el desempeño actual del atleta.</h4>
                            </div>
                            <div class="panel-body">
                                <form action="" method="post" role="form">
                              
                                    <div class="row">
                                        <div class="col-md-12">
                                            
                                            <?php if (isset($existe)&&$existe==0) {?>
                                                <div class="alert alert-danger alert-dismissible">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                    <strong>La cedula introducida no se encuentra registrada</strong> por favor intente con uno diferente
                                                </div>
                                            <?php } ?>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <label>prueba seleccionada</label>
                                                    <select name="id_prueba" class="form-control" required>
                                                        <option value="<?php foreach ($todos as $au){ if ($au['id_prueba']==$nombr) {print_r($au['id_prueba']);} }?>">
                                                        <?php foreach ($todos as $au){ if ($au['id_prueba']==$nombr) {print_r($au['nombre']);} }?>
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>cedula del atleta</label>
                                                    <input class="form-control" name="cedula_atleta" value="<?php if (isset($existe)&&$existe=='1'){echo $cedula_atleta;} ?>" maxlength="8" onkeypress="return numero(event);" placeholder="cedula del atleta" required/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="hidden" name="prue" value="1">
                                                    <?php if(isset($buscar) &&$buscar=='1'){ ?><button name="submit" value="registrarApliPrueba" type="submit" class="btn btn-primary">Buscar</button>
                                                   <?php } ?>
                                                    <?php if(isset($existe)&&$existe=='1'){ ?>
                                                        <div class="form-group">
                                                            <label>Atleta: </label>
                                                           
                                                            <input name="nombres" type="text" class="form-control" placeholder="Nombres" value="<?php echo $nombresA." ".$apellidosA; ?>" disabled />
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Fecha </label>
                                                            <input type="date" class="form-control" value="<?php if(isset($fecha)){ echo $fecha;}?>" name="fecha" required />
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <div class="form-group">  
                                                                    <label>resultado</label>
                                                                    <input name="medicion" type="text" class="form-control"  value="<?php if(isset($medicion)){ echo $medicion;}?>" maxlength="5" onkeypress="return numero(event);" placeholder="resultado de la prueba:" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php if (isset($medicion)&&$existe==1) {?>
                                                                    <div class="alert alert-success alert-dismissible">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <?php foreach ($todos as $au){ if ($au['id_prueba']==$id_prueba) {$condicion=$au['condicion'];$rango1=$au['rango1'];
                                                                        $rango2=$au['rango2'];$rango3=$au['rango3'];$rango4=$au['rango4']; } } ?>
                                                                        <strong><?php 
                                                                            if ($condicion=='1') {
                                                                                if ($medicion<=$rango1) { echo "su resultado de es deficiente";}
                                                                                elseif (($medicion>$rango1) && ($medicion<= $rango2)){ echo "su resultado es regular";}
                                                                                elseif (($medicion>$rango2) && ($medicion<=$rango3)){ echo "su resultado es bueno";}
                                                                                else { echo "su resultado es excelente";}
                                                                            }
                                                                            else{
                                                                                if ($medicion>=$rango1) { echo "su resultado es deficiente";}
                                                                                elseif (($medicion<$rango1) && ($medicion>= $rango2)){ echo "su resultado es regular";}
                                                                                elseif (($medicion<$rango2) && ($medicion>=$rango3)){ echo "su resultado es bueno";}
                                                                                else { echo "su resultado de es excelente";}
                                                                            } ?>
                                                                        </strong> 
                                                                    </div>
                                                                 <?php } ?> 
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="col-md-6">
                                                                <?php if(isset($existe) &&$existe=='1'){ ?>
                                                                <a href="<?php echo "?action=registrarApliPrueba&id_prueba=".$nombr; ?>" class="btn btn-danger">  Regresar</a><?php }
                                                                else{ ?>
                                                                <a href="?action=registrarApliPruebas" class="btn btn-danger">  Regresar</a>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php if(isset($siguiente) &&$siguiente=='1'){ ?><button name="submit" value="registrarApliPrueba" type="submit" class="btn btn-primary">Registrar</button><?php } ?>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <?php if(isset($registro) &&$registro=='1'){ ?>
                                                                <input type="hidden" name="limpiar" value="1">
                                                                <button name="submit" value="registrarApliPrueba" type="submit" class="btn btn-primary">Siguiente atleta</button><?php } ?>
                                                            </div>
                                                        </div>

                                                    <?php } ?>
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Descripción de la prueba:
                                                        <?php foreach ($todos as $au){ if ($au['id_prueba']==$nombr) {
                                                        print_r($au['descripcion']);} }?> 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Form Elements -->
                        </div>

                    </div>

                    <!-- /. ROW  -->
                </div>

                <!-- /. PAGE INNER  -->
            </div>

            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
    </div>


    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- script para validaciones -->
    <script type="text/javascript" src="assets/js/valida.js"></script>
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>
