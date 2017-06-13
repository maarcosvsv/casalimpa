<?php
include_once '../entity/Usuario.class.php';
session_start();
include_once '../dao/Servico.dao.php';

include '../resources/layoutInterno.php';
$usuario = $_SESSION['usuario'];
$idUsuario = $usuario->getIdUsuario();
if(isset($_GET['os'])){
$ordemServico = $_GET['os'];}
else{
    $ordemServico = null;
}

$servicoDAO = new ServicoDAO();
$servico = $servicoDAO->getOrdemServicoPorCodigo($ordemServico);



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
                     
                        <h3>Ordem de Serviço</h3>
                        
 <?php  $num= sizeof($servico);
        if($num>0)
        {
        echo ' <table class="table" border="0" style="width: 100%" >';
       
        
        foreach($servico as $servico)
        {
       
        echo "<tr>";
        if($servico['imagemPrincipal'] != null){
         echo '<td width="10%"><img height="200" width="200" src="data:image/jpeg;base64,' .  base64_encode($servico['imagemPrincipal']). '" /></td>';
           
        }else{
             echo '<td><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
        
           
        }
       
                
        
        echo"<td>Prazo Médio: ".$servico['prazoServico']."<br>";
        echo"Preço Sugerido: R$ ".$servico['precoServico']."<br>";
        echo"Categoria: ".$servico['nomeServico']."<br>";
        echo"Prestador do Serviço: ".$servico['nome']."<br>";
        echo"Cidade Principal: ".$servico['nomeCidade']." - ".$servico['nomeBairro']." <br>";
        echo"Cliente: ".$servico['nomeCliente']."<br>";
         echo"<b>Última atualização: </b>".$servico['descricaoSituacaoOS']."<br><br>";
        echo "</td>";
       
        echo"</tr>";
        }//for
        echo"</table>";
       
        echo "<br /><center>";
        if($servico['usuarioProfissionalID'] == $idUsuario  && $servico['idSituacaoOS'] == '1'){
            echo ' <a href="/casalimpa/action/ordemServico.action.php?op=confirmarInscricaoOS&idOs='.$servico['id_os'].'" >
                   <button type="button" class="btn btn-default" aria-label="Left Align">
                    <i class="fa fa-check fa-fw"></i> <span class="network-name">Confirmar realização </span></button></a>';
                echo ' <a href="/casalimpa/action/ordemServico.action.php?op=recusarServico&idOs='.$servico['id_os'].'" >
                   <button type="button" class="btn btn-default" aria-label="Left Align">
                    <i class="fa fa-times fa-fw"></i> <span class="network-name">Recusar realização </span></button></a>';

        }
        
           if($servico['usuarioClienteID'] == $idUsuario  && $servico['idSituacaoOS'] == '2' && date('Y-m-d', strtotime($servico['dt_fim'])) > date('Y-m-d') ){
            echo ' <a href="/casalimpa/action/ordemServico.action.php?op=confirmarRealizacaoAntecipada&idOs='.$servico['id_os'].'" >
                   <button type="button" class="btn btn-default" aria-label="Left Align">
                    <i class="fa fa-clock-o fa-fw"></i> <span class="network-name">Realização antecipada </span></button></a>';

        }
      
        
        if($servico['usuarioClienteID'] == $idUsuario  && $servico['idSituacaoOS'] == '2' && date('Y-m-d', strtotime($servico['dt_fim'])) <= date('Y-m-d') ){
            echo ' <a href="/casalimpa/action/ordemServico.action.php?op=confirmarRealizacaoAntecipada&idOs='.$servico['id_os'].'" >
                   <button type="button" class="btn btn-default" aria-label="Left Align">
                    <i class="fa fa-clock-o fa-fw"></i> <span class="network-name">Confirmar Realização </span></button></a>';

        }
        
        
        if($servico['usuarioProfissionalID'] == $idUsuario  && $servico['idSituacaoOS'] == '3' || $servico['usuarioProfissionalID'] == $idUsuario && $servico['idSituacaoOS'] == '4'){
            echo ' <a href="avaliarClienteOS.php?os='.$servico['id_os'].'" >
                   <button type="button" class="btn btn-default" aria-label="Left Align">
                    <i class="fa fa-user fa-fw"></i> <span class="network-name">Avaliar Cliente </span></button></a>';

        }
        
        if($servico['usuarioClienteID'] == $idUsuario  && $servico['idSituacaoOS'] == '3' || $servico['usuarioClienteID'] == $idUsuario  && $servico['idSituacaoOS'] == '5'){
            echo ' <a href="avaliarProfissionalOS.php?os='.$servico['id_os'].'" >
                   <button type="button" class="btn btn-default" aria-label="Left Align">
                    <i class="fa fa-user fa-fw"></i> <span class="network-name">Avaliar Prestador do Serviço </span></button></a>';

        }
            
            
  
   echo "</center>";
        
      //  usuarioCliente.id_usuario as usuarioClienteID
            
                
                
                
        }?>
                       
                        
                       
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
