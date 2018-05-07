<?php
require('core/sist-header.php');
var_dump($pdc);
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
                        <!-- Form Elements -->  
                        <form action="" method="post" role="form" class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5><strong>Información del Programa</strong></h5>
                                </div>
                                <div class="panel-body">
                                    <?php if (isset($existe) && $existe == 1) { ?>
                                        <div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>El Nombre ya existe</strong> por favor intente con uno diferente
                                        </div>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" class="form-control" name="nombre_pdc" placeholder="" value="<?php echo isset($_POST['nombre_pdc']) ? $_POST['nombre_pdc'] : $pdc['nombre_pdc']; ?>" disabled/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea name="descripcion" class="form-control" placeholder="" disabled><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : $pdc['descripcion']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label  class="control-label label-default">Tipo de programa</label>
                                                <select name="tipo_pdc" class="form-control" disabled>
                                                    <option value="">Seleccione...</option>
                                                    <option value="Preparatorio" <?php if(isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Preparatorio"){echo 'selected';} else if($pdc['tipo_pdc']=='Preparatorio'){echo 'selected';}?>>Preparatorio</option>
                                                    <option value="Pre-Compentencia" <?php if(isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Pre-Compentencia"){echo 'selected';} else if($pdc['tipo_pdc']=='Pre-Compentencia'){echo 'selected';}?>>Pre-Compentencia</option>
                                                    <option value="Competitivo" <?php if(isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Competitivo"){echo 'selected';} else if($pdc['tipo_pdc']=='Competitivo'){echo 'selected';}?>>Competitivo</option>
                                                    <option value="Post-Competencia" <?php if(isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Post-Competencia"){echo 'selected';} else if($pdc['tipo_pdc']=='Post-Competencia'){echo 'selected';}?>>Post-Competencia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label  class="control-label label-default">Disciplina</label>
                                                <select name="id_disciplina" class="form-control" disabled >
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($disciplinas as $key => $value) { ?>
                                                        <option value="<?php echo $value['id_disciplina']; ?>" <?php if(isset($_POST['id_disciplina']) && $_POST['id_disciplina'] == $value['id_disciplina']){echo 'selected';} else if($pdc['id_disciplina']==$value['id_disciplina']){echo 'selected';}?>><?php echo $value['nombre']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="row">

                                        <div class="col-sm-4">
                                            <label  class="control-label label-default">Fecha de inicio: <?php $fi= new DateTime($pdc['fecha_inicio']);
                                            echo $fi->format('Y-m-d h:i A'); ?></label>

                                        </div>
                                        <div class="col-sm-4">
                                            <label  class="control-label label-default">Fecha de Finalizacion: <?php $ff= new DateTime($pdc['fecha_fin']);
                                            echo $ff->format('Y-m-d h:i A'); ?></label>
                                            
                                        </div>
                                    </div>
                                    <h5><strong>Aspectos a trabajar del Programa</strong></h5>
                                    <div class="row">
                                        
                                        <div class="col-sm-4">
                                            <label  class="control-label label-default">Técnica: <?php echo $pdc['tecnica'];?> %</label>

                                        </div>
                                        <div class="col-sm-4">
                                            <label  class="control-label label-default">Táctica: <?php echo $pdc['tactica']; ?> %</label>
                                            
                                        </div>
                                        <div class="col-sm-4">
                                            <label  class="control-label label-default">Físico: <?php echo $pdc['fisico']; ?> %</label>
                                            
                                        </div>
                                        <div class="col-sm-4">
                                            <label  class="control-label label-default">Psicológico: <?php echo $pdc['psicologico']; ?> %</label>
                                            
                                        </div>
                                        <div class="col-sm-4">
                                            <label  class="control-label label-default">Velocidad: <?php echo $pdc['velocidad']; ?> %</label>
                                            
                                        </div>
                                    </div>   
                                </div>
                            </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Duración de la sesión</strong></h5>
                                    </div>
                                    <div class="panel-body">                                       
                                        <div class="row" >
                                            <div class='col-sm-3'>
                                                <div class="form-group">
                                                    <label>Inicia</label>
                                                    <div class='input-group date' >
                                                        <input type='text' name="fecha_inicio" id='datetimepicker1' class="form-control" value="<?php echo isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : $pdc['fecha_dia']; ?>" disabled />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-sm-3'>
                                                <div class="form-group">
                                                    <label>Termina</label>
                                                    <div class='input-group date' >
                                                        <input type='text' name="fecha_fin" id='datetimepicker2' class="form-control"  value="<?php echo isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : $fin; ?>" disabled />
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Características de la sesión</strong></h5>
                                    </div>
                                    <div class="panel-body">
                                        <label>Aspectos a trabajar en la sesión</label>
                                        <div class="row">
                                            <div class="checkbox-group form-group">
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="tecnica_dia" required>Técnica</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="tactica_dia" required>Táctica</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="fisico_dia" required>Físico</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="psicologico_dia" required>Psicológico</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" >
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="velocidad_dia" required>Velocidad</label>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Atletas de la sesión</strong></h5>
                                    </div>
                                    <div class="panel-body">
                                        <label>Aspectos a trabajar en la sesión</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="checkbox-group form-group">
                                                    <div class="checkbox form-control">
                                                        <label><input type="checkbox" id="select_all"/> Seleccionar todos</label>
                                                    </div>             
                                                    <div class="checkbox form-control">
                                                        <label><input class="checkbox" type="checkbox" name="check[]"> This is Item 1</label>
                                                    </div>
                                                                    
                                                </div>
                                            </div> <!--/ col-md-12 -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="submit" value="asignarAtletaPdc" type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                        </form><!-- End Form Elements -->
                    </div><!-- /. <div class="col-md-12">  -->
                </div> <!-- /. ROW  -->
            </div><!-- /. PAGE INNER  -->    
        </div><!-- /. PAGE WRAPPER  --> 
    </div><!-- /. WRAPPER  -->

     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- script para validaciones -->
    <script src="assets/js/valida.js" type="text/javascript" ></script>
    <!-- CALENDAR -->
    <script src='assets/js/moment.min.js'></script>
    <script src='assets/js/fullcalendar.min.js'></script>
    <script src='assets/locale/es-do.js'></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js" type="text/javascript" ></script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <!-- script para validaciones -->
    <script type="text/javascript" src="assets/js/valida.js"></script>
   <!-- previsualizacion de imagenes -->
    <script src="assets/js/img-preview.js" type='text/javascript'></script>
    
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker({
                    useCurrent: false,
                    format: 'YYYY-MM-DD h:mm A'
                });
                $('#datetimepicker2').datetimepicker({
                    useCurrent: false,
                    format: 'YYYY-MM-DD h:mm A'
                });
            });
        </script>

</body>
</html>
