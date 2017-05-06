html>
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
        <title>Categoria de serviços</title>
	<!-- Bootstrap Core CSS -->
    <link href="../../resources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../../resources/css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="../resources/css/estilo.css">

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
<p> Cadastro de Serviços:</P>
<form action="../../action/cadastroServico.action.php" method="POST">
	<p>Tipos de Serviços</p>
		<select id="nome" name="nome">
			<option value="Babá">Babá</option>
			<option value="Diarista">Diarista</option>
			<option value="Cuidador(a) de Idosos">Cuidador(a) de Idosos</option>
			<option value="Cozinheiro(a)">Cozinheiro(a)</option>
			<option value="Passador(a)">Passador(a)</option>
			<option value="Lavador(a)">Lavador(a)</option>
			<option value="Piscineiro(a)">Piscineiro(a)</option>
                        <option value="Jardineiro(a)">Jardineiro(a)</option>
                        <option value="Arrumador(a)">Arrumador(a)</option> <!--Pessoal que apenas organiza guarda roupas armarios bibliotecas -->
		</select>
	
	<p>Descrição do Serviço<p/>
	
        <input type="text" id="descricao" name="descricao" placeholder="Descrição do Serviço"/><br/>
        
        <p>Nivel de Dificuldade<p/>
        <select id="dificuldade_servico" name="dificuldade_servico">
			<option value="0"> 0 - Entre: X hrs a X hrs</option>
			<option value="1"> 1 - Entre: X hrs a X hrs</option>
			<option value="2"> 2 - Entre: X hrs a X hrs</option>
			<option value="3"> 3 - Entre: X hrs a X hrs</option>
			<option value="4"> 4 - Entre: X hrs a X hrs</option>
			<option value="5"> 5 - Entre: X hrs a X hrs</option>
		</select>
        <br>
        <br>

	<input type="submit" class="" value="enviar"/>
	
	</form>
	
	</div>


</div>
</body>
</html>