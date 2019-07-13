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
                        <h2>Registro de Atletas</h2>   
                        <!-- <h5> Modulo para el registro de administradores del sistema </h5> -->

                    </div>
                    <?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 1) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Registrado!</strong>  se ha registrado al atleta Exitosamente.
                            </div>
                        <?php unset($_SESSION['registro']); } ?>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data" role="form" class="form-group" id="form_atleta">
                    
                    <div class="stepwizard col-md-offset-3">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step"> <a href="#step-1"  class="btn btn-primary btn-circle">1</a>
                                <p>Personales</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-2"  class="btn btn-default btn-circle" disabled="disabled">2</a>

                                <p>Académicos</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-3"  class="btn btn-default btn-circle" disabled="disabled">3</a>

                                <p>Médicos</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-4"  class="btn btn-default btn-circle" disabled="disabled">4</a>

                                <p>Uniformes</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-5"  class="btn btn-default btn-circle" disabled="disabled">5</a>

                                <p>Disciplinas</p>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3> Datos Personales</h3>
                                <div class="form-group">
                                    <label class="control-label label-default">Cedula del Atleta</label>
                                    <input type="text" name="cedula" id="cedula" minlength="5" maxlength="8" required="required" class="form-control" placeholder="Ejemplo:26556987" autocomplete="off" onkeypress="return numero(event);">
                                </div>
                                <div class="form-group input-group alert alert-success" id= "cedulaD" style="display:none; ">
                                    <span  > Nombre de usuario disponible</span>
                                </div>
                                <div class="form-group input-group alert alert-danger" id= "cedulaND" style="display:none; ">
                                    <span > Nombre de usuario NO disponible</span>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Nombres</label>
                                    <input type="text" name="nombres" maxlength="20" required="required" class="form-control" placeholder="Primer y segundo nombre"  onkeypress="return letra(event);">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Apellidos</label>
                                    <input type="text" name="apellidos" maxlength="20" required="required" class="form-control" placeholder="apellidos" onkeypress="return letra(event);">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Fecha de Nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" max="<?php echo $date15YearsBefore=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")-15));?>" required="required" value="<?php echo $date15YearsBefore=date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")-15));?>" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Direccion</label>
                                    <textarea name="direccion" required="required" maxlength="35" class="form-control" placeholder="Direccion donde vive"></textarea>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Telefono movil</label>
                                    <input type="text" name="tel_movil" required="required" maxlength="11" class="form-control" onkeypress="return numero(event);" placeholder="Ejemplo: 04168987745">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Telefono fijo</label>
                                    <input type="text" name="tel_fijo" maxlength="11" class="form-control" onkeypress="return numero(event);" placeholder="Ejemplo: 02515648897">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Correo electronico</label>
                                    <input type="email" name="correo" required="required" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Sexo</label>
                                    <select name="sexo" class="form-control" required="required">
                                        <option value="">Seleccione...</option>
                                        <option value="masculino">Masculino</option>
                                        <option value="femenino">Femenimo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Foto</label>
                                    <input name="dir_foto" type="file" id="input-foto"  accept=".png,.jpg,.jpeg,.gif" required="required" class=" file form-control-file" data-msg-placeholder="Selecione una imagen .jpg | .pnf | .jpeg" data-allowed-file-extensions='["jpg","png","jpeg"]' data-show-upload="false" data-max-file-size="1000" onchange="preview_image_foto(event)" >
                                </div>
                                <!-- <div class="form-group"> 
                                    <img class="img-rounded" id="output_image_foto" style="max-width:300px"/>
                                </div> -->
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Cedula</label>
                                    <input name="dir_cedula" type="file" id="input-cedula" accept=".png,.jpg,.jpeg,.gif" required="required" class=" file form-control-file" data-msg-placeholder="Selecione una imagen .jpg | .pnf | .jpeg" data-allowed-file-extensions='["jpg","png","jpeg"]' data-show-upload="false" data-max-file-size="1000" onchange="preview_image_cedula(event)" >
                                </div>
                                <!-- <div class="form-group">
                                    <img class="img-rounded" id="output_image_cedula" style="max-width:300px" />
                                </div> -->
                                <button id="btnNextOne" class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-2">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3>Datos Académicos</h3>
                                <div class="form-group">
                                    <label  class="control-label label-default">PNF</label>
                                    <select name="pnf" class="form-control" required="required">
                                        <option value="">Seleccione...</option>
                                        <option value="1">PNF en Administracion</option>
                                        <option value="2">PNF en Ciencias de la Información</option>
                                        <option value="3">PNF en Contaduría Publica</option>
                                        <option value="4">PNF en Turismo</option>
                                        <option value="5">PNF en Agroalimentación</option>
                                        <option value="6">PNF en Higiene y seguridad laboral</option>
                                        <option value="7">PNF en Informática</option>
                                        <option value="8">PNF en Sistemas de calidad y ambiente</option>
                                        <option value="9">PNF en Deportes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Trayecto</label>
                                    <input type="number" name="trayecto"  min="0" max="4"  required="required"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Año de Ingreso</label>
                                    <input type="number" min="2000" max="2030" name="año_ingreso" required="required"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Planilla de Inscripción</label>
                                    <input name="dir_planilla" type="file" id="input-planilla" accept=".png,.jpg,.jpeg,.gif" required="required" class="file form-control-file" data-msg-placeholder="Selecione una imagen .jpg | .pnf | .jpeg" data-allowed-file-extensions='["jpg","png","jpeg"]' data-show-upload="false" data-max-file-size="1000" onchange="preview_image_planilla(event)" >
                                </div>
                                <!-- <div class="form-group"> 
                                    <img class="img-rounded" id="output_image_planilla" style="max-width:300px"/>
                                </div> -->
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Carnet</label>
                                    <input name="dir_carnet" type="file" id="input-carnet" accept=".png,.jpg,.jpeg,.gif" required="required" class="file form-control-file" data-msg-placeholder="Selecione una imagen .jpg | .pnf | .jpeg" data-allowed-file-extensions='["jpg","png","jpeg"]' data-show-upload="false" data-max-file-size="1000" onchange="preview_image_carnet(event)" >
                                </div>
                                <!-- <div class="form-group"> 
                                    <img class="img-rounded" id="output_image_carnet" style="max-width:300px"/>
                                </div> -->
                                <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Anterior</button>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-3">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3>Datos Médicos</h3>
                        <div class="form-group">
                            <label  class="control-label label-default">Estatura</label>
                            <input type="number" name="estatura" min="1" max="4" step="0.01" class="form-control" required="required" placeholder="ejemplo: 1,71" >
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Peso</label>
                            <input type="number" name="peso" min="1" max="200" step="0.001" class="form-control" required="required" placeholder="ejemplo: 65,500 ; para 65 kilos y 500 gramos" >
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Tipo de sangre</label>
                            <select name="tipo_sangre" class="form-control" >
                                <option value="">Seleccione...</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Alergias</label>
                            <textarea name="info_alergias"  class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Contacto de Emergencia</label>
                            <input type="text" name="contacto_emergencia" maxlength="20" required="required" class="form-control" placeholder="Nombre y Apellido de una persona para contactar en caso de emergencia" onkeypress="return letra(event);">
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Telefono de contacto</label>
                            <input type="text" name="tel_contacto" required="required" maxlength="11" class="form-control" onkeypress="return numero(event);" placeholder="Ejemplo: 04168987745">
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">¿Posee alguna discapacidad?</label>
                            <input type="radio" name="discapacidad" value="NO" checked> NO
                            <input type="radio" name="discapacidad" value="SI"> SI
                        
                        <div class="form-group-text" id="SI" style="display: none;">
                            <label  class="control-label label-default">Informacion de discapacidad</label>
                            <textarea name="info_discapacidad" class="form-control"></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Observaciones Médicas</label>
                            <textarea name="observaciones" class="form-control" placeholder="Observaciones medicas adicionales"></textarea>
                        </div>
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Anterior</button>
                        <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
                        </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-4">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3> Datos de Uniformes</h3>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de franela</label>
                                    <select name="talla_franela" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option value="XS"> XS </option>
                                        <option value="S"> S </option>
                                        <option value="M"> M </option>
                                        <option value="L"> L </option>
                                        <option value="XL"> XL </option>
                                        <option value="XXL"> XXL </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de pantalon</label>
                                    <select name="talla_pantalon" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option value="XS"> XS </option>
                                        <option value="S"> S </option>
                                        <option value="M"> M </option>
                                        <option value="L"> L </option>
                                        <option value="XL"> XL </option>
                                        <option value="XXL"> XXL </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de shorts</label>
                                    <select name="talla_short" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option value="XS"> XS </option>
                                        <option value="S"> S </option>
                                        <option value="M"> M </option>
                                        <option value="L"> L </option>
                                        <option value="XL"> XL </option>
                                        <option value="XXL"> XXL </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de zapatos</label>
                                    <select name="talla_zapato" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option value="35"> 35 </option>
                                        <option value="36"> 36 </option>
                                        <option value="37"> 37 </option>
                                        <option value="38"> 38 </option>
                                        <option value="39"> 39 </option>
                                        <option value="40"> 40 </option>
                                        <option value="41"> 41 </option>
                                        <option value="42"> 42 </option>
                                        <option value="43"> 43 </option>
                                        <option value="44"> 44 </option>
                                        <option value="45"> 45 </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de gorra</label>
                                    <select name="talla_gorra" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option value="S"> S </option>
                                        <option value="M"> M </option>
                                        <option value="L"> L </option>
                                        <option value="XL"> XL </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de chaqueta</label>
                                    <select name="talla_chaqueta" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option value="XS"> XS </option>
                                        <option value="S"> S </option>
                                        <option value="M"> M </option>
                                        <option value="L"> L </option>
                                        <option value="XL"> XL </option>
                                        <option value="XXL"> XXL </option>
                                    </select>
                                </div>
                                <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Anterior</button>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-5">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3>Disciplinas en las que participa</h3>
                               <div class="checkbox-group form-group">
                                <label  class="control-label label-default">Seleccione al menos una disciplina y maximo dos:</label>
                                <?php foreach ($disciplinas as $key => $value) {?>
                                    <div class="checkbox form-control">
                                      <label><input class="single-checkbox" type="checkbox" name="id_disciplina[]" value="<?php  echo $value['id_disciplina'];?>" required> <?php echo $value['nombre'];?></label>
                                    </div>
                               <?php } ?>
                                </div> 
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Anterior</button>
                        <button name="submit" type="submit" value="registrarAtleta" class="btn btn-success btn-lg pull-right">Registrar</button>
                        </div>
                        </div>
                    </div>
                </form>
                <!-- /. row  -->    
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
    <script src="assets/js/fileinput.min.js"></script>
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

<script type="text/javascript">
        $(document).ready(function(){
            $('#btnNextOne').click(function(event) {
            if ($('#cedula').val()=="") {
              alert('Debe introducir una cedula valida');  
                return false;
            }
        });
            $("#cedula").keyup(function(event){
                var cedula = $("#cedula").val();
                if (cedula.length>=8){
                    $.post('ajax/validarUsuario.php', $("#form_atleta").serialize(), function(respuesta){
                        //alert(respuesta); 
                        if (respuesta == 'false') {
                            $("#cedulaD").fadeIn();
                            $("#cedulaND").fadeOut();
                             // $("#cedula").attr("readonly", "readonly");  
                        }
                        else if(respuesta == 'true'){
                            $("#cedulaND").fadeIn();
                            $("#cedulaD").fadeOut();
                        }
                    })
                }else{
                    //alert('what saap');
                    $("#cedulaND").fadeOut();
                    $("#cedulaD").fadeOut();
                }
            });
            
            $("#input-foto").fileinput();
            $("#input-cedula").fileinput();
            $("#input-planilla").fileinput();
            $("#input-carnet").fileinput();
        })
    </script>
</body>
</html>