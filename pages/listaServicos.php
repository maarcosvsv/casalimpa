<?php
include_once '../entity/Usuario.class.php';
include_once '../dao/Servico.dao.php';

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$usuario = $_SESSION['usuario'];
$servicoDAO = new ServicoDAO();
$servicos = $servicoDAO->getServicoPorUsuario($usuario->getIdUsuario());
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
                     
                        <h3>Meus Serviços</h3>
                        
                        <hr class="intro-divider">
 
                        <div class="container">
                            
                            <center>
                                <a href="vincularServicoUsuario.php"
                            <button style="float: left;" type="button"  class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-plus-square fa-fw"></i>Adicionar novo serviço
                                    </button></a>
                                </center>
                            <table class="table table-inverse">
     <thead>
      <tr>
        <th>Serviço</th>
        <th>Prazo Médio</th>
        <th>Valor Cobrado</th>
        <th>Prestador</th>
        <th>Reg. Salarial</th>
        <th>Ações</th>
       
      </tr>
    </thead>
      <tbody>
        <?php
        
	foreach ($servicos as $servico){
            echo " <tr><th>".$servico['nomeServico']."</th>";
            echo "<th>".$servico['prazoServico']."</th>";
            echo "<th>".$servico['precoServico']."</th>";
            echo "<th>".$servico['nome']."</th>";
            echo "<th>".$servico['registro_salarial']."</th>";
           echo '<th><img src="data:image/jpeg;base64,' .  base64_encode($servico['imagemPrincipal']). '" /></th>';
               echo '<th><button type="submit" id="'.$servico['codigoServico'].'" class="btn btn-default" aria-label="Left Align">
  <i class="glyphicon glyphicon-eye-open"></i>
</button><a href="listaServicos.php?id='.$servico["codigoServico"].'"><button type="submit" id="'.$servico['codigoServico'].'" onClick="identifica(this);" class="btn btn-default" aria-label="Left Align">
  <i class="glyphicon glyphicon-remove"></i>
</button></a><button type="submit" id="'.$servico['codigoServico'].'" onClick="identifica(this);" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-sign-in fa-fw"></i>
</button></th>  </tr>';      
        }                                
        
        ?>            
          
    </tbody>    
  </table>
</div>
                      
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

        <div class="container view">
            <div class="row">
                <div class="col-md-12 ">
                
                    <?php include_once '../action/del_row.php'; ?> 
                                                          
                </div>
            </div>
        </div>
        
    </div>
    <!-- /.intro-header -->

   
        </div></div>

<script src="..\resources\js\visualizar.js"></script>

</body>

</html>
