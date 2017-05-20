
<html>
<head>
<!-- DEVE SER SEGUIDO ESTA ORDEM ABAIXO! -->
   <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
 	<script language="JavaScript" type="text/javascript" src="../../resources/js/jquery.js"></script>
   <script language="JavaScript" type="text/javascript" src="../../resources/js/script.js"></script>
 	<script language="JavaScript" type='text/javascript' src='../../ajax/cep.ajax.js'></script>
 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">	

	<meta charset="utf-8">
        <title>Cadastro - CasaLimpa</title>
	<!-- Bootstrap Core CSS -->
    <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../resources/css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="../../resources/css/estilo.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>
 <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav" href="../../">imagem logo</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="../../#about">Sobre</a>
                    </li>
                    <li>
                        <a href="../../#services">Como funciona</a>
                    </li>
                    <li>
                        <a href="../cadastro">Cadastre-se</a>
                    </li>
                    <li>
                        <a href="../../#contact">Contato</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<div id="form">
	<div id="form1">
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
	
	<p>Endereço:</p>
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


</div>
</body>
</html>