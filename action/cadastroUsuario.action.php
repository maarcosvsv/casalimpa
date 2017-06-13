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
        $ddd = $_POST['dddTelefone'];
        $telefone = $_POST['telefone'];
        $nasc_dia = $_POST['nasc_dia'];
        $nasc_mes = $_POST['nasc_mes'];
        $nasc_ano = $_POST['nasc_ano'];
        $dataNascimento = $nasc_ano."-".$nasc_mes."-".$nasc_dia;
        $idLogradouro = $_POST['idLogradouro'];
        $complementoEndereco = $_POST['complemento'];
        $tipoUsuario = $_POST['tipoUsuario'];
  
        $dataExpiracao = date('Y-m-d', strtotime("+90 days"));  
        $telefoneCompleto = $ddd.$telefone;
        
        $logradouro = new Logradouro($idLogradouro, null, null, null);
              
        $usuario = new Usuario(null, $login, $senha, $email, $dataExpiracao, 1, $complementoEndereco, $logradouro, null, $docIdentificacao);
        $empregado = new Empregado(null, $usuario, $nome, $telefoneCompleto, null, null);
        
        if($tipoUsuario == "EMPREGADO"){
        $empregadoDAO = new EmpregadoDAO();
        $error = $empregadoDAO->incluirEmpregado($empregado);
        }else if($tipoUsuario == "EMPREGADO"){
            $empregadoDAO = new EmpregadoDAO();
          $error = $empregadoDAO->incluirEmpregador($usuario, $nome, $telefoneCompleto, $dataNascimento);
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
    <input type="submit"  value="Voltar para página principal."/>
</form>
     
            <?php
        }else{
             ?>
      <p>Prezado <?php echo $_POST['nome']; ?>, ocorreu um erro ao salvar sua solicitação, por favor tente novamente.</p>
        <br><br><br>
      <input type="submit"  onClick="history.go(-1)" value="Voltar para página anterior."/>
          <?php
            }
               ?>
    
      
	
	</div>


</div>
</body>
</html>
        
        
        