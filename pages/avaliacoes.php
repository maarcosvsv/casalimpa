<?php
include_once '../entity/Usuario.class.php';
session_start();

include_once '../dao/Avaliacao.dao.php';
include '../resources/layoutInterno.php';
$usuario = $_SESSION['usuario'];
$idUsuario = $usuario->getIdUsuario();

$avaliacaoDAO = new AvaliacaoDAO();
$avaliacaoCliente = $avaliacaoDAO->getAvaliacaoCliente($idUsuario);
$avaliacaoProfissional = $avaliacaoDAO->getAvaliacaoProfissional($idUsuario);

        ?>

<div id="form" style="height: 500px !important">
	<div id="form1">

   
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                     
                        <h3>Minhas Avaliações</h3>
                      <hr class="intro-divider">
                      <?php if($avaliacaoCliente['totalSatisfacao'] > 0){
                      
                      ?>
                      <h4>Minhas avaliações como Cliente</h4>
                      <br>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-up fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $avaliacaoCliente['totalSatisfacao'] ?>%</div>
                                    <div>Percentual de aceitação!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/casaLimpa/pages/servicosPrestados.php">
                            <div class="panel-footer">
                                <span class="pull-left">Serviços Solicitados</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bullhorn fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $avaliacaoCliente['totalQualificacoes'] ?></div>
                                    <div>Qualificações realizadas!</div>
                                </div>
                            </div>
                        </div>
                       <a href="/casaLimpa/pages/servicosPrestados.php">
                            <div class="panel-footer">
                                <span class="pull-left">Serviços Solicitados</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-newspaper-o fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $avaliacaoCliente['notaQualificacao'] ?></div>
                                    <div>Nota final!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/casaLimpa/pages/servicosPrestados.php">
                            <div class="panel-footer">
                                <span class="pull-left">Serviços Solicitados</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              </div>
                       <?php 
                       
                      }else {
                         
                      ?>
                       <h4>Minhas avaliações como Cliente</h4>
                      <br>
                       <div class="row" style="align: center;">
                         <div class="col-lg-12 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bullhorn fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Até o momento nenhuma qualificação foi realizada!</div>
                                </div>
                            </div>
                        </div>
                       <a href="/casaLimpa/pages/buscarServicos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Começe a contratar serviços para aumentar seu ranking de qualificações!</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                       </div>
                      <?php 
                      
                      }
                      ?>
                      <?php if($avaliacaoProfissional['cod_qualificacao'] > 0){
                      
                      ?>
                       <h4>Minhas avaliações como Prestador de Serviços</h4>
                      <br>
                        <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-up fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $avaliacaoProfissional['total_satisfeitos'] ?> </div>
                                    <div>Clientes satisfeitos!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/casaLimpa/pages/listaServicos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Meus serviços</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-thumbs-down fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $avaliacaoProfissional['total_reclamacoes'] ?></div>
                                    <div>Estão insatisfeitos!</div>
                                </div>
                            </div>
                        </div>
                       <a href="/casaLimpa/pages/listaServicos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Meus serviços</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-sign-language fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= $avaliacaoProfissional['media_atendimento'] ?></div>
                                    <div>Média satisfatória!</div>
                                </div>
                            </div>
                        </div>
                       <a href="/casaLimpa/pages/listaServicos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Meus serviços</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
              </div>
                      <?php 
                       
                      }else {
                         
                      ?>
                       <h4>Minhas avaliações como Prestador de Serviços</h4>
                      <br>
                       <div class="row" style="align: center;">
                         <div class="col-lg-12 col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-bullhorn fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">0</div>
                                    <div>Até o momento nenhuma qualificação foi realizada!</div>
                                </div>
                            </div>
                        </div>
                       <a href="/casaLimpa/pages/listaServicos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Comece a divulgar seus serviços para aumentar seu ranking de qualificações!</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                       </div>
                      <?php 
                      
                      }
                      ?>  
                             </form>
                        
                       
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
