<?php
include_once '../entity/Usuario.class.php';
session_start();
include '../resources/layoutInterno.php';
        ?>

<div id="form" style="height: 500px !important">
	<div id="form1">

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <div class="intro-message">
                        <h1>Casa Limpa</h1>
                        
                        <h3>DASHBOARD</h3>
                        <hr class="intro-divider">
 
                        <form id="formLogin" method="POST" action="../action/login.action.php">
                        <div class="form-group" >
 
 </div>
                            <center>                   
<button type="submit" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-sign-in fa-fw"></i> <span class="network-name">Entrar</span>
</button>
                            </center>
                        
                             </form>
                        
                        <?php
	
	print_r($_SESSION['usuario']);
         
      

   ?>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

   
        </div></div>

</body>

</html>
