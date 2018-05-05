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

                <hr />
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Form Elements --> 	
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Selecciona la prueba a aplicar</h4>
                            </div>
                            <div class="panel-body">
                              <form action="" method="post" role="form">
                              
                                <div class="row">
                                 <div class="col-md-12">
                                        
                                         <div class="col-md-6">
                                         <div class="form-group">
                                                <label>seleccione prueba</label>
                                                <select name="id_prueba" class="form-control" required>
                                                    <option value="">Seleccione...</option>
                                                    <?php foreach ($todos as $au){ ?>
                                                    <?php if($au['status']== 1 ){ ?>
                                                    <option value="<?php echo $au['id_prueba']; ?>"><?php echo $au['nombre']; ?> </option>
                                                    
                                                    <?php }} ?>
                                                </select>
                                            </div>                               
                                    
                                        </div>
                                       </div>                                     
                                
                                    <div class="form-group">
                                     <input type="hidden" name="prue" value="0">
                                    <button name="submit" value="registrarApliPrueba" type="submit" class="btn btn-primary">Siguente</button>
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
