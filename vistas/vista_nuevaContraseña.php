<?php
require('core/sist-header.php');
?>
<body>
    <div id="wrapper">
        <!--Barras de navegacion-->
            <div id="page-inner">
                
                <!-- /. ROW  -->
                <hr />
                
                    <div class="row">
                        
                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>  Nueva contraseña </strong>  
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" role="form">
                                        <br/>
                                        
                                        <?php if (isset($pass)&&$pass==0) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Las contraseñas no coinciden</strong>
                                        </div>
                                        <?php } ?>
                                            <label>Coloque la nueva contraseña</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="passn" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" autocomplete="off" class="form-control" placeholder="Contraseña" required />
                                        </div>
                                            <label>Repita la nueva contraseña</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="rpassn" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" autocomplete="off" class="form-control" placeholder="Repita la contraseña" required />
                                        </div>
                                        <div class="form-group input-group">
                                        <input type="hidden" name="id_username" value="<?php echo $id_username; ?>">
                                            <button name="submit" value="nuevaContraseña" type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="?action=logout" class="btn btn-danger"> <span class="glyphicon glyphicon-log-out"></span> Salir</a>
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
