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
                        

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="row text-center ">
                        <div class="col-md-12">
                            <br /><br />
                            <h2> Formulario para actualizar / modificar pruebas de la direccion de deportes. </h2>
                

                            <br />
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>  Actualizacion o modificacion de datos de la aplicacion de pruebas de la direccion de deportes </strong>  
                                </div><div class="panel-body">
                            <div class="row">
                                
                                    <div class="panel-body">
                              <form action="" method="post" role="form">
                              <?php if (isset($existe)&&$existe==0) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>La el atleta no se encuentra registrado</strong> por favor verifique los datos del atleta
                                        </div>
                                <?php } ?>
                                <div class="row">
                                    
                                        <div class="col-md-6">
                                           

                                            <div class="form-group">
                                                <label>seleccione prueba</label>
                                                <select name="id_prueba" class="form-control" required>
                                                    <option value="<?php foreach ($todos as $au){ if ($au['id_ap']==$id_ap) {
                                                    print_r($au['id_prueba']);
                                                } }?>"><?php foreach ($todos as $au){ if ($au['id_ap']==$id_ap) {$id_prueba=$au['id_prueba'];
                                                } }?>
                                                   <?php foreach ($todosp   as $aud){ if ($aud['id_prueba']==$id_prueba) {
                                                    print_r($aud['nombre']);
                                                } }?> 
                                                </option>
                                                    <?php foreach ($todosp as $au){ if ($au['id_prueba']!=$id_prueba){?><?php if($au['status']== 1 ){ ?>
                                                    <option value="<?php echo $au['id_prueba']; ?>"><?php echo $au['nombre']; ?> </option>
                                                    
                                                    <?php }}} ?>
                                                </select>
                                            </div>
                                       
                                        
                                    <div class="form-group">
                                                <label><h4>Descripcion de la prueba:</h4>
                                                <?php foreach ($todos   as $au){ if ($au['id_ap']==$id_ap) {$id_prueba=$au['id_prueba'];
                                                   
                                                } }?> 
                                                <?php foreach ($todosp   as $aud){ if ($aud['id_prueba']==$id_prueba) {
                                                    print_r($aud['descripcion']);
                                                } }?>
                                            </label>
                                            </div>
                                    
                                        

                                            
                                             <div class="form-group">
                                                <label>Fecha </label>
                                                <input type="date" class="form-control" name="fecha" value="<?php foreach ($todos as $au){ if ($au['id_ap']==$id_ap) {
                                                    print_r($au['fecha']);
                                                } }?>" required />
                                                </div>
                                            
                                           
                                            
                                              <div class="form-group">  
                                                <label>resultado</label>
                                                <input name="medicion" type="text" class="form-control" value="<?php foreach ($todos as $au){ if ($au['id_ap']==$id_ap) {
                                                    print_r($au['medicion']);
                                                } }?>" placeholder="resultado de la prueba:" required />
                                            </div>
                                            <hr />
                                        

                                                                                                  
                                        <div class="form-group">
                                                <label>cedula del atleta</label>
                                                <input class="form-control" name="cedula_atleta" value="<?php foreach ($todos as $au){ if ($au['id_ap']==$id_ap) {
                                                    print_r($au['cedula_atleta']);
                                                } }?>" placeholder="cedula del atleta" required/>
                                            </div>
                                            

                                        </div>

                                                                                                  
                                        
                                    
                                    
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_ap" value="<?php echo $id_ap; ?>">
                                    <button name="Submit" value="modificarApliPruebas" type="submit" class="btn btn-primary">Actualizar Datos</button>
                                </div>
                                </form>
                            </div>
                                    
                    </div>
                    </div>
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
