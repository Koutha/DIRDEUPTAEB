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

                        <div class="col-md-10 col-md-offset-1 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
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
                                            <?php if(isset($restar)&&$restar==1){?>
                                            <strong>El nombre de usuario ya esta reguistrado pero esta como inactivo desea activarlo de nuebo?</strong>
                                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal" data-id="<?php echo "?action=modificarContraseña&id_username=".$username; ?>">restaurar</button>
                                            <?php }else{?>
                                            <strong>El nombre se usuario ya esta en uso</strong> por favor intente con uno diferente<br/> <?php } ?>
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
                                                            <?php if (isset($existe)&&$existe==0) {?>
                                                                <div class="alert alert-danger alert-dismissible">
                                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                    <strong>la cedula del usuario no se encuentra registrada como personal capacitado,</strong> por favor intente con una diferente
                                                                </div>
                                                            <?php } ?>
                                                             <?php if (isset($existe)&&$existe==2) {?>
                                                                    <div class="alert alert-danger alert-dismissible">
                                                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                        <strong>La cedula del usuario ya esta registrada con otro usuario,</strong> por favor intente con una diferente
                                                                    </div>
                                                                <?php } ?>
                                        <div class="form-group">
                                            <label class="control-label label-default">Cedula del Usuario en caso de que este registrado como personal capacitado (Opcional)</label>
                                            <input type="text" name="cedula" maxlength="8" value="<?php if($user['cedula']>0 or isset($cedula)){ echo $user['cedula']; if(isset($cedula)){echo $cedula;} }?>" class="form-control" placeholder="Ejemplo:26556987" onkeypress="return numero(event);">
                                        </div>
                                        <div class="panel panel-info">
                                            <div class="panel-heading">Funciones / Responsabilidad</div>
                                            <div class="panel-body">
                                                        <label><input type="radio" name="optradio" value="1" <?php if ($userrol['id_rol']==1) { ?>checked<?php } ?>>Control total</label>
                                                        <label><input type="radio" name="optradio" value="2" <?php if ($userrol['id_rol']==2) { ?>checked<?php } ?>>Secretaria</label>
                                                        <label><input type="radio" name="optradio" value="3" <?php if ($userrol['id_rol']==3) { ?>checked<?php } ?>>Entrenador</label>
                                                   
                                                        <div class="form-group-text" id="2" style="<?php if ($userrol['id_rol']!=2) {echo "display: none;"; } ?>">
                                                            <h4>Seleccione los modulos de acceso para el usuario:</h4>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar personal capacitado" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar personal capacitado")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Registrar Personal Capacitado</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Personal Capacitado" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar Personal Capacitado")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Modificar Personal Capacitado</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Eliminar Personal Capacitado" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Eliminar Personal Capacitado")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Eliminar Personal Capacitado</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Atleta" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar Atleta")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Registrar Atleta</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Atleta" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar Atleta")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Modificar Atleta</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Eliminar Atleta" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Eliminar Atleta")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Modificar Atleta</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Test" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar Test")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Registrar Test</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Test" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar Test")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Modificar Test</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Eliminar Test" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Eliminar Test")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Eliminar Test</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Aplicación de Pruebas" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar Aplicación de Pruebas")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Registrar Aplicación de Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Aplicación de Pruebas" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar Aplicación de Pruebas")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Modificar Aplicación de Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Reporte de la Aplicación de las Pruebas" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Reporte de la Aplicación de las Pruebas")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Reporte de la Aplicación de las Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar PDC")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Registrar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar PDC")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Modificar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Eliminar PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Eliminar PDC")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Eliminar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Aplicación de PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar Aplicación de PDC")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Registrar Aplicación de PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Aplicación de PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar Aplicación de PDC")){if($userrol['id_rol']==2) {?>checked<?php }}} ?>>Modificar Aplicación de PDC</label>
                                                        </div>
                                                        <div class="form-group-text" id="3" style="<?php if ($userrol['id_rol']!=3) {echo "display: none;"; } ?>">
                                                            <h4>Seleccione los modulos de acceso para el entrenador:</h4>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Aplicación de Pruebas" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar Aplicación de Pruebas")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Registrar Aplicación de Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Aplicación de Pruebas" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar Aplicación de Pruebas")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Modificar Aplicación de Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Reporte de la Aplicación de las Pruebas" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Reporte de la Aplicación de las Pruebas")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Reporte de la Aplicación de las Pruebas</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Atleta" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar Atleta")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Registrar Atleta</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Atleta" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar Atleta")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Modificar Atleta</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar PDC")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Registrar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar PDC")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Modificar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Eliminar PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Eliminar PDC")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Eliminar PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Registrar Aplicación de PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Registrar Aplicación de PDC")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Registrar Aplicación de PDC</label>
                                                            <label class="col-md-4 breadcrumb"><input  type="checkbox" name="permisos[]" value="Modificar Aplicación de PDC" <?php foreach ($todos as $key){if (($key['id_usuario']==$id)&&($key['permisos']=="Modificar Aplicación de PDC")){if($userrol['id_rol']==3) {?>checked<?php }}} ?>>Modificar Aplicación de PDC</label>
                                                        </div>
                                                     </div>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="id_cedula" value="<?php echo $user['cedula']; ?>">
                                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                                            <button name="submit" value="modificarUser" type="submit" class="btn btn-success">Actualizar</button>
                                            <!-- se cambio por button arriba <input name="Submit" type="submit" class="btn btn-success" value="registraradm"/> -->
                                        </div>
                                        <hr />
                                    </form>
                                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
                                                            <div class="modal-dialog modal-sm" role="document">
                                                              <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
                                                                    <h4 class="modal-title">Confirmación</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>¿Estas segur@ que quieres restaurar al usuario?</p>
                                                                    
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-warning" href="<?php echo "?action=modificarContraseña&id_username=".$username; ?>">Modificar</a>
                                                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Volver</button>
                                                                </div>
                                                              </div>
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
    <!--DEBE IR AL FINAL-->
    <!-- CUSTOM SCRIPTS -->
         <!-- script para validaciones -->
     <script type="text/javascript" src="assets/js/valida.js"></script>
   
    
    <script src="assets/js/stepform.js" type="text/javascript"></script>
    <script src="assets/js/img-preview.js" type='text/javascript'></script>

</body>
</html>
