<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
       
?>

<html>
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">	

      <script language="JavaScript" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> 
 	<script language="JavaScript" type="text/javascript" src="../resources/js/jquery.js"></script>
   <script language="JavaScript" type="text/javascript" src="../resources/js/script.js"></script>
 	<script language="JavaScript" type='text/javascript' src='../ajax/cep.ajax.js'></script>
 
	<meta charset="utf-8">
        <title>CasaLimpa</title>
	<!-- Bootstrap Core CSS -->
    <link href="/casaLimpa/resources/css/bootstrap.min.css" rel="stylesheet">
    	
        
</head>
     
    <!--    <link href="/casaLimpa/resources/js/jquery.js">
    <link href="/casaLimpa/resources/js/bootstrap.js">-->

    <!-- Custom CSS -->
    <link href="/casaLimpa/resources/ss/landing-page.css" rel="stylesheet">
    <link href="/casaLimpa/resources/css/estilo_listaserv.css" rel="stylesheet">
    
    
    
    <!-- MetisMenu CSS -->
    <link href="/casaLimpa/resources/css/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/casaLimpa/resources/css/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/casaLimpa/resources/css/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/casaLimpa/resources/css/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    
    <!-- Custom Fonts -->
    <link href="/casaLimpa/resources/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="/casaLimpa/resources/css/estilo.css">

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
                
                <a class="navbar-brand topnav" href="/casaLimpa"><img src="/casaLimpa/resources/img/logoVert.png" width="100px" height="30px" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                     <li>
                         <a href="/casaLimpa/pages/listaServicos.php">Meus Serviços</a>
                    </li>
                     <li>
                        <a href="/casaLimpa/pages/buscarServicos.php">Contratar Serviço</a>
                    </li>
                    <li>
                        <a href="/casaLimpa/pages/servicosPrestados.php">Serviços Prestados</a>
                    </li>
                    <li>
                       <a href="/casaLimpa/pages/avaliacoes.php">Avaliações</a>
                    </li>
                    <li>
                        <a href="/CasaLimpa/pages/meuPerfil.php">Meu perfil</a>
                    </li>
                    <li>
                        <?php
                        
                        if(!isset($_SESSION["usuario"])){
                            ?>
                        
                          <a href="/casaLimpa/pages/login.php">Entrar</a>   
                        <?php    
                        }else{
                            ?>
                        
                         <a href="/casaLimpa/pages/logoff.php">Sair</a>
                        <?php
                        }
                            ?>
                  
                          </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
