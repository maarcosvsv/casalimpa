<?php

  include '../resources/layoutPadrao.php';
session_start(); 
	if(isset($_SESSION["usuario"])){
		header('Location: /casaLimpa/pages/dashboard.php');
	}
        ?>

<div id="form" style="margin-top: 2px !important;">
	<div id="form1" style="margin-top: 2px !important;">
           
        <div class="container">
              <div class="row">
                <div class="col-lg-12">
<p> Faça aqui o seu cadastro</p> <br>        

<form action="../action/cadastroUsuario.action.php" method="POST">
     <div class="form-group">
    
        Selecione abaixo o perfil que você gostaria e iniciar no CasaLimpa, lembre-se que isto pode ser alterado posteriormente.
            <div class="radios">
                <input type="radio" id="radio1" name="tipoUsuario" value="EMPREGADO" required>
                <label for="radio1"> Primeiramente estou buscando disponibilizar meus serviços - Prestador de Serviços.</label><br>
            </div>
            <div class="radios">
                <input type="radio" id="radio2" name="tipoUsuario" value="EMPREGADOR" required>
                <label for="radio2"> Primeiramente gostaria de buscar serviços - Empregador </label><br>
            </div> 
         </div>
         
    Preencha todos os dados acerca do seu perfil.<br><br>
        
 <div class="form-group">
     <label for="nome">Qual seu nome completo?</label>
    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo" required/><br/>

    <label for="email">Qual seu e-mail para contato?</label>
    <input type="text" class="form-control" id="email" name="email" onblur="validacaoEmail(f1.email)" placeholder="E-mail" required/><br/>

    <label for="login">Qual o login que você gostaria de usar para acessar o sistema?</label>
    <input type="text" class="form-control" id="login" name="login" placeholder="Nome de usuario" requireds/><br/>

    <label for="senha">Para sua segurança, preencha uma senha.</label>
    <input type="password"   class="form-control" id="senha" name="senha" placeholder="Senha" required/><br/>

    <label for="docIdentificacao">Qual seu documento de identificação (CPF - Cadastro de Pessoas Físicas)?</label>
    <input type="text" class="form-control" id="docIdentificacao"  name="docIdentificacao" onkeyup="mascara(this, mcpf);" maxlength="14" placeholder="CPF" required /><br/>

    <label for="telefone">Qual seu telefone? É provavél que prestadores de serviços e/ou clientes entrem em contato com você</label>
       <input type="text" class="form-control" id="telefone"  name="telefone" onkeyup="mascara(this, mtel);"  maxlength="15" placeholder="Telefone" required /><br/>
     
       <label for="data_nascimento">Qual sua data de nascimento?</label>
     <input type="txt" maxlength="10" id="data_nascimento" class="form-control"  name="data_nascimento" onkeyup="mascara(this, mdata);" placeholder="Data de Nascimento" required /><br/>
	
	 <label for="senha">Qual seu endereço? Entre com o CEP e deixe o resto por nossa conta!</label>
	<input type="text" class="form-control" id="cep" name="cep" onkeypress="return MM_formtCep(event,this,'#####-###');" maxlength="9" placeholder="CEP"/><br/>
	<input type="text" class="form-control" id="logradouro" name="logradouro" placeholder="Logradouro"/><br/>
	<input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade"/><br/>
	<input type="text" class="form-control" id="bairro" name="bairro" placeholder="Bairro"/><br/>
        <input type="text" class="form-control" id="uf" name="UF" placeholder="Estado"/><br/>
        <input type="text" class="form-control"id="complemento" name="complemento" placeholder="Complemento" required/><br/>
	 <input style="display:none;" type="text" id="idLogradouro" name="idLogradouro" />
	
 </div>
	 <center>
                        <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <i class="fa fa-check fa-fw"></i> <span class="network-name">Cadastrar meu perfil!</span>
                        </button>
                    </center>
	
	</form>
	
	</div>


</div>
</body>
</html>
