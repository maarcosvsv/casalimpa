
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
	<input type="text" id="docIdentificacao" onkeyup="somenteNumeros(this)" name="docIdentificacao" maxlength="14" placeholder="CPF/CNPJ"/><br/>
	<p>Telefone:</p>
	<input type="text" id="dddTelefone" name="dddTelefone" onkeyup="somenteNumeros(this);" maxlength="2" placeholder="DDD" />
	<input type="text" id="telefone"  name="telefone"onkeyup="somenteNumeros(this);"  maxlength="9" placeholder="Telefone"  /><br />
	<p>data de nascimento:</p>
	<input type="txt" id="nasc_dia" name="nasc_dia" onkeyup="somenteNumeros(this)" placeholder="Dia" maxlength="2"/>
		<select id="nasc_mes" name="nasc_mes">
			<option value="01">Janeiro</option>
			<option value="02">Fevereiro</option>
			<option value="03">Março</option>
                        <option value="04">Abril</option>
			<option value="05">Maio</option>
			<option value="06">Junho</option>
			<option value="07">Julho</option>
			<option value="08">Agosto</option>
			<option value="09">Setembro</option>
			<option value="10">Outubro</option>
			<option value="11">Novembro</option>
			<option value="12">Dezembro</option>
		</select>
	<input type="txt" id="nasc_ano" name="nasc_ano" onkeyup="somenteNumeros(this)" placeholder="ano" maxlength="4"/><br/><br />
	
	<p>Endereço:<p/>
	<input type="text" id="cep" name="cep" onkeypress="return MM_formtCep(event,this,'#####-###');" maxlength="9" placeholder="CEP"/><br/>
	<input type="text" id="logradouro" name="logradouro" placeholder="Logradouro"/><br/>
	<input type="text" id="cidade" name="cidade" placeholder="Cidade"/><br/>
	<input type="text" id="bairro" name="bairro" placeholder="Bairro"/><br/>
        <input type="text" id="uf" name="UF" placeholder="Estado"/><br/>
        <input type="text" id="complemento" name="complemento" placeholder="Complemento"/><br/>
	 <input style="display:none;" type="text" id="idLogradouro" name="idLogradouro" />
	

	<input type="submit" class="" value="enviar"/>
	
	</form>
	
	


</div>
</body>
</html>