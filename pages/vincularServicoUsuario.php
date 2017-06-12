<?php
include_once '../entity/Usuario.class.php';
include_once '../dao/Servico.dao.php';

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$usuario = $_SESSION['usuario'];
$servicoDAO = new ServicoDAO();
$categoriasServico = $servicoDAO->getCategoriasServico();
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
                     
                        <h3>Vincular novo serviço à conta</h3>
                        
                        <hr class="intro-divider">
                        <p align="justify"> Abaixo você pode vincular um novo serviço a sua conta, preencha abaixo todas as informações acerca do serviço prestado, ao salvar este serviço já ficará disponível para os usuários do sistema.</p>  <br>
                        <form id="novoServico" enctype="multipart/form-data" action="/casaLimpa/action/vincularServicoUsuario.action.php" method="POST">
                                  <div class="form-group">
  <label for="sel1">Categoria do serviço prestado</label>
  <select class="form-control" id="idCategoriaServico" name="idCategoriaServico" required>
 

  <?php foreach($categoriasServico as $categoriaServico){
  echo '<option value="'.$categoriaServico['cod_categoria_servico'].'">'.$categoriaServico['nome'].' - NDF: '.$categoriaServico['nivel_dificuldade'].'</option>';
  }?>
  </select>
</div>    
                   <div class="form-group">
    <label  for="prazoServico">Prazo para atendimento</label>
   <input type="text" id="prazoServico" name="prazoServico" class="form-control" placeholder="Prazo médio para atendimento" aria-describedby="basic-addon1" required>
  
  </div>     
                                        <div class="form-group">
    <label for="preco">Preço sugerido</label>
  <input type="text" id="preco" name="preco" class="form-control" placeholder="Preço sugerido em R$" aria-describedby="basic-addon1" required>
   
  </div>   
                                        <div class="form-group">
    <label  for="observacoes">Observações importantes</label>
   <input type="text" id="observacoes" name="observacoes" maxlength="125" class="form-control" placeholder="Observações" aria-describedby="basic-addon1" required>
 
  
  </div>   
                     <div class="form-group">      
                         <label  for="observacoes">Imagem Principal</label><br>
                         <b>Importante:</b> Serviços com imagem tem uma melhor aceitação dos usuários!
                            
   <input id="imagemServico" name="imagemServico" type="file" value="" class="form-control" /> 
                     </div>
                                <center>
                            <button style="float: left;" type="submit"  class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-minus-squarefa-fw"></i>Salvar
                                    </button>
                  
                                
                                       <a href="listaServicos.php"
                            <button style="float: left;" type="button"  class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-minus-squarefa-fw"></i>Cancelar
                                    </button></a>
                                </center>
                            
                            </form>                
                          
                          
</div>
                      
                    </div>
                </div>
            </div>

      
  <center>
                              
   
        </div></div>

</body>

</html>
