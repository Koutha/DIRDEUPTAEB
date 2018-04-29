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
                        <h5> Actualizacion o modificacion de datos de los administradores del sistema </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="row text-center ">
                        <div class="col-md-12">
                            <br /><br />
                            <h2> Formulario para actualizar / modificar Administradores </h2>
                

                            <br />
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>  Actualizar / Modificar Datos </strong>  
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" role="form">
                                        <br/>
                                        <?php if (isset($existe)&&$existe==1) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>El nombre se usuario ya esta en uso</strong> por favor intente con uno diferente
                                        </div>
                                        <?php } ?>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-notch"  ></i></span>
                                            <input name="username" type="text" class="form-control" placeholder="Nombre de Usuario" value="<?php echo $user['nombre_usuario'] ?>" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input name="email" type="email" class="form-control" placeholder="Correo" value="<?php echo $user['correo'] ?>"/>
                                        </div>
                                        <?php if (isset($pass)&&$pass==0) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Las contraseñas no coinciden</strong>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="pass" type="password" class="form-control" placeholder="Contraseña" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="rpass" type="password" class="form-control" placeholder="Repita la contraseña" required />
                                        </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">Funciones / Responsabilidad</div>
                                            <div class="panel-body">
                                                <div class="form-group input-group radio">
                                                    <label><input type="radio" name="optradio" value="1" required>Control total</label>
                                                </div>
                                                <div class="form-group input-group radio">
                                                    <label><input type="radio" name="optradio" value="2">Solo registro</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button name="submit" value="modificarUser" type="submit" class="btn btn-success">Actualizar</button>
                                            <!-- se cambio por button arriba <input name="Submit" type="submit" class="btn btn-success" value="registraradm"/> -->
                                        </div>
                                        <hr />
                                    </form>
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
