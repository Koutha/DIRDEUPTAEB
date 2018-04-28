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
                        <h2>Registro de PNF</h2>   
                        <?php if (isset($registro)&&$registro==1) {?>
                               <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Registrado!</strong> exitosamente.
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
                            
                            <div class="panel-body">
                              <form action="" method="post" role="form">
                              <?php if (isset($existe)&&$existe==1) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>este PNF ya se encuentra registrado</strong> por favor intente con de nuevo.
                                        </div>
                                <?php } ?>
                                <div class="row">
                                    
                                        <div class="col-md-6">
                                           

                                            <div class="form-group">
                                                <label>Nombre del PNF</label>
                                                <input class="form-control" name="nombre" placeholder="Nombre del PNF" value="<?php foreach ($todos as $au){if($id_pnf==$au['id_pnf']){echo $au['nombre'];}} ?>" requied/>
                                            </div>
                                           <div class="form-group">
                                                <label>Nombre del Coordinador</label>
                                                <input class="form-control" name="coordinador" placeholder="Nombre del Coordinador del PNF" value= "<?php foreach ($todos as $au){if($id_pnf==$au['id_pnf']){echo $au['coordinador'];}} ?>"  required/>
                                            </div>

                                                   
                                                </select>
                                            </div>
                                            
                                       </div> 
                                                                           
                                
                                    <div class="form-group">
                                    <input type="hidden" name="id_pnf" value="<?php echo $id_pnf; ?>">
                                    <button name="submit" value="modificarPnf" type="submit" class="btn btn-primary">Registrar</button>
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
