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
  <i class="fa fa-plus-square fa-fw"></i>Adicionar um novo serviço
                                    </button></a>
                                </center>
                            <br> <br> <br>
        <?php
        if($servicos != null){
           
        
         echo ' <table class="table" border="0" style="width: 100%" >';
        foreach($servicos as $servico)
        {
       
        echo "<tr>";
        if($servico['imagemPrincipal'] != null){
         echo '<td width="10%"><img height="200" width="200" src="data:image/jpeg;base64,' .  base64_encode($servico['imagemPrincipal']). '" /></td>';
           
        }else{
             echo '<td width="10%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
        
           
        }
       
                
        echo"<td><b>Categoria:</b> ".$servico['nomeServico']."<br>" ;
        echo" <b>Prazo médio para atendimento: </b> ".$servico['prazoServico']."<br>";
        echo"<b>Preço Sugerido: </b>R$ ".$servico['precoServico']."<br>";
        echo"<b>Prestador: </b>".$servico['nome']."<br>";
        echo"<b>Registro Salarial Informado: </b>".$servico['registro_salarial']."<br>";
        echo '<br>
            <a href="/casaLimpa/action/desabilitarServico.action.php?id='.$servico["codigoServico"].'&acao=2" >
  
  <button type="button" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-low-vision fa-fw"></i> <span class="network-name">Desabilitar serviço</span>
</button>
  </a>';
              
        }                                
       
        }else{
            echo 'Você ainda não possui nenhum serviço vinculado ao seu perfil, adicione serviços ao seu perfil e comece sua divulgação!';
        }
        ?>            
     
</div>
                      
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
