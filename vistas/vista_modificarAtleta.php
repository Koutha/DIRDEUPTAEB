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
                        <h2>Registro de Administradores</h2>   
                        <h5> Modulo para el registro de administradores del sistema </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data" role="form" class="form-group">
                    
                    <div class="stepwizard col-md-offset-3">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step"> <a href="#step-1" class="btn btn-primary btn-circle">1</a>
                                <p>Personales</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-2" class="btn btn-default btn-circle" disabled="disabled">2</a>

                                <p>Académicos</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-3" class="btn btn-default btn-circle" disabled="disabled">3</a>

                                <p>Médicos</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-4" class="btn btn-default btn-circle" disabled="disabled">4</a>

                                <p>Uniformes</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-5" class="btn btn-default btn-circle" disabled="disabled">5</a>

                                <p>Disciplinas</p>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3> Datos Personales</h3>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cedula del Atleta</label>
                                    <input type="text" name="cedula" maxlength="8"  required="required" class="form-control" placeholder="Ejemplo:26556987" onkeypress="return numero(event);" value="<?php echo $atleta['cedula_atleta'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Nombres</label>
                                    <input type="text" name="nombres" maxlength="20" required="required" class="form-control" placeholder="Primer y segundo nombre"  onkeypress="return letra(event);" value="<?php echo $atleta['nombres'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Apellidos</label>
                                    <input type="text" name="apellidos" maxlength="20" required="required" class="form-control" placeholder="apellidos" onkeypress="return letra(event);" value="<?php echo $atleta['apellidos'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Fecha de Nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" required="required" class="form-control" value="<?php echo $atleta['fecha_nacimiento'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Direccion</label>
                                    <textarea name="direccion" required="required" maxlength="50" class="form-control" placeholder="Direccion donde vive" ><?php echo $atleta['direccion'];?></textarea>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Telefono movil</label>
                                    <input type="text" name="tel_movil" required="required" maxlength="11" class="form-control" onkeypress="return numero(event);" placeholder="Ejemplo: 04168987745" value="<?php echo $atleta['tel_movil'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Telefono fijo</label>
                                    <input type="text" name="tel_fijo"  maxlength="11" class="form-control" onkeypress="return numero(event);" placeholder="Ejemplo: 02515648897" value="<?php echo $atleta['tel_fijo'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Correo electronico</label>
                                    <input type="email" name="correo" required="required" class="form-control" value="<?php echo $atleta['correo'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Sexo</label>
                                    <select name="sexo" class="form-control" required="required" >
                                        <option value="" >Seleccione...</option>
                                        <option <?php if (isset($atleta)&&$atleta['sexo']=='masculino'){echo 'selected';} ?> value="masculino">Masculino</option>
                                        <option <?php if (isset($atleta)&&$atleta['sexo']=='femenino'){echo 'selected';} ?> value="femenino">Femenimo</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Foto</label>
                                    <input name="dir_foto" type="file" class="form-control-file" onchange="preview_image_foto(event)" >
                                </div>
                                <div class="form-group"> 
                                    <img <?php if(isset($atleta)){ echo 'src="'.$atleta['dir_foto'].'"';} ?> class="img-rounded" id="output_image_foto" style="max-width:300px"/>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Cedula</label>
                                    <input name="dir_cedula" type="file" class="form-control-file" onchange="preview_image_cedula(event)" >
                                </div>
                                <div class="form-group">
                                    <img <?php if(isset($atleta)){ echo 'src="'.$atleta['dir_cedula'].'"';} ?> class="img-rounded" id="output_image_cedula" style="max-width:300px" />
                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
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
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='1'){echo 'selected';} ?> value="1">PNF en Administracion</option>
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='2'){echo 'selected';} ?> value="2">PNF en Ciencias de la Información</option>
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='3'){echo 'selected';} ?> value="3">PNF en Contaduría Publica</option>
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='4'){echo 'selected';} ?> value="4">PNF en Turismo</option>
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='5'){echo 'selected';} ?> value="5">PNF en Agroalimentación</option>
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='6'){echo 'selected';} ?> value="6">PNF en Higiene y seguridad laboral</option>
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='7'){echo 'selected';} ?> value="7">PNF en Informática</option>
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='8'){echo 'selected';} ?> value="8">PNF en Sistemas de calidad y ambiente</option>
                                        <option <?php if (isset($atleta)&&$atleta['id_pnf']=='9'){echo 'selected';} ?> value="9">PNF en Deportes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Trayecto</label>
                                    <input type="number" name="trayecto"  min="0" max="4"  required="required"  class="form-control" value="<?php echo $atleta['trayecto'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Año de Ingreso</label>
                                    <input type="number" min="2000" max="2030" name="año_ingreso" required="required"  class="form-control" value="<?php echo $atleta['año_ingreso'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Planilla de Inscripción</label>
                                    <input name="dir_planilla" type="file" class="form-control-file" onchange="preview_image_planilla(event)" >
                                </div>
                                <div class="form-group"> 
                                    <img <?php if(isset($atleta)){ echo 'src="'.$atleta['dir_planilla'].'"';} ?> class="img-rounded" id="output_image_planilla" style="max-width:300px"/>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Carnet</label>
                                    <input name="dir_carnet" type="file"  class="form-control-file" onchange="preview_image_carnet(event)" >
                                </div>
                                <div class="form-group"> 
                                    <img <?php if(isset($atleta)){ echo 'src="'.$atleta['dir_carnet'].'"';} ?> class="img-rounded" id="output_image_carnet" style="max-width:300px"/>
                                </div>
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
                            <input type="number" name="estatura" min="1" max="4" step="0.01" class="form-control" required="required" placeholder="ejemplo: 1,71" value="<?php echo $atleta['estatura'];?>">
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Peso</label>
                            <input type="number" name="peso" min="1" max="200" step="0.001" class="form-control" required="required" placeholder="ejemplo: 65,500 ; para 65 kilos y 500 gramos" value="<?php echo $atleta['peso'];?>">
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Tipo de sangre</label>
                            <select name="tipo_sangre" class="form-control" >
                                <option value="">Seleccione...</option>
                                <option <?php if (isset($atleta)&&$atleta['tipo_sangre']=='A+'){echo 'selected';} ?> value="A+">A+</option>
                                <option <?php if (isset($atleta)&&$atleta['tipo_sangre']=='A-'){echo 'selected';} ?> value="A-">A-</option>
                                <option <?php if (isset($atleta)&&$atleta['tipo_sangre']=='B+'){echo 'selected';} ?> value="B+">B+</option>
                                <option <?php if (isset($atleta)&&$atleta['tipo_sangre']=='B-'){echo 'selected';} ?> value="B-">B-</option>
                                <option <?php if (isset($atleta)&&$atleta['tipo_sangre']=='O+'){echo 'selected';} ?> value="O+">O+</option>
                                <option <?php if (isset($atleta)&&$atleta['tipo_sangre']=='O-'){echo 'selected';} ?> value="O-">O-</option>
                                <option <?php if (isset($atleta)&&$atleta['tipo_sangre']=='AB+'){echo 'selected';} ?> value="AB+">AB+</option>
                                <option <?php if (isset($atleta)&&$atleta['tipo_sangre']=='AB+'){echo 'selected';} ?> value="AB-">AB-</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Alergias</label>
                            <textarea name="info_alergias"  class="form-control"><?php echo $atleta['info_alergias'];?></textarea>
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Contacto de Emergencia</label>
                            <input type="text" name="contacto_emergencia" maxlength="20" required="required" class="form-control" placeholder="Nombre y Apellido de una persona para contactar en caso de emergencia" onkeypress="return letra(event);" value="<?php echo $atleta['contacto_emergencia'];?>">
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Telefono de contacto</label>
                            <input type="text" name="tel_contacto" required="required" maxlength="11" class="form-control" onkeypress="return numero(event);" placeholder="Ejemplo: 04168987745" value="<?php echo $atleta['tel_contacto'];?>">
                        </div>
                        <div class="form_group">
                            <label  class="control-label label-default">¿Posee alguna discapacidad?</label>
                            <input type="radio" name="discapacidad" value="NO" checked> NO
                            <input type="radio" name="discapacidad" value="SI"> SI
                        
                        <div class="form-group-text" id="SI" style="display: none;">
                            <label  class="control-label label-default">Informacion de discapacidad</label>
                            <textarea name="info_discapacidad" class="form-control"><?php echo $atleta['info_discapacidad'];?></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                            <label  class="control-label label-default">Observaciones Médicas</label>
                            <textarea name="observaciones" class="form-control" placeholder="Observaciones medicas adicionales"><?php echo $atleta['observaciones'];?></textarea>
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
                                        <option <?php if (isset($atleta)&&$atleta['talla_franela']=='XS'){echo 'selected';} ?> value="XS"> XS </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_franela']=='S'){echo 'selected';} ?> value="S"> S </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_franela']=='M'){echo 'selected';} ?> value="M"> M </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_franela']=='L'){echo 'selected';} ?> value="L"> L </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_franela']=='XL'){echo 'selected';} ?> value="XL"> XL </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_franela']=='XXL'){echo 'selected';} ?> value="XXL"> XXL </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de pantalon</label>
                                    <select name="talla_pantalon" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_pantalon']=='XS'){echo 'selected';} ?> value="XS"> XS </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_pantalon']=='S'){echo 'selected';} ?> value="S"> S </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_pantalon']=='M'){echo 'selected';} ?> value="M"> M </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_pantalon']=='L'){echo 'selected';} ?> value="L"> L </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_pantalon']=='XL'){echo 'selected';} ?> value="XL"> XL </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_pantalon']=='XXL'){echo 'selected';} ?> value="XXL"> XXL </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de shorts</label>
                                    <select name="talla_short" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_short']=='XS'){echo 'selected';} ?> value="XS"> XS </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_short']=='S'){echo 'selected';} ?> value="S"> S </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_short']=='M'){echo 'selected';} ?> value="M"> M </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_short']=='L'){echo 'selected';} ?> value="L"> L </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_short']=='XL'){echo 'selected';} ?> value="XL"> XL </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_short']=='XXL'){echo 'selected';} ?> value="XXL"> XXL </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de zapatos</label>
                                    <select name="talla_zapato" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='35'){echo 'selected';} ?> value="35"> 35 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='36'){echo 'selected';} ?> value="36"> 36 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='37'){echo 'selected';} ?> value="37"> 37 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='38'){echo 'selected';} ?> value="38"> 38 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='39'){echo 'selected';} ?> value="39"> 39 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='40'){echo 'selected';} ?> value="40"> 40 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='41'){echo 'selected';} ?> value="41"> 41 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='42'){echo 'selected';} ?> value="42"> 42 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='43'){echo 'selected';} ?> value="43"> 43 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='44'){echo 'selected';} ?> value="44"> 44 </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_zapato']=='45'){echo 'selected';} ?> value="45"> 45 </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de gorra</label>
                                    <select name="talla_gorra" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_gorra']=='S'){echo 'selected';} ?> value="S"> S </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_gorra']=='M'){echo 'selected';} ?> value="M"> M </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_gorra']=='L'){echo 'selected';} ?> value="L"> L </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_gorra']=='XL'){echo 'selected';} ?> value="XL"> XL </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Talla de chaqueta</label>
                                    <select name="talla_chaqueta" class="form-control" >
                                        <option value="">Seleccione...</option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_chaqueta']=='XS'){echo 'selected';} ?> value="XS"> XS </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_chaqueta']=='S'){echo 'selected';} ?> value="S"> S </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_chaqueta']=='M'){echo 'selected';} ?> value="M"> M </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_chaqueta']=='L'){echo 'selected';} ?> value="L"> L </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_chaqueta']=='XL'){echo 'selected';} ?> value="XL"> XL </option>
                                        <option <?php if (isset($atleta)&&$atleta['talla_chaqueta']=='XXL'){echo 'selected';} ?> value="XXL"> XXL </option>
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
                                <?php foreach ($disciplinas as $key => $value) { ?>
                                    <div class="checkbox form-control">
                                      <label><input class="single-checkbox" type="checkbox" name="id_disciplina[]" value="<?php  echo $value['id_disciplina'];?>" 
                                        <?php if($atletaDisciplinas[0]['id_disciplina']==$value['id_disciplina'] 
                                                or (isset($atletaDisciplinas[1]['id_disciplina']) 
                                                    && $atletaDisciplinas[1]['id_disciplina']==$value['id_disciplina']))
                                        {echo 'checked';}?> > 
                                        <?php echo $value['nombre'];?>
                                      </label>
                                    </div>
                               <?php } ?>
                                </div> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">        
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Anterior</button>
                        <button name="submit" type="submit" value="modificarAtleta" class="btn btn-success btn-lg pull-right">Aceptar</button>
                        
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
    <script src="assets/js/valida.js" type="text/javascript"></script>
    <script src="assets/js/stepform.js" type="text/javascript"></script>

    <script src="assets/js/img-preview.js" type='text/javascript'>

    </script>

</body>
</html>