<?php
include_once '../entity/Usuario.class.php';
include_once '../dao/Servico.dao.php';

session_start();


if(isset($_POST['idCidade'])){
  $idCidade = $_POST['idCidade'];  
}else {
    $idCidade = null;
}

if(isset($_POST['idBairro'])){
$idBairro = $_POST['idBairro'];}
else{
    $idBairro = null;
}

if(isset($_POST['idCategoriaServico'])){
$idCategoriaServico = $_POST['idCategoriaServico'];}
else{
    $idCategoriaServico = null;
}




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
                     
                        <h3>Serviços encontrados</h3>
                        <hr class="intro-divider">
 
                       
         
                        
                         
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
$servicos = $servicoDAO->getServicosPorFiltro($idCidade, $idBairro, $idCategoriaServico,$startrow);




   $num= sizeof($servicos);
        if($servicos != NULL)
        {
         echo ' <table class="table" border="0" style="width: 100%" >';
        foreach($servicos as $servico)
        {
       
        echo "<tr>";
        if($servico['imagemPrincipal'] != null){
         echo '<td width="10%"><img height="200" width="200" src="data:image/jpeg;base64,' .  base64_encode($servico['imagemPrincipal']). '" /></td>';
           
        }else{
             echo '<td width="10%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
        
           
        }
       
                
          echo"<td><b>Categoria: </b>R$ ".$servico['nomeServico']."<br>";
        echo" <b>Preço solicitado: </b> ".$servico['precoServico']."<br>";
        echo"<b>Prazo médio para realização:</b> ".$servico['prazoServico']."<br>";
        echo "<b>Categoria: </b>".$servico['nome']."<br>";
        echo"<b>Cidade Principal: </b>".$servico['nomeCidade']." - ".$servico['nomeBairro']." <br>";
        
       
       
        echo '<br>
            <a href="contratarServico.php?codServico='.$servico['codigoServico'].'" >
 
  <button type="button" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-usd fa-fw"></i> <span class="network-name">Solicitar este serviço</span>
</button>
  </a>';
        echo"</tr>";
        }//for
        echo"</table>";
        }else{
            echo 'Nenhum serviço encontrado nessa busca. <a href="buscarServicos.php">Tente novamente clicando aqui.</a>';
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
