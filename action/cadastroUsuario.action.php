<?php
    require_once '../dao/Empregado.dao.php';
     require_once '../entity/Empregado.class.php';
      require_once '../entity/Usuario.class.php';
      require_once '../entity/Logradouro.class.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

	$login = $_POST['login'];
        $senha = $_POST['senha'];
        $email = $_POST['email'];
        $docIdentificacao = $_POST['docIdentificacao'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $dataNascimento = $_POST['data_nascimento'];
        $dataNascimentoSQL = join('-',array_reverse(explode('/',$dataNascimento)));
 
        $idLogradouro = $_POST['idLogradouro'];
        $complementoEndereco = $_POST['complemento'];
        $tipoUsuario = $_POST['tipoUsuario'];
  
        $dataExpiracao = date('Y-m-d', strtotime("+90 days"));  
        $telefoneCompleto = $telefone;
        
        $logradouro = new Logradouro($idLogradouro, null, null, null);
              
        $usuario = new Usuario(null, $login, $senha, $email, $dataExpiracao, 1, $complementoEndereco, $logradouro, null, $docIdentificacao);
        $empregado = new Empregado(null, $usuario, $nome, $telefoneCompleto, null, null);
        $error = false;
        if($tipoUsuario == "EMPREGADO"){
        $empregadoDAO = new EmpregadoDAO();
        $error = $empregadoDAO->incluirEmpregado($empregado);
        }else if($tipoUsuario == "EMPREGADOR"){
            $empregadoDAO = new EmpregadoDAO();
          $error = $empregadoDAO->incluirEmpregador($usuario, $nome, $telefoneCompleto, $dataNascimentoSQL);
        }
        
       
        
        include '../resources/layoutPadrao.php';
        ?>

<div id="form" style="height: 500px !important">
	<div id="form1">
<p>Cadastro.</p>
<?php
 if($error == true){
        ?>
         <p>  Prezado <?php echo $_POST['nome']; ?>, seu cadastro foi realizado com sucesso, para continuar faça login no sistema e atualize seus dados.</p>
              <br><br><br>
              <form  action="/casaLimpa">
                  <center>
                        <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <i class="fa fa-home fa-fw"></i> <span class="network-name">Voltar para página principal.</span>
                        </button>
                    </center>
  
</form>
     
            <?php
        }else{
             ?>
      <p>Prezado <?php echo $_POST['nome']; ?>, ocorreu um erro ao salvar sua solicitação, por favor tente novamente.</p>
        <br><br><br>
           <center>
                        <button type="submit" onClick="history.go(-1)" class="btn btn-default" aria-label="Left Align">
                            <i class="fa fa-reply fa-fw"></i> <span class="network-name">Voltar para página anterior.</span>
                        </button>
                    </center>
    
          <?php
            }
               ?>
    
      
	
	</div>


</div>
</body>
</html>
        
        
        