<?php

  include '../resources/layoutPadrao.php';
session_start(); 
	if(isset($_SESSION["usuario"])){
		header('Location: /casaLimpa/pages/dashboard.php');
	}
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
                        
                        <h3>Contrate um Profissional</h3>
                        <hr class="intro-divider">
 <?php
                        if(!empty($_GET['login'])) {
                     
                        $message = $_GET['login'];
                        if($message == "false"){
                            ?>
                        <div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Login e/ou senha incorretos.
</div>
                        <?php
                        }
                        }
                        ?>
                        <form id="formLogin" method="POST" action="../action/login.action.php">
                        <div class="form-group" >
 
  <input type="text" id="loginUsuario" name="loginUsuario" class="form-control" placeholder="Usuário" aria-describedby="basic-addon1" required>
  <input type="password" id="senhaUsuario" name="senhaUsuario" class="form-control" placeholder="Senha" aria-describedby="basic-addon1" required>
</div>
                            <center>                   
<button type="submit" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-sign-in fa-fw"></i> <span class="network-name">Entrar</span>
</button>
                            </center>
                        
                             </form>
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
