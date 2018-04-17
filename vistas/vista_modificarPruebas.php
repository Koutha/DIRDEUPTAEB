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
                        <h2>Actualizar Datos</h2>   
                        <h5> Actualizacion o modificacion de datos de las pruebas de la direccion de deportes </h5>

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
                                    <strong>  Actualizar / Modificar Datos </strong>  
                                </div><div class="panel-body">
                            <div class="row">
                                
                                    <div class="panel-body">
                              <form action="" method="post" role="form">
                              <?php if (isset($existe)&&$existe==1) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>La prueba ya se encuentra registrada</strong> por favor intente con una prueba diferente
                                        </div>
                                <?php } ?>
                                <div class="row">
                                    
                                        <div class="col-md-6">
                                           

                                            <div class="form-group">
                                                <label>nombre de la prueba</label>
                                                <input class="form-control" name="nombre" placeholder="nombre:" value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['nombre'];}  } ?>"  required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Descripcion o pasos parar realizar la prueba</label>
                                                <input name="descripcion" class="form-control" value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['descripcion'];}  } ?>"required></input>     
                                            </div>
                                            
                                            
                                            
                                           
                                            <div class="form-group input-group">
                                                <label>Nombre de la prueba</label>
                                                <select name="tipo_prueba" class="form-control" required>
                                                    <option value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['tipo_prueba'];}  } ?>"><?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['tipo_prueba'];}  } ?></option>
                                                    <option value="Velocidad">Velocidad</option>
                                                    <option value="Fuerza" >Fuerza</option>
                                                    <option value="Resistencia">Resistencia</option>
                                                    <option value="Equilibrio">Equilibrio</option>
                                                    <option value="Flexibilidad">Flexibilidad</option>
                                                </select>
                                            </div>
                                            
                                              <div class="form-group">  
                                                <label>objetivo para el cual se a creado la prueba</label>
                                                <input name="objetivo" type="text" class="form-control"  placeholder="dar resistencia:"value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['objetivo'];}  } ?>"/>
                                            </div>
                                            <hr />
                                        

                                                                                                  
                                        <div class="form-group">
                                                <label>Unidad o medida</label>
                                                <input class="form-control" name="unidad" placeholder="centimetros, metros,..."value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['unidad'];}  } ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Rango1 para malo</label>
                                                <input name="rango1" class="form-control" placeholder="30"value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['rango1'];}  } ?>" required></input>     
                                            </div>
                                            <div class="form-group">
                                                <label>Rango2 para regular</label>
                                                <input name="rango2" class="form-control" placeholder="60"value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['rango2'];}  } ?>"required></input>     
                                            </div>
                                            <div class="form-group">
                                                <label>Rango3 para bueno</label>
                                                <input name="rango3" class="form-control" placeholder="90"value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['rango3'];}  } ?>"required></input>     
                                            </div>
                                            <div class="form-group">
                                                <label>Rango4 para exelente</label>
                                                <input name="rango4" class="form-control" placeholder="120"value="<?php foreach ($todos as $au){ if(isset($au)&&($id_prueba==$au['id_prueba'])){echo $au['rango4'];}  } ?>"required></input>     
                                            </div>
                                            

                                        </div>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id_prueba" value="<?php echo $id_prueba; ?>">
                                    <button name="submit" value="modificarPruebas" type="submit" class="btn btn-primary">Actualizar Datos</button>
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
