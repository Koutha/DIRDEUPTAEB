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
                        <h2>Mantanimiento del Sistema</h2>
                        <h5>En este modulo se puede descargar una copia de seguridad de la base de datos y posteriormente una restauración </h5>   
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
                        <!-- Form Elements export -->  
                        <form action="" method="post" role="form" class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h5><strong>Exportar copia de seguridad</strong></h5>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Formato</label>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" class="" name="exportFormat" placeholder="" value=".backup" required checked="" /> 
                                                        Binario
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" class="" name="exportFormat" placeholder="" value=".sql" required/>
                                                        SQL
                                                    </label>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label>Descripción</label>
                                                <p class="form-control-static"><strong>Formato Binario</strong> aceptado para restauración</p>
                                                <p class="form-control-static"><strong>Formato SQL</strong> alternativo para auditorias</p>
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="form-group">
                                    <button name="submit" value="backupRestore" type="submit" class="btn btn-primary">Exportar</button>
                                    </div>    
                                </div>
                                
                            </div>
                        </form><!-- End Form Elements export -->
                        <!-- Form Elements import -->  
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5><strong>Restauración</strong></h5>
                                    </div>
                                    <div class="panel-body">
                                        <?php if (isset($_SESSION['restore']) && $_SESSION['restore'] == 1) { ?>
                                                <div class="alert alert-success alert-dismissible">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>Completado!</strong>  se han restaurado los datos satisfactoriamente.
                                                </div>
                                            <?php unset($_SESSION['restore']); } ?>
                                        <div class="row" >
                                            <div class='col-sm-7'>
                                                <div class="form-group">
                                                    <label>Archivo</label>
                                                    <div class='file-loading'>
                                                        <input type='file' id="input-id" name="restoreFile" class="file" value="" data-show-preview="false" data-msg-placeholder="Selecione el archivo .backup" data-allowed-file-extensions='["backup"]' data-show-upload="false" required >
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                        </div>
                                        <div class="form-group">
                                            <button name="submit" value="backupRestore" type="submit" class="btn btn-primary">Importar</button>
                                        </div>
                                </div>
                            </div>
                        </form><!-- End Form Elements import -->
                                
                        
                    </div>
                </div> <!-- /. ROW  -->
            </div><!-- /. PAGE INNER  -->    
        </div><!-- /. PAGE WRAPPER  --> 
    </div><!-- /. WRAPPER  -->

     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/fileinput.min.js"></script>
    <script src='assets/js/locale/es.js'></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- script para validaciones -->
    <script src="assets/js/valida.js" type="text/javascript" ></script>
    
   
   
    
   
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
    <!-- script para validaciones -->
    <script type="text/javascript" src="assets/js/valida.js"></script>
   <!-- previsualizacion de imagenes -->
  
  
    <script type="text/javascript">
            // initialize with defaults
            $("#input-id").fileinput();
    </script>

</body>
</html>
