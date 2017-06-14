<?php
include_once '../entity/Usuario.class.php';
require_once '../dao/Endereco.dao.php';
require_once '../dao/Usuario.dao.php';
include '../resources/layoutInterno.php';
if (!isset($_SESSION)) {
    session_start();
}
$usuario = $_SESSION['usuario'];
$idUsuario  = $usuario->getIdUsuario();
$usuarioDAO = new UsuarioDAO();
$cliente = $usuarioDAO->getUsuarioCliente($idUsuario);
$block = false;
if($cliente == null){
$block = true;    
}  

$edicao = false;
if (isset($_GET['ed'])) {
    $edicao = true;
}
?>
<div id="form" style="height: 500px !important">
    <div id="form1">
        <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
        <br>
        <h3>Meu Perfil - Empregador</h3>
        <hr>
        <ul class="nav nav-tabs">
            <li ><a href="meuPerfil.php">Perfil principal</a></li>
            <li ><a href="meuPerfil_prestador.php">Prestador de Serviços</a></li>
            <li class="active"><a href="#">Empregador</a></li>

        </ul>
<?php

 $enderecoDAO = new EnderecoDAO();
 $enderecoPrincipal = $enderecoDAO->getEnderecoCompletoPorID($usuario->getLogradouro());
    
    
if ($edicao == false && $block == false) {

    echo ' <table class="table" border="0" style="width: 100%" >';


    echo "<tr>";

    if ($usuario->getFotoPerfil() != null) {

        echo '<td width="10%"><img height="200" width="200" src="data:image/jpeg;base64,' . base64_encode($usuario->getFotoPerfil()) . '" /></td>';
    } else {
        echo '<td width="10%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
    }


    echo '<td>';
    echo '<b>Nome: </b>' . $cliente['nome'] . '<br>';
    echo '<b>Telefone: </b>' . $cliente['telefone'] . '<br>';
    echo '<b>Data de Nascimento: </b>' . $cliente['data_nascimento'] . '<br>';
   
    echo '<br><br>
            <a href="meuPerfil_cliente.php?ed" >
  
  <button type="button" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-pencil fa-fw"></i> <span class="network-name">Editar Perfil - Prestador de serviços</span>
</button>
  </a>';
    echo '</td></tr></table>';
} else if ($block == true) {
    
    echo '<br><br>       <input style="display: none;" id="idUsuario" name="idUsuario" value="<?php echo($usuario->getIdUsuario()); ?>">
<div class="alert alert-danger" role="alert">
  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
  <span class="sr-only">Error:</span>
  Não constam registros como cliente de serviços domésticos em seu perfil, faça seu cadastro como cliente agora e solicite serviços! 
</div>';
    echo ' <table class="table" border="0" style="width: 100%" >';


    echo "<tr>";

    if ($usuario->getFotoPerfil() != null) {

        echo '<td width="10%"><img height="200" width="200" src="data:image/jpeg;base64,' . base64_encode($usuario->getFotoPerfil()) . '" /></td>';
    } else {
        echo '<td width="10%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
    }

    echo '<td>'
    ?>

             <form id="formInsertPerfil" method="POST" action="../action/atualizarPerfil.action.php?op=insertCliente">
            
         
                <div class="form-group" >
                    <label  for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Preencha seu nome completo" aria-describedby="basic-addon1" required>
                </div>

                <div class="form-group" >
                    <label  for="telefone">Telefone</label> 
                    <input type="text" id="telefone" name="telefone" onkeyup="mascara(this, mtel);" class="form-control" placeholder="Preencha seu telefone de contato" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                    <label  for="data_nascimento">Data de Nascimento</label>
                    <input type="text" id="data_nascimento" name="data_nascimento"  onkeyup="mascara(this, mdata);" class="form-control" placeholder="Preencha sua data de nascimento" aria-describedby="basic-addon1" required>
                </div>
                
                
                <br>
                    <center>
                        <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <i class="fa fa-check fa-fw"></i> <span class="network-name">Cadastrar meu perfil como Cliente de Serviços</span>
                        </button>
                    </center>
        </div>
    </form>

    <?php
    echo '</td></tr></table>';
}else if ($edicao == true && $block == false) {
    echo ' <table class="table" border="0" style="width: 100%" >';


    echo "<tr>";

    if ($usuario->getFotoPerfil() != null) {

        echo '<td width="30%"><img height="200" width="200" src="data:image/jpeg;base64,' . base64_encode($usuario->getFotoPerfil()) . '" /></td>';
    } else {
        echo '<td width="30%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
    }

    echo '<td>'
    ?>

            <form id="formAlterarPerfil" method="POST" action="../action/atualizarPerfil.action.php?op=alterCliente">
            
                <input style="display: none;" id="idUsuario" name="idUsuario" value="<?php echo($usuario->getIdUsuario()); ?>">

                <div class="form-group" >
                    <label  for="nome">Nome Completo</label>
                    <input type="text" id="nome" name="nome" value="<?php echo($cliente['nome']); ?>" class="form-control" placeholder="Preencha seu nome completo" aria-describedby="basic-addon1" required>
                </div>

                <div class="form-group" >
                    <label  for="telefone">Telefone</label> 
                    <input type="text" id="telefone" name="telefone" maxlength="15" value="<?php echo($cliente['telefone']); ?>" onkeyup="mascara(this, mtel);" class="form-control" placeholder="Preencha seu telefone de contato" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                    <label  for="data_nascimento">Data de nascimento</label>
                    <input type="text" id="data_nascimento" name="data_nascimento"  value="<?php echo($cliente['data_nascimento']); ?>" class="form-control" placeholder="Preencha aqui seu número de registro salarial (PIS)" aria-describedby="basic-addon1" required>
                </div>
                
                
                
                <br>
                    <center>
                        <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <i class="fa fa-check fa-fw"></i> <span class="network-name">Salvar alterações</span>
                        </button>
                    </center>
        </div>
    </form>

    <?php
    echo '</td></tr></table>';
}
?>