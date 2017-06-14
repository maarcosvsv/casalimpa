<?php
include_once '../entity/Usuario.class.php';
include_once '../dao/Servico.dao.php';
include '../resources/layoutInterno.php';
session_start();

$usuario = $_SESSION['usuario'];
$idUsuario = $usuario->getIdUsuario();


$servicoDAO = new ServicoDAO();
$contadores = $servicoDAO->getContadoresHome($idUsuario);

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
                        <h1>Casa Limpa</h1>
                        
                        <h3>DASHBOARD</h3>
                        <hr class="intro-divider">
  
                 <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notificações
                        </div>
      <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <?php if($contadores['CCLIAguardandoConfirmar'] != 0){ ?>
                                    
                               
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-user-plus fa-fw"></i> <?php echo($contadores['CCLIAguardandoConfirmar']); ?> Serviços aguardando a confirmação de Prestadores de Serviço. 
                                    <span class="pull-right text-muted small"><em>Empregador.</em>
                                    </span>
                                </a>
                                <?php } ?>
                                   <?php if($contadores['CPROFAguardandoConfirmar'] != 0){ ?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-exclamation-triangle fa-fw"></i> <?php echo($contadores['CPROFAguardandoConfirmar']); ?> Serviços aguardando sua confirmação como Prestador do Serviço.
                                    <span class="pull-right text-muted small"><em>Prestador de Serviços.</em>
                                    </span>
                                </a>
                                  <?php } ?>
                                   <?php if($contadores['CCLIAguardandoRealizacao'] != 0){ ?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-calendar fa-fw"></i> <?php echo($contadores['CCLIAguardandoRealizacao']); ?> Serviços aguardando realização dos Prestadores de Serviços.
                                    <span class="pull-right text-muted small"><em>Empregador</em>
                                    </span>
                                </a>
                                  <?php } ?>
                                   <?php if($contadores['CPROFAguardandoRealizacao'] != 0){ ?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-briefcase fa-fw"></i> <?php echo($contadores['CPROFAguardandoRealizacao']); ?> Serviços aguardando sua realização.
                                    <span class="pull-right text-muted small"><em>Prestador de Serviços</em>
                                    </span>
                                </a>
                                  <?php } ?>
                                   <?php if($contadores['CPROFAguardandoAvaliacao'] != 0){ ?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-thumbs-o-up fa-fw"></i> <?php echo($contadores['CPROFAguardandoAvaliacao']); ?> Serviços aguardando sua Avaliação.  
                                    <span class="pull-right text-muted small"><em>Prestador de Serviços</em>
                                    </span>
                                </a>
                                  <?php } ?>
                                   <?php if($contadores['CCLIAguardandoAvaliacao'] != 0){ ?>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-thumbs-up fa-fw"></i> <?php echo($contadores['CCLIAguardandoAvaliacao']); ?> Serviços aguardando sua Avaliação.
                                    <span class="pull-right text-muted small"><em>Empregador</em>
                                    </span>
                                </a>
                                  <?php } ?>
                            </div>
                            <!-- /.list-group -->
                            <a href="/casaLimpa/pages/servicosPrestados.php" class="btn btn-default btn-block">Veja todos os serviços</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

   
        </div></div>

</body>

</html>
