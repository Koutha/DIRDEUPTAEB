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
                
                        
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="panel panel-default">
                            <a class="btn btn-info" href="<?php echo "?action=consultarAplicacionPdc&programa=".$pdc[0]['nombre_pdc']; ?>" style="float: right;">Volver</a>
                            <div class="panel-heading" style="color: #fcfcfc;">
                                <center>Calendario de planificaciones</center>
                            </div>
                            <div class="panel-body">
                                <div id='calendar'></div> <!--Calendario-->
                                <!-- Contenido del modal consultar-->
                                <div class="modal fade" id="consultar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <!-- form asignarAtletas elements -->
                                            <form action="" method="post" role="form" class="form-group">
                                                <div class="informacion"> <!-- Seccion Informacion -->
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title text-center">Datos de la sesion de entrenamiento</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <dl class="dl-horizontal">
                                                            
                                                            <dt>Nombre:</dt>
                                                            <dd id="title"></dd>
                                                            <dt>Descripcion:</dt>
                                                            <dd id="descripcion"></dd>
                                                            <dt>Disciplina:</dt>
                                                            <dd id="disciplina"></dd>
                                                            <dt>Tipo de Planificacion:</dt>
                                                            <dd id="tipo_pdc"></dd>
                                                            <dt>Inicio del Dia:</dt>
                                                            <dd id="start"></dd>
                                                            <dt>Finalización:</dt>
                                                            <dd id="end"></dd>
                                                        </dl>
                                                        <h4 class="modal-title text-center">Aspectos a trabajar en la sesion</h4>
                                                        <div class="row">
                                            <div class="checkbox-group form-group">
                                                <div class="col-md-4" id="tecnica" >
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="tecnica_dia" id="tecnica_dia" value="1" required readonly>Técnica</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="tactica" >
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="tactica_dia" id="tactica_dia" value="1" required readonly>Táctica</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="fisico">
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="fisico_dia" id="fisico_dia" value="1" required readonly>Físico</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="psicologico">
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="psicologico_dia" id="psicologico_dia" value="1" required readonly>Psicológico</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="velocidad">
                                                    <div class="form-group">
                                                        <div class="checkbox form-control">
                                                            <label><input class="checkbox" type="checkbox" name="velocidad_dia" id="velocidad_dia" value="1" required readonly>Velocidad</label>
                                                        </div>
                                                    </div>
                                                </div>
                                             </div>   
                                        </div>
                                                    </div>
                                                    <input type="hidden" name="id_dp" id="id_dp" value="">
                                                    <div class="modal-footer">
                                                      <!--  <button type="submit" name="submit" value="asignarDiaPdc" class="btn btn-warning"  >Planificar día </button> -->
                                                        <!--<button type="button" class="btn goToAsignar btn-warning"  >Asignar Atletas + </button> -->
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Volver</button>
                                                    </div>
                                                
                                                    <
                                                    
                                               
                                                </div><!--/. End Seccion Informacion <div class="informacion">  --> 
                                            </form> <!--/. End form asignarAtletas elements -->   
                                        </div><!--/. End div class="modal-content" -->
                                    </div><!--/. End div class="modal-dialog" --> 
                                </div><!--/.modal consultar -->
                            </div><!--/.panel-body -->
                        </div><!--/.panel panel-default -->
                    </div><!-- /. col-md-12  -->
                </div><!-- /. ROW  --> 
            </div><!-- /. PAGE INNER  -->     
        </div><!-- /. PAGE WRAPPER  -->       
    </div> <!-- /. WRAPPER  -->
   
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    <!-- script para validaciones -->
    <script src="assets/js/valida.js" type="text/javascript" ></script>
    <!-- CALENDAR -->
    <script src='assets/js/moment.min.js'></script>
    <script src='assets/js/fullcalendar.min.js'></script>
    <script src='assets/locale/es-do.js'></script>
    <script>
      $(document).ready(function() {
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next', //today,
            center: 'title',
            right: 'month'  //agendaWeek,agendaDay,listWeek'
          },
          defaultDate: <?php $f_ini= new DateTime($pdc[0]['fecha_inicio']);
                            $fe= $f_ini->format('Y-m-d');
                            echo json_encode($fe);  ?>,
          navLinks: false, // can click day/week names to navigate views
          editable: false,
          eventLimit: true, // allow "more" link when too many events
          eventClick: function(event){ // al hacer click en el evento
            $('#consultar #id').text(event.id);
            $('#consultar #title').text(event.title);
            $('#consultar #descripcion').text(event.desc);
            $('#consultar #disciplina').text(event.disciplina);
            $('#consultar #tipo_pdc').text(event.tipo_pdc);
            $('#consultar #start').text(event.start.format('LLLL'));
            $('#consultar #end').text(event.end.format('LLLL'));
            $('#consultar #id_dp').val(event.id);
            if (event.tecnica_dia==1) {
                $('#consultar #tecnica').show();
                $('#consultar #tecnica_dia').prop('checked', true);
            }else{
                $('#consultar #tecnica').hide();
            }
            if (event.tactica_dia==1) {
                $('#consultar #tactica').show();
                $('#consultar #tactica_dia').prop('checked', true);
            }else{
                $('#consultar #tactica').hide();
            }
            if (event.fisico_dia==1) {
                $('#consultar #fisico').show();
                $('#consultar #fisico_dia').prop('checked', true);
            }else{
                $('#consultar #fisico').hide();
            }
            if (event.velocidad_dia==1) {
                $('#consultar #velocidad').show();
                $('#consultar #velocidad_dia').prop('checked', true);
            }else{
                $('#consultar #velocidad').hide();
            }
            if (event.psicologico_dia==1) {
                $('#consultar #psicologico').show();
                $('#consultar #psicologico_dia').prop('checked', true);
            }else{
                $('#consultar #psicologico').hide();
            }
            //$('#consultar #redir').attr("href","?action=asignarAtletaPdc&id="+event.id);
            $('#consultar').modal('show');
            return false;
          },
          selectable: false,
          selectHelper: true,
          /*select: function(start,end){ //funcion para pasar atributos al modal
            $('#registrarPdc #start').val(moment(start).format('YYYY-MM-DD h:mm A'));
            $('#registrarPdc #end').val(moment(end).format('YYYY-MM-DD h:mm A'));
            $('#registrarPdc').modal('show');
          },*/
            events: [
                    <?php if(!empty($pdc))foreach ($pdc as $key) { ?>
                        {
                      id:    '<?php echo $key['id_dp']; ?>',
                      title: '<?php echo $key['nombre_pdc']; ?>',
                      desc:  '<?php echo $key['descripcion']; ?>',
                      disciplina:  '<?php echo $key['nombre_disciplina']; ?>',
                      id_disciplina: '<?php echo $key['id_disciplina']; ?>' ,
                      tipo_pdc:  '<?php echo $key['tipo_pdc']; ?>',
                      start: '<?php echo $key['fecha_dia']; ?>',
                      end: '<?php   $end= new DateTime($key['fecha_dia']);
                                    $end->add(new DateInterval('PT16H')); //16 horas agregadas a la fecha de inicio
                                    echo $end->format('Y-m-d H:i:s'); ?>',
                      color: getRandomColor(),
                      tactica_dia:  '<?php echo $key['tactica_dia']; ?>',
                      tecnica_dia:  '<?php echo $key['tecnica_dia']; ?>',
                      fisico_dia:  '<?php echo $key['fisico_dia']; ?>',
                      velocidad_dia:  '<?php echo $key['velocidad_dia']; ?>',
                      psicologico_dia:  '<?php echo $key['psicologico_dia']; ?>',
                        },
                   <?php   }  ?>
                    
            ]
        });

      });
    </script>
    <script type="text/javascript">
        $('.goToAsignar').on("click", function(){
            $('.asignarAtletas').slideToggle();
            $('.informacion').slideToggle();
        });
        
        $('.goToInformacion').on("click", function(){
            $('.informacion').slideToggle();
            $('.asignarAtletas').slideToggle();
        });
        $("button[data-number=1]").click(function(){
            $('#modalConfirmar').modal('hide');
        });
    </script>
    <script type="text/javascript">
        //select all checkboxes
        $("#select_all").change(function(){  //"select all" change
            $(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });
        //".checkbox" change
        $('.checkbox').change(function(){
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(false == $(this).prop("checked")){ //if this item is unchecked
                $("#select_all").prop('checked', false); //change "select all" checked status to false
            }
            //check "select all" if all checkbox items are checked
            if ($('.checkbox:checked').length == $('.checkbox').length ){
                $("#select_all").prop('checked', true);
            }
        });
    </script>
    
    
</body>