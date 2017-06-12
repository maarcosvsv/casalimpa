<?php
include_once '../entity/Usuario.class.php';
include_once '../dao/Servico.dao.php';


session_start();

include '../dao/Endereco.dao.php';
$servicoDAO = new ServicoDAO();
$enderecoDAO = new EnderecoDAO();
$cidades = $enderecoDAO->getCidades();
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
$categoriaServico = false;
if($idCidade > 0){
    $bairros = $enderecoDAO->getBairrosPorCidade($idCidade);
}else if($idCidade == "todasCidades"){
   $categoriaServico = true;
   $categoriasServico = $servicoDAO->getCategoriasServico();

}else if($idBairro == "todosBairros"){
   $categoriaServico = true;
   $categoriasServico = $servicoDAO->getCategoriasServico();

}else if($idBairro > 0){
    $categoriaServico = true;
     $categoriasServico = $servicoDAO->getCategoriasServico();

  
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
                     
                        <h3>Encontrar um serviço</h3>
                        <hr class="intro-divider">
 
                        <form id="formFiltro" method="POST" action="buscarServicos.php">
                       
         
                        
                         
                       
                
   <?php 
  
if($idCidade == null && $idBairro == null){
   ?>
 <div class="form-group">
  <label for="sel1">Filtrar por cidade</label>
  <select class="form-control" id="idCidade" name="idCidade" onchange="this.form.submit()" >
 
  
  <option value="todasCidades">Todas as cidades</option>
  <?php foreach($cidades as $cidade){
  echo '<option value="'.$cidade->getIdCidade().'">'.$cidade->getNomeCidade().'</option>';
  }?>
  </select>
          <br>
  <center>
  <button type="submit" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-search fa-fw"></i> <span class="network-name">Filtrar</span>
</button>
  </center>
              
</div>    
                           
      <?php 
}
   ?>               
                            
                            
                                            <?php 
  
if($idCidade > 0){
   ?>
                         <div class="form-group">
  <label for="sel1">Filtrar por bairros</label>
  <select class="form-control" id="idBairro" name="idBairro" >
 
  <option value="todosBairros">Todos os bairros</option>
  <?php foreach($bairros as $bairro){
  echo '<option value="'.$bairro->getIdBairro().'">'.$bairro->getNomeBairro().'</option>';
  }?>
  </select>
                        <br>
  <center>
  <button type="submit" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-search fa-fw"></i> <span class="network-name">Filtrar</span>
</button>
  </center>
  
</div>   
                            
                                <?php 
}
   ?>  
            </form>   
              <?php 
  
if($categoriaServico == true){
   ?>
                          <form id="formFiltro" method="POST" action="buscarServicos_lista.php">
                              <input style="display: none;" id="idCidade" name="idCidade" value="<?php echo($idCidade)?>">
                              <input style="display: none;" id="idBairro" name="idBairro" value="<?php echo($idBairro)?>">
                            
  <div class="form-group">
  <label for="sel1">Filtrar por categoria de serviços</label>
  <select class="form-control" id="idCategoriaServico" name="idCategoriaServico" required>
 
   <option value="todosBairros">Todos as categorias</option>
  <?php foreach($categoriasServico as $categoriaServico){
  echo '<option value="'.$categoriaServico['cod_categoria_servico'].'">'.$categoriaServico['nome'].' - NDF: '.$categoriaServico['nivel_dificuldade'].'</option>';
  }?>
  </select>
</div>
                             <br>
  <center>
  <button type="submit" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-search fa-fw"></i> <span class="network-name">Procurar serviços</span>
</button>
  </center>
                          </form>
                           
      <?php 
}
   ?>               
         
                            
      
                    
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

   
        </div></div>

</body>

</html>
