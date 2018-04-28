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
                        <h2>Registro de Personal</h2>   
                        <!-- <h5> Modulo para el registro de administradores del sistema </h5> -->

                    </div>
                </div>
                <!-- /. ROW  -->
               
                <div class="row">
                    <form action="" method="post" enctype="multipart/form-data" role="form" class="form-group">
                    
                    <div class="stepwizard col-md-offset-3">
                        <div class="stepwizard-row setup-panel">
                            <div class="stepwizard-step"> <a href="#step-1"  class="btn btn-primary btn-circle">1</a>
                            <p>Personales</p>
                            </div>
                            <div class="stepwizard-step"> <a href="#step-2"  class="btn btn-default btn-circle" disabled="disabled">2</a>
                            <p>Disciplinas</p>
                            </div>
                        </div>
                    </div>
                    <div class="row setup-content" id="step-1">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3> Datos Personales</h3>
                                <div class="form-group">
                                    <label class="control-label label-default">Cedula</label>
                                    <input type="text" name="cedula_et" maxlength="8" required="required" class="form-control" placeholder="Ejemplo:26556987" onkeypress="return numero(event)"; value="<?php echo $personal['cedula_et'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Nombres</label>
                                    <input type="text" name="nombres" maxlength="20" required="required" class="form-control" placeholder="Primer y segundo nombre"  onkeypress="return letra(event);" value="<?php echo $personal['nombres'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Apellidos</label>
                                    <input type="text" name="apellidos" maxlength="20" required="required" class="form-control" placeholder="apellidos" onkeypress="return letra(event)"; value="<?php echo $personal['apellidos'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Telefono movil</label>
                                    <input type="text" name="tel_movil" required="required" maxlength="11" class="form-control" onkeypress="return numero(event); "placeholder="Ejemplo: 04168987745"; value="<?php echo $personal['tel_movil'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Correo electronico</label>
                                    <input type="email" name="correo" required="required" class="form-control" value="<?php echo $personal['correo'];?>">
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargo</label>
                                    <select name="cargo" class="form-control" required="required">
                                        <option value="">Seleccione...</option>
                                        <option <?php if (isset($personal)&&$personal['cargo']=='entrenador'){echo 'selected';} ?> value="entrenador">Entenador</option>
                                        <option <?php if (isset($personal)&&$personal['cargo']=='medico'){echo 'selected';} ?> value="medico">Medico</option>
                                        <option <?php if (isset($personal)&&$personal['cargo']=='asistente'){echo 'selected';} ?> value="asistenete">Asistente</option>
                                        <option <?php if (isset($personal)&&$personal['cargo']=='terapeuta'){echo 'selected';} ?> value="terapeuta">Terapeuta</option>
                                        <option <?php if (isset($personal)&&$personal['cargo']=='otros'){echo 'selected';} ?> value="otros">Otros</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Foto</label>
                                    <input name="dir_foto" type="file" required="required" class="form-control-file" onchange="preview_image_foto(event)" >
                                </div>
                                <div class="form-group"> 
                                    <img <?php if(isset($personal)){ echo 'src="'.$personal['dir_foto'].'"';} ?> class="img-rounded" id="output_image_foto" style="max-width:300px"/>
                                </div>
                                <div class="form-group">
                                    <label  class="control-label label-default">Cargar Cedula</label>
                                    <input name="dir_cedula" type="file" required="required" class="form-control-file" onchange="preview_image_cedula(event)" >
                                </div>
                                <div class="form-group">
                                    <img <?php if(isset($personal)){ echo 'src="'.$personal['dir_cedula'].'"';} ?> class="img-rounded" id="output_image_cedula" style="max-width:300px" />
                                </div>
                                <button class="btn btn-primary nextBtn btn-lg pull-right" type="button">Siguiente</button>
                            </div>
                        </div>
                    </div>
                           <div class="row setup-content" id="step-2">
                        <div class="col-xs-6 col-md-offset-3">
                            <div class="col-md-12">
                                <h3>Disciplinas en las que participa</h3>
                               <div class="checkbox-group form-group">
                                <label  class="control-label label-default">Seleccione al menos una disciplina y maximo dos:</label>
                                <?php foreach ($disciplina as $key => $value) { ?>
                                    <div class="checkbox form-control">
                                      <label><input class="single-checkbox" type="checkbox" name="id_disciplina[]" value="<?php  echo $value['id_disciplina'];?>" 
                                        <?php if($personalDisciplinas[0]['id_disciplina']==$value['id_disciplina'] 
                                                or (isset($personalDisciplinas[1]['id_disciplina']) 
                                                    && $personalDisciplinas[1]['id_disciplina']==$value['id_disciplina']))
                                        {echo 'checked';}?> > 
                                        <?php echo $value['nombre'];?>
                                      </label>
                                    </div>
                               <?php } ?>
                                </div> 
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <button class="btn btn-primary prevBtn btn-lg pull-left" type="button">Anterior</button>
                        <button name="submit" type="submit" value="modificarPersonal" class="btn btn-success btn-lg pull-right">Aceptar</button>
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
     <script type="text/javascript" src="assets/js/valida.js"></script>
   
    
    <script src="assets/js/stepform.js" type="text/javascript"></script>
    <script src="assets/js/img-preview.js" type='text/javascript'></script>


  <!--  <script type="text/javascript">
    $(document).ready(function() {
        $("input[name$='discapacidad']").click(function() {
            var test = $(this).val();

            $("div.form-group-text").hide();
            $("#"+test).show();
        });
    });
    </script>

        <script type="text/javascript">
        $('input.single-checkbox').on('change', function(evt) {
            var limit = 2;
            if($("input[name='id_disciplina']:checked").length > limit) {
                this.checked = false;
            }
        });
    </script>
    <script type="text/javascript">
        $(function(){
            var requiredCheckboxes = $('.checkbox-group :checkbox[required]');
            requiredCheckboxes.change(function(){
                if(requiredCheckboxes.is(':checked')) {
                    requiredCheckboxes.removeAttr('required');
                } else {
                    requiredCheckboxes.attr('required', 'required');
                }
            });
        });
    </script> -->

</body>
</html>