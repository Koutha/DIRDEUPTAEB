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
                        <h2>Formulario para el registro de disciplinas</h2>   
                        <h5>Este modulo registra las disciplinas que existen en el sistema. </h5>
                        <?php if (isset($registro)&&$registro==1) {?>
                               <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Registrado!</strong> La disciplina fue registrada exitosamente.
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
                                            <strong>esta disciplina ya se encuentra registrada</strong> por favor intente con una disciplina diferente
                                        </div>
                                <?php } ?>
                                <div class="row">
                                    
                                        <div class="col-md-6">
                                           

                                            <div class="form-group">
                                                <label>nombre de la disciplina</label>
                                                <input class="form-control" name="nombre" placeholder="nombre:" value= "<?php foreach ($todos as $au){if($id_disciplina==$au['id_disciplina']){echo $au['nombre'];}} ?>"  required/>
                                           
											</div>
                                            <div class="form-group">
                                                <label>tipos</label>
                                                <select name="tipo_disciplina" class="form-control" required>
                                                    <option value="<?php foreach ($todos as $au){if($id_disciplina==$au['id_disciplina']){echo $au['tipo_disciplina'];}} ?>"><?php foreach ($todos as $au){if($id_disciplina==$au['id_disciplina']){echo $au['tipo_disciplina'];}} ?></option>
                                                    <option value="Registro y marca">Registro y marca</option>
                                                    <option value="Combate" >Combate</option>
                                                    <option value="Pelota">Pelota</option>
                                                    <option value="Mesa">Mesa</option>
                                                   
                                                </select>
                                            </div>
                                            
                                       </div> 
                                       </div>                                     
                                
                                    <div class="form-group">
									<input type="hidden" name="id_disciplina" value="<?php echo $id_disciplina; ?>">
                                    <button name="submit" value="modificarDisciplina" type="submit" class="btn btn-primary">Registrar</button>
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
