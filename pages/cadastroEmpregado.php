
<html>
<head>
<!-- DEVE SER SEGUIDO ESTA ORDEM ABAIXO! -->
   <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
 <script language="JavaScript" type="text/javascript" src="../resources/js/jquery.js"></script>
   <script language="JavaScript" type="text/javascript" src="../resources/js/script.js"></script>
 <script language="JavaScript" type='text/javascript' src='../ajax/cep.ajax.js'></script>
 
 
<link rel="stylesheet" type="text/css" href="../resources/css/estilo.css">

<meta charset="utf-8">

<!-- Bootstrap -->

    <link href="resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="resources/css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


</head>

<body>

<div id="#">
<p> Cadastro:</P>
<form action="../action/cadastroEmpregado.action.php" method="POST">
	<input type="text" id="nome" name="nome" placeholder="Nome completo"/><br/>
	<input type="text" id="email" name="email" onblur="validacaoEmail(f1.email)" placeholder="E-mail"/><br/>
	<input type="text" id="login" name="login" placeholder="Nome de usuario"/><br/>
	<input type="password" id="senha" name="senha" placeholder="Senha"/><br/>
	<input type="text" id="docIdentificacao" onkeyup="somenteNumeros(this)" name="cpf" maxlength="14" placeholder="CPF/CNPJ"/><br/>
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
	<input type="text" id="cep" name="cep" onkeypress="return MM_formtCep(event,this,'#####-###');" maxlength="9" placeholder="CEP"/><br/>
	<input type="text" id="logradouro" name="logradouro" placeholder="Logradouro"/><br/>
	<input type="text" id="cidade" name="cidade" placeholder="Cidade"/><br/>
	<input type="text" id="bairro" name="bairro" placeholder="Bairro"/><br/>
        <input type="text" id="uf" name="UF" placeholder="Estado"/><br/>
        <input type="text" id="complemento" name="complemento" placeholder="Complemento"/><br/>
	 <input disabled="true" style="display:none;" type="text" id="idLogradouro" name="idLogradouro" />
	

	<input type="submit" class="" value="enviar"/>
	
	</form>
	
	


</div>
</body>
</html>