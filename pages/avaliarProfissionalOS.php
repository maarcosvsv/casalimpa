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
                     
                        <h3>Avaliar Profissional </h3>
                        
 <?php  $num= sizeof($servico);
        if($num>0)
        {
            echo  'Detalhes do serviço';
        echo ' <table class="table" border="0" style="width: 100%" >';
       
        
        foreach($servico as $servico)
        {
            $idOS = $servico['id_os'];
       
       
       
        echo "<tr>";
        if($servico['imagemPrincipal'] != null){
         echo '<td width="10%"><img height="250" width="250" src="data:image/jpeg;base64,' .  base64_encode($servico['imagemPrincipal']). '" /></td>';
           
        }else{
             echo '<td><img height="250" width="250" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
        
           
        }
       
                
        echo"<td><b>Categoria: </b>".$servico['nomeServico']."<br>";
        echo"<b>Prazo Médio:</b> ".$servico['prazoServico']."   ";
        echo"<b>Preço Sugerido:</b> R$ ".$servico['precoServico']."<br>";
        echo"<b>Solicitado para:</b>  ".$servico['dtInicioFormatada']." <b> até: </b>".$servico['dtFimFormatada']." <br>";
        echo"<b>Turno Preferencial:</b> ".$servico['turno_pref']."<br>";
        echo"<b>Cidade: </b>".$servico['nomeCidade']." <b>Bairro:</b> ".$servico['nomeBairro']." <br>";
        echo"<b>Endereço: </b>".$servico['Nome_logradouro']." - ".$servico['CEP_Logradouro']." <br>";
        echo"<b>Complemento: </b>".$servico['complemento_endereco']." <br>";
        echo"<b>Horário de preferência para início:</b> ".$servico['horario']."<br>";
        echo"<b>Prestador do Serviço: </b>".$servico['nome']."<br>";
        echo"<b>Cliente: </b>".$servico['nomeCliente']."<br>";
        echo"<b>Última atualização: </b>".$servico['descricaoSituacaoOS']."<br><br>";
        echo "</td>";
       
        echo"</tr>";
         echo"</table>";
        
      
          echo  'Detalhes do Prestador do Serviço';  
          echo ' <table class="table" border="0" style="width: 100%" >';
         echo "<tr>";
        if($servico['fotoPerfilProfissional'] != null){
         echo '<td width="10%"><img height="200" width="200" src="data:image/jpeg;base64,' .  base64_encode($servico['fotoPerfilProfissional']). '" /></td>';
            
        }else{
             echo '<td><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
        
           
        }
           
        
                
        
        echo"<td><b>Nome: </b>".$servico['nomeProfissional']."<br>";
        echo"<b>Telefone de contato:</b> ".$servico['telefoneProfissional']."<br>";
        echo"<b>E-mail:</b> ".$servico['emailProfissional']."<br>";
        echo"<b>Registro Salarial:</b> ".$servico['registroSalarialProfissional']."<br>";
        echo"<b>Área de atuação:</b> ".$servico['areaAtuacaoProfissional']."<br>";
        echo "</td>";
       
        echo"</tr>";
          echo"</table>";
        }//for
        echo"</table>";
       
        echo "<br />";
       
                
                
        }?>
                        <form id="formContratarServico" method="POST" action="/casalimpa/action/ordemServico.action.php?op=avaliacaoProfissional">
                        <div class="form-group" >
                            
                                <input style="display: none;" id="idOs" name="idOs" value="<?php echo $idOS; ?>">
                                
 
  <div class="form-group" >
  <label  for="mediaSatisfatoria">Qual o nível de satisfação com o prestador do serviço? </label>
  <select class="form-control" id="mediaSatisfatoria" name="mediaSatisfatoria" required>

   <option value=""> Escolha uma nota entre 1 e 5</option>
   <option value="1">1</option>
   <option value="2">2</option>
   <option value="3">3</option> 
   <option value="4">4</option>
   <option value="5">5</option>
   
  </select> </div>
                                 
                                  <div class="form-group" >
  <label  for="avaliacao">Qual a sua avaliação quanto ao atendimento prestado? </label>
  <select class="form-control" id="avaliacao" name="avaliacao" required>

   <option value=""> Escolha uma das opções</option>
   <option value="O serviço não ocorreu como eu esperava">O serviço não ocorreu como eu esperava.</option>
   <option value="O serviço ocorreu como eu esperava, mas não gostei do atendimento">O serviço ocorreu como eu esperava, mas não gostei do atendimento.</option> 
   <option value="O serviço ocorreu como eu esperava, e fui bem antendido(a)">O serviço ocorreu como eu esperava, e fui bem antendido(a).</option>
   <option value="O prestador de serviços me tratou mal de alguma forma">O prestador de serviços me tratou mal de alguma forma.</option>
   <option value="O serviço não foi realizado">O serviço não foi realizado.</option>
 
   
  </select> </div>
 

 
  <div class="form-group" >
  <label  for="consideracoes">Você gostaria de fazer alguma observação acerca do prestador do serviço?</label>
  <textarea rows="4" cols="50" id="consideracoes" name="consideracoes" class="form-control" ></textarea>
 
                          <br><center>
                            
                            
                  <button  type="submit"  class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-minus-squarefa-fw"></i>Finalizar Avaliação
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
