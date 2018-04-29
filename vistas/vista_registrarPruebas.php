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
                <h2>Registro de test (pruebas).</h2>
                <hr />
                <!-- /. ROW  -->
                <div class="row">
                    
                        <!-- Form Elements --> 	
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4>Este modulo registra los test (pruebas) ejecutadas que miden el desempeño actual del atleta.</h4>
                            </div>
                            <div class="panel-body">                      
                              <form action="" method="post" role="form">
                              <?php if (isset($existe)&&$existe==1) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Esta prueba ya se encuentra registrada</strong> por favor intente con otra
                                        </div>
                                <?php } ?>
                                    <div class="row">
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label>Nombre de la prueba</label>
                                                <input class="form-control" name="nombre" placeholder="nombre:"  required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">     
                                            <div class="form-group">
                                                <label>Descripción o pasos parar realizar la prueba</label>
                                                <textarea name="descripcion" class="form-control" required></textarea>     
                                            </div>
                                        </div>
                                        <div class="col-md-6">     
                                            <div class="form-group">
                                                <label>Tipo de prueba</label>
                                                <select name="tipo_prueba" class="form-control" required>
                                                    <option value="">Seleccione...</option>
                                                    <option value="Velocidad">Velocidad</option>
                                                    <option value="Fuerza" >Fuerza</option>
                                                    <option value="Resistencia">Resistencia</option>
                                                    <option value="Equilibrio">Equilibrio</option>
                                                    <option value="Flexibilidad">Flexibilidad</option>
                                                </select>
                                            </div>
                                         </div> 
                                         <div class="col-md-6">    
                                              <div class="form-group">  
                                                <label>objetivo para el cual se a creado la prueba</label>
                                                <input name="objetivo" type="text" class="form-control"  placeholder="dar resistencia:"/>
                                            </div>
                                         </div>
                                          <div class="col-md-6">                                                       
                                            <div class="form-group">
                                                <label>Unidad o medida</label>
                                                <select name="unidad" class="form-control" required>
                                                    <option value="">Seleccione...</option>
                                                    <option value="Segundos">Segundos</option>
                                                    <option value="Minutos" >Minutos</option>
                                                    <option value="Centimetros">Centimetros</option>
                                                    <option value="Metros">Metros</option>
                                                    <option value="Kilometros">Kilometros</option>
                                                    <option value="Gramos">Gramos</option>
                                                    <option value="Libras">Libras</option>
                                                    <option value="Kilos">Kilos</option>
                                                </select>
                                            </div>
                                          </div>
                                        <div class="col-md-6">   
                                            <div class="form-group">
                                                <label label-default="" class="control-label label-default">Coloque si exelente es el el valor máximo o el minimo</label>
                                                <input type="radio" name="condicion" value="1" checked> Máximo
                                                <input type="radio" name="condicion" value="0"> Minimo
                                            </div>
                                        </div>    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rango (max o min) para deficiente</label>
                                                <textarea name="rango1" class="form-control" maxlength="5" onkeypress="return numero(event);" placeholder="30"required></textarea>     
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rango (max o min) para regular</label>
                                                <textarea name="rango2" class="form-control" maxlength="5" onkeypress="return numero(event);" placeholder="60"required></textarea>     
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rango (max o min) para bueno</label>
                                                <textarea name="rango3" class="form-control" maxlength="5" onkeypress="return numero(event);" placeholder="90"required></textarea>     
                                            </div>
                                         </div>
                                         <div class="col-md-6">   
                                            <div class="form-group">
                                                <label>Rango (max o min) para exelente</label>
                                                <textarea name="rango4" class="form-control" maxlength="5" onkeypress="return numero(event);" placeholder="120"required></textarea>     
                                            </div>
                                        </div>    
                                        
                                    </div>
                                    <div class="form-group">
                                            <button name="Submit" value="registrarPruebas" type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                </form><!-- End Form Elements -->
                                </div>
                                
                            </div>
                            
                        </div><!-- /. ROW  -->

                    

                    
                </div>

                <!-- /. PAGE INNER  -->
            </div>

            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->


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
