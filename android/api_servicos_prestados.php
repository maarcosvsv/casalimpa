<?php
include_once '../entity/Usuario.class.php';
include_once '../dao/Servico.dao.php';

session_start();
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$idUsuario = $_POST['usuario'];
$idUsuario = $usuario->getIdUsuario();



include '../resources/layoutInterno.php';

        ?>

<div id="form" style="height: 500px !important">
	<div id="form1">

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                     
                        <h3>Serviços prestados</h3>
                       
 
                       
         
                        
                         
                <form method='get'>
<?PHP

//check if the starting row variable was passed in the URL or not
if (!isset($_GET['startrow']) or !is_numeric($_GET['startrow'])) {
  //we give the value of the starting row to 0 because nothing was found in URL
  $startrow = 0;
//otherwise we take the value from the URL
} else {
  $startrow = (int)$_GET['startrow'];
}
//this part goes after the checking of the $_GET var

$servicoDAO = new ServicoDAO();
$servicos = $servicoDAO->getServicosPrestadosPorUsuario($idUsuario,$startrow);




   $num= sizeof($servicos);
        if($servicos != NULL)
        {
        echo ' <table class="table" border="0" style="width: 100%" >';
        foreach($servicos as $servico)
        {
       
        echo "<tr>";
        if($servico['imagemPrincipal'] != null){
         echo '<td><img height="200" width="200" src="data:image/jpeg;base64,' .  base64_encode($servico['imagemPrincipal']). '" /></td>';
           
        }else{
             echo '<td><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
        
           
        }
       
                
          echo"<td><b>Iníco em:</b> ".$servico['dataInicio']." " ;
        echo" <b> até: </b> ".$servico['dataFim']."<br>";
        echo"<b>Preço Sugerido: </b>R$ ".$servico['precoServico']."<br>";
        echo"<b>Categoria: </b>".$servico['nomeServico']."<br>";
        echo"<b>Prestador do Serviço: </b>".$servico['nome']."<br>";
        echo"<b>Cidade Principal: </b>".$servico['nomeCidade']." - ".$servico['nomeBairro']." <br>";
         echo"<b>Última atualização: </b>".$servico['descricaoSituacaoOS']."<br><br>";
        
     
        
         echo '
            <a href="visualizarOrdemServico.php?os='.$servico['id_os'].'" >
  
  <button type="button" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-plus-square fa-fw"></i> <span class="network-name">Mais Informações</span>
</button>
  </a>';
        echo '</td>';
        echo"</tr>";
        }//for
        echo"</table>";
        }else{
            echo 'Você ainda não possui nenhuma ordem serviço vinculada ao seu perfil.';
        }
        
        
        $prev = $startrow - 5;
        ?>
<nav aria-label="...">
  <ul class="pager">

 
                    <?php
                    
                     if(!empty($servicos)){
if ($prev >= 0){
    
    
    echo '<li><a href="'.$_SERVER['PHP_SELF'].'?startrow='.$prev.'">Anterior</a></li>';
}

                    
if(sizeof($servicos) >= 5){
    echo '<li><a href="'.$_SERVER['PHP_SELF'].'?startrow='.($startrow+5).'">Próximo</a></li>';

                     }}

?>
 </ul>
</nav>

         
                            
      
                    
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

   
        </div></div>

</body>

</html>
