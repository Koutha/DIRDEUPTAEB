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
                <div class="row">
                    <div class="row text-center ">
                        <div class="col-md-12">
                            <br /><br />
                            <h2> Formulario para registrar Administradores </h2>
                            <?php if (isset($_SESSION['registro'])&&$_SESSION['registro']==1) {?>
                               <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Registrado!</strong> El usuario ha sido registrado exitosamente.
                                </div>
                            <?php unset($_SESSION['registro']);} ?>
                            <br />
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <strong>  Registrar Nuevo Administrador </strong>  
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" role="form">
                                        <br/>
                                        <?php if (isset($existe)&&$existe==1) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>El nombre se usuario ya existe</strong> por favor intente con uno diferente
                                        </div>
                                        <?php } ?>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-notch"  ></i></span>
                                            <input name="username" type="text" class="form-control" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="El nombre de usuario no puede empezar con un caracter numerico ni contener espacios" placeholder="Nombre de Usuario" autocomplete="off" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input name="email" type="email" class="form-control" placeholder="Correo" autocomplete="off" />
                                        </div>
                                        <?php if (isset($pass)&&$pass==0) {?>
                                        <div class="alert alert-danger alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Las contraseñas no coinciden</strong>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="pass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" autocomplete="off" class="form-control" placeholder="Contraseña" required />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="rpass" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Debe contener al menos un número y una letra mayúscula y minúscula, y al menos 8 o más caracteres" autocomplete="off" class="form-control" placeholder="Repita la contraseña" required />
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                            <h5><strong>Seleccione una imagen</strong></h5>
                                            </div>
                                            <div class="panel-body">
                                                <div class="col-sm-12">
                                                <div class="div-general-img">
                                                <?php foreach ($arr as $key => $value) {
                                                        echo '<div class="div-general-img img">
                                                                    <label >
                                                                        <img src="'.$value.'.png" class="div-general-img" width="100px" height="100px" />
                                                                        <input type="radio" name="imgValid" value="'.$value.'" class="hidden" required>
                                                                    </label>
                                                                </div>';
                                                        }
                                                ?>
                                                </div>
                                       
                                                </div>
                                            </div>
                                        </div>
                                            <?php if (isset($existe)&&$existe==0) {?>
                                            <div class="alert alert-danger alert-dismissible">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>la cedula del usuario no se encuentra registrada como personal capacitado</strong> por favor intente con una diferente
                                            </div>
                                            <?php } ?>
                                            <?php if (isset($existe)&&$existe==2) {?>
                                                    <div class="alert alert-danger alert-dismissible">
                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                        <strong>La cedula del usuario ya esta registrada con otro usuario.</strong> por favor intente con una diferente
                                                    </div>
                                            <?php } ?>
                                            <div class="form-group">
                                                <label class="control-label label-default">Cedula del Usuario en caso de que este registrado como personal capacitado (Opcional)</label>
                                                <input type="text" name="cedula" maxlength="8" class="form-control" placeholder="Ejemplo:26556987" onkeypress="return numero(event);">
                                            </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading checkbox-group">Funciones / Responsabilidad</div>
                                                        <div class="panel-body">
                                                        <label><input type="radio" name="optradio" value="1" checked>Control total</label>
                                                        <label><input type="radio" name="optradio" value="2">Secretaria</label>
                                                        <label><input type="radio" name="optradio" value="3">Entrenador</label>
                                                   
                                                        <div class="" id="2" style="display: none;">
                                                            <h4>Seleccione los modulos de acceso para el usuario:</h4>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar personal capacitado" >Registrar Personal Capacitado</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Personal Capacitado" >Modificar Personal Capacitado</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Eliminar Personal Capacitado" >Eliminar Personal Capacitado</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Atleta" >Registrar Atleta</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Atleta" >Modificar Atleta</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Eliminar Atleta" >Eliminar Atleta</label>
                                                        </div>
                                                        <div class="" id="3" style="display: none;">
                                                            <h4>Seleccione los modulos de acceso para el entrenador:</h4>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Aplicación de Pruebas" >Registrar Aplicación de Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Aplicación de Pruebas" >Modificar Aplicación de Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Reporte de la Aplicación de las Pruebas" >Reporte de la Aplicación de las Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar PDC" >Registrar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar PDC" >Modificar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Eliminar PDC" >Eliminar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Aplicación de PDC" >Registrar Aplicación de PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Aplicación de PDC" >Modificar Aplicación de PDC</label>
                                                        </div>
                                                     </div>
                                                
                                           
                                        </div>
                                       
                                        <div class="form-group input-group">
                                            <button name="submit" value="registrarAdm" type="submit" class="btn btn-success">Registrar</button>
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
    <script src="assets/js/jquery-3.3.1.min.js"></script>
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
    <script type="text/javascript">
            $(document).ready(function(){
 
                
            //recibe evento al realizar click dentro del elemento que contiene la clase img
            $(".img").click(function(){
 
            //comprobamos si existe una imagen seleccionada
            if ( $( ".img" ).hasClass( "img-selected" ) ) {
            /*en el caso que exista ya una imagen seleccionada la eliminamos para que únicamente solo se tenga una imagen seleccionada*/
            $(".img").removeClass("img-selected");
            }
            //añadimos la clase de la imagen seleccionada
            $(this).addClass("img-selected");
            });
            });
    </script>
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
         <!-- script para validaciones -->
     <script type="text/javascript" src="assets/js/valida.js"></script>
   
    
    <script src="assets/js/stepform.js" type="text/javascript"></script>
    <script src="assets/js/img-preview.js" type='text/javascript'></script>

</body>
</html>
