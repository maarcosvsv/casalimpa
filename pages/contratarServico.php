<?php
include_once '../entity/Usuario.class.php';
session_start();
include_once '../dao/Servico.dao.php';

include '../resources/layoutInterno.php';

if(isset($_GET['codServico'])){
$codServico = $_GET['codServico'];}
else{
    $idBairro = null;
}

$servicoDAO = new ServicoDAO();
$servico = $servicoDAO->getServicoPorCodigo($codServico);


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
                     
                        <h3>Contratar um serviço</h3>
                        
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
             echo '<td width="10%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
        
           
        }
       
                
        
        echo"<td><b>Prazo Médio:</b> ".$servico['prazoServico']."<br>";
        echo"<b>Preço Sugerido:</b> R$ ".$servico['precoServico']."<br>";
        echo"<b>Categoria:</b> ".$servico['nomeServico']."<br>";
        echo"<b>Prestador do Serviço:</b> ".$servico['nome']."<br>";
        echo"<b>Cidade Principal:</b> ".$servico['nomeCidade']." - ".$servico['nomeBairro']." </td>";
        
       
        echo"</tr>";
        }//for
        echo"</table>";
        }?>
                        <form id="formContratarServico" method="POST" action="../action/contratarServico.action.php">
                        <div class="form-group" >
                            
                                <input style="display: none;" id="codServico" name="codServico" value="<?php echo($codServico)?>">
                          
                                
                            <label  for="dataInicio">Para quando é o serviço?</label>
                            <input type="text" id="dataInicio" name="dataInicio" onkeyup="mascara(this, mdata);" maxlength="10" class="form-control" placeholder="Data de início" aria-describedby="basic-addon1" required>
  </div>

                             <div class="form-group" >
  <label  for="dataFim">Até quando você precisa deste serviço?</label> 
 
  
  <input type="text" id="dataFim" name="dataFim"  onkeyup="mascara(this, mdata);"  class="form-control" maxlength="10" placeholder="Data de fim" aria-describedby="basic-addon1" required>
    </div>
                            
                             <div class="form-group" >
  <label  for="dataFim">Qual o horário para iniciar o serviço?</label> 
 
  
  <input type="text" id="horario" name="horario"    onkeyup="mascara(this, mhora);"  class="form-control" maxlength="5" placeholder="Horário de Início" aria-describedby="basic-addon1" required>
    </div>

   <div class="form-group" >
  <label  for="turnoPreferencia">Qual o turno de sua preferência?</label>
  <select class="form-control" id="turnoPreferencia" name="turnoPreferencia" required>
 
   <option value="MATUTINO">Matutino - Manhã</option>
   <option value="VESPERTINO">Vespertino - Tarde</option>
   <option value="INTEGRAL">Integral - Horário comercial (8h - 18h)</option>
  </select> </div>
  
  <div class="form-group" >
  <label  for="cep">Qual o endereço?</label>
 <input type="text" id="cep" name="cep" onkeypress="return MM_formtCep(event,this,'#####-###');" maxlength="9" class="form-control" placeholder="CEP" required ><br/>
  </div>
                            <div class="form-group" >
                                  <label  for="enderecoCompleto">Endereço selecionado: </label>
      	<input type="text" id="enderecoCompleto" name="enderecoCompleto" class="form-control" placeholder="Endereço" disabled="true"/><br/>
       
                   <div class="form-group" >
  <label  for="complemento">Complemento para o Endereço</label> 
 
  
  <input type="text" id="complemento" name="complemento"    class="form-control"  placeholder="Complemento do endereço" aria-describedby="basic-addon1" required>
    </div>
                            </div>          
  <input style="display:none;" type="text" id="idLogradouro" name="idLogradouro" />
                          
                                <br>
  <center>
  <button type="submit" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-share-square-o fa-fw"></i> <span class="network-name">Solicitar</span>
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

   
<script>
      $(document).ready(function () {
        $('#dataInicio').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
           
        });
      });
    </script>
    <script>
      $(document).ready(function () {
        $('#dataFim').datepicker({
            format: "dd/mm/yyyy",
            language: "pt-BR",
           
        });
      });
    </script>
        </div></div>

</body>

</html>
