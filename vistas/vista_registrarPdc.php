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
                        <h2>Programas directos de competencia</h2>
                        <h5>Donde se establece la estructura del programa de entrenamiento con miras a la obtención de logros deportivos en corto tiempo. </h5>   
                        <?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 1) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Registrada!</strong>  se ha registrado Exitosamente.
                            </div>
                        <?php unset($_SESSION['registro']); } ?>
                    </div>
                </div>
                <hr /><!-- /. ROW  -->
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
                                                <input type="text" class="form-control" name="nombre_pdc" placeholder="" value="<?php echo isset($_POST['nombre_pdc']) ? $_POST['nombre_pdc'] : ''; ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <textarea name="descripcion" class="form-control" placeholder="" required><?php echo isset($_POST['descripcion']) ? $_POST['descripcion'] : ''; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label  class="control-label label-default">Tipo de programa</label>
                                                <select name="tipo_pdc" class="form-control" required >
                                                    <option value="">Seleccione...</option>
                                                    <option value="Preparatorio" <?php echo (isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Preparatorio") ? 'selected' : ''; ?>>Preparatorio</option>
                                                    <option value="Pre-Compentencia" <?php echo (isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Pre-Compentencia") ? 'selected' : ''; ?>>Pre-Compentencia</option>
                                                    <option value="Competitivo" <?php echo (isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Competitivo") ? 'selected' : ''; ?>>Competitivo</option>
                                                    <option value="Post-Competencia" <?php echo (isset($_POST['tipo_pdc']) && $_POST['tipo_pdc'] == "Post-Competencia") ? 'selected' : ''; ?>>Post-Competencia</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label  class="control-label label-default">Disciplina</label>
                                                <select name="id_disciplina" class="form-control" required >
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($disciplinas as $key => $value) { ?>
                                                        <option value="<?php echo $value['id_disciplina']; ?>" <?php echo (isset($_POST['id_disciplina']) && $_POST['id_disciplina'] == $value['id_disciplina']) ? 'selected' : ''; ?>><?php echo $value['nombre']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Duración</strong></h5>
                                    </div>
                                    <div class="panel-body">
                                        <?php if (isset($periodo) && $periodo == 1) { ?>
                                        <div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Periodo invalido</strong> La fecha de inicio debe ser menor a la fecha de finalizacion
                                        </div>
                                    <?php } ?>
                                        <div class="row" >
                                            <div class="col-md-4" >
                                                <div class="form-group" >
                                                    <label>Fecha de Inicio</label>
                                                    <input type="date" name="fecha_inicio" class="form-group" value="<?php echo isset($_POST['fecha_inicio']) ? $_POST['fecha_inicio'] : ''; ?>" required>
                                                </div>
                                            </div>    
                                            <div class="col-md-4" >  
                                                <div class="form-group" >
                                                    <label>Fecha de Finalización</label>
                                                    <input type="date" name="fecha_fin" class="form-group" value="<?php echo isset($_POST['fecha_fin']) ? $_POST['fecha_fin'] : ''; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Características del Programa</strong></h5>
                                    </div>
                                    <div class="panel-body">
                                        <?php if (isset($porcentaje) && $porcentaje == 1) { ?>
                                        <div class="alert alert-danger alert-dismissible fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Porcentajes incorrectos</strong> La suma de los porcentajes debe ser igual a 100 % 
                                        </div>
                                    <?php } ?>
                                        <label>Aspectos a trabajar en porcentaje</label>
                                        <div class="row" >
                                            <div class="col-md-4" >
                                                <div class="form-group">
                                                    <label>Técnica</label>
                                                    <input type="number" min="1" max="100" name="tecnica" class="form-control" value="<?php echo isset($_POST['tecnica']) ? $_POST['tecnica'] : ''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                <div class="form-group">
                                                    <label>Táctica</label>
                                                    <input type="number" min="1" max="100" name="tactica" class="form-control" value="<?php echo isset($_POST['tactica']) ? $_POST['tactica'] : ''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                <div class="form-group">
                                                    <label>Físico</label>
                                                    <input type="number" min="1" max="100" name="fisico" class="form-control" value="<?php echo isset($_POST['fisico']) ? $_POST['fisico'] : ''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                <div class="form-group">
                                                    <label>Psicológico</label>
                                                    <input type="number" min="1" max="100" name="psicologico" class="form-control" value="<?php echo isset($_POST['psicologico']) ? $_POST['psicologico'] : ''; ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4" >
                                                <div class="form-group">
                                                    <label>Velocidad</label>
                                                    <input type="number" min="1" max="100" name="velocidad" class="form-control" value="<?php echo isset($_POST['velocidad']) ? $_POST['velocidad'] : ''; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button name="submit" value="registrarPdc" type="submit" class="btn btn-primary">Registrar</button>
                                </div>
                        </form><!-- End Form Elements -->
                    </div>
                </div> <!-- /. ROW  -->
            </div><!-- /. PAGE INNER  -->    
        </div><!-- /. PAGE WRAPPER  --> 
    </div><!-- /. WRAPPER  -->

    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <!-- script para validaciones -->
    <script type="text/javascript" src="assets/js/valida.js"></script>
    <script src="assets/js/stepform.js" type="text/javascript"></script>
    <script src="assets/js/img-preview.js" type='text/javascript'></script>

</body>
</html>
