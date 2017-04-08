
<html>
<head>

    
 <script type="text/javascript" src="../resources/js/script.js"></script>
 <script type='text/javascript' src='../ajax/cep.ajax.js'></script>
 <script type="text/javascript" src="../resources/js/jquery.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../resources/css/estilo.css">

<meta charset="utf-8">

</head>

<body>

<div id="#">
<p> Cadastro:</P>
<form action="../action/cadastroEmpregado.action.php" method="POST">
	<input type="text" id="#" name="nome" placeholder="Nome completo"/><br/>
	<input type="text" id="#" name="email" onblur="validacaoEmail(f1.email)" placeholder="E-mail"/><br/>
	<input type="text" id="#" name="login" placeholder="Nome de usuario"/><br/>
	<input type="password" id="#" name="senha" placeholder="Senha"/><br/>
	<input type="text" id="#" onkeyup="somenteNumeros(this)" name="cpf" maxlength="11" placeholder="CPF"/><br/>
	<p>Telefone:</p>
	<input type="text" id="#" onkeyup="somenteNumeros(this);" maxlength="2" placeholder="DDD" />
	<input type="text" id="#" onkeyup="somenteNumeros(this);"  maxlength="9" placeholder="Telefone"  /><br />
	<p>data de nascimento:</p>
	<input type="txt" id="#" name="nasc_dia" onkeyup="somenteNumeros(this)" placeholder="Dia" maxlength="2"/>
		<select id="#" name="nasc_mes">
			<option value="janeiro">Janeiro</option>
			<option value="fevereiro">Fevereiro</option>
			<option value="marco">Março</option>
			<option value="maior">Maio</option>
			<option value="junho">Junho</option>
			<option value="julho">Julho</option>
			<option value="agosto">Agosto</option>
			<option value="setembro">Setembro</option>
			<option value="outubro">Outubro</option>
			<option value="novenbro">Novenbro</option>
			<option value="dezembro">Dezembro</option>
		</select>
	<input type="txt" id="#" name="nasc_ano" onkeyup="somenteNumeros(this)" placeholder="ano" maxlength="4"/><br/><br />
	
	<p>Endereço:<p/>
	<input type="text" id="cep" name="cep" maxlength="8" placeholder="CEP"/><br/>
	<input type="text" id="#" name="logradouro" placeholder="Logradouro"/><br/>
	<input type="text" id="#" name="cidade" placeholder="Cidade"/><br/>
	<input type="text" id="#" name="UF" placeholder="Estado"/><br/>
	<input type="text" id="#" name="bairro" placeholder="Bairro"/><br/>
	<input type="text" id="#" name="complemento" placeholder="Complemento"/><br/>
	

	<input type="submit" class="" value="enviar"/>
	
	</form>
	
	


</div>
</body>
</html>