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
                
                <!-- /. ROW  -->
                <hr />
                
                    <div class="row">
                         <?php if (isset($actualizo)&&$actualizo==1) {?>
                    <div class="alert alert-info alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>La contraseña fue actualizada exitosamente</strong> .
                    </div>
                <?php } ?>
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>  Actualizar contraseña </strong>  
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" role="form">
                                        <br/>
                                        <?php if (isset($pass)&&$pass==1) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Esta contraseña actual no se encuentra registra</strong> verifiquela e intentelo de nuebo.
                                        </div>
                                        <?php } ?>
                                        <?php if (isset($id)&&$id==1) {?>
                                            <label>Coloque la contraseña actual</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="actual" type="password" class="form-control" placeholder="Contraseña actual" required />
                                        </div>
                                        <?php } ?>
                                        <?php if (isset($pass)&&$pass==0) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Las nuevas contraseñas no coinciden</strong>
                                        </div>
                                        <?php } ?>
                                            <label>Coloque la nueva contraseña</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="passa" type="password" class="form-control" placeholder="Contraseña" required />
                                        </div>
                                            <label>Repita la nueva contraseña</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="rpassa" type="password" class="form-control" placeholder="Repita la contraseña" required />
                                        </div>
                                        <div class="form-group input-group">
                                        <?php if (isset($id_username)) {?><input type="hidden" name="id_username" value="<?php echo $id_username; ?>"> <?php } ?>
                                            <button name="submit" value="modificarContraseña" type="submit" class="btn btn-success">Actualizar</button>
                                            <!-- se cambio por button arriba <input name="Submit" type="submit" class="btn btn-success" value="registraradm"/> -->
                                        </div>
                                        
                                        <hr />
                                    </form>
                                </div>

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
     <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
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
    <script src="assets/js/custom.js"></script>

</body>
</html>
