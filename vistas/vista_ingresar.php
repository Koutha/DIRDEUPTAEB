<?php
require('core/sist-header.php');
?>
<body style="background-image: url(assets/images/fondoUPTAEB.jpg);background-position: center center;background-repeat: no-repeat;background-attachment: fixed;background-size: cover;">
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2> Sistema de gestión y seguimiento de atletas </h2>
               
                <h5> <strong> Dirección de deportes</strong> </h5>
                 <br />
            </div>
        </div>

         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading" style="color: #fcfcfc;">
                        		<strong> <center>Ingreso al sistema</center> </strong>  
                            </div>
                            <div class="panel-body">
                              <?php if (isset($_GET['recupero']) && $_GET['recupero'] == 1) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>se actualizo su contraseña exitosamente</strong>  
                            </div>
                        <?php } ?>
                              <?php if (isset($pw)&&$pw==0) {?>
                                      <div class="alert alert-danger alert-dismissible">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                          <strong>Contraseña incorrecta</strong> por favor intentelo de nuevo.
                                        </div>
                              <?php } ?>
                              <?php if (isset($user)&&$user==0) {?>
                                      <div class="alert alert-info alert-dismissible">
                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                          <strong>Usuario incorrecto</strong> por favor intentelo de nuevo.
                                        </div>
                              <?php } ?>
                                <form action=" " method="post" role="form">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="username" placeholder="Usuario " required />
                                      </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input name="password" type="password" autocomplete="off" class="form-control"  placeholder="Contraseña" required />
                                      </div>
                                      <div class="form-group" >
                                          <button name="submit" value="login" type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-log-in"></span> Ingresar</button>
                                        	<!-- <input type="submit" name="Submit" value="login" class="btn btn-primary "> -->
                                          <a href="?action=recuperarContraseña" class="btn btn-danger"> <span class="glyphicon glyphicon-log-out"></span> Recuperar Contraseña</a>
                                      </div>
                                    <hr />
                                </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


     <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
   
</body>
</html>
