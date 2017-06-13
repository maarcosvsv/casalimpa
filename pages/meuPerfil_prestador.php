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
$profissional = $usuarioDAO->getUsuarioProfissional($idUsuario);
$block = false;
if($profissional == null){
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
                <div class="col-lg-10">
                    <div class="intro-message">
        <br>
        <h3>Meu Perfil - Prestador de Serviços</h3>
        <hr>
        <ul class="nav nav-tabs">
            <li ><a href="meuPerfil.php">Perfil principal</a></li>
            <li class="active"><a href="">Prestador de Serviços</a></li>
            <li><a href="meuPerfil_cliente.php">Cliente</a></li>

        </ul>
<?php

 $enderecoDAO = new EnderecoDAO();
 $enderecoPrincipal = $enderecoDAO->getEnderecoCompletoPorID($usuario->getLogradouro());
    
    
if ($edicao == false && $block == false) {

    echo ' <table class="table" border="0" style="width: 100%" >';


    echo "<tr>";

    if ($usuario->getFotoPerfil() != null) {

        echo '<td><img height="200" width="200" src="data:image/jpeg;base64,' . base64_encode($usuario->getFotoPerfil()) . '" /></td>';
    } else {
        echo '<td><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
    }


    echo '<td>';
    echo '<b>Nome: </b>' . $profissional['nome'] . '<br>';
    echo '<b>Telefone: </b>' . $profissional['telefone'] . '<br>';
    echo '<b>Registro Salarial: </b>' . $profissional['registro_salarial'] . '<br>';
   

    
    echo '<b>Area de Atuação: </b>' . $profissional['area_atuacao'] . '<br>';
    echo '<b>Endereço Principal: </b>' .
    $enderecoPrincipal->getNomeLogradouro() . '  '
    . $enderecoPrincipal->getBairro()->getNomeBairro() . ', '
    . $enderecoPrincipal->getBairro()->getCidade()->getNomeCidade() . ', '
    . $enderecoPrincipal->getBairro()->getCidade()->getUF()->getNomeEstado() . '-'
    . $enderecoPrincipal->getBairro()->getCidade()->getUF()->getSiglaUf()
    . '<br>';
    echo '<br><br>
            <a href="meuPerfil_prestador.php?ed" >
  
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
  Não constam registros como profissional de serviços domésticos em seu perfil, faça seu cadastro agora e inicie sua jornada como prestador de serviços! 
</div>';
    echo ' <table class="table" border="0" style="width: 100%" >';


    echo "<tr>";

    if ($usuario->getFotoPerfil() != null) {

        echo '<td width="30%"><img height="200" width="200" src="data:image/jpeg;base64,' . base64_encode($usuario->getFotoPerfil()) . '" /></td>';
    } else {
        echo '<td width="30%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
    }

    echo '<td>'
    ?>

             <form id="formInsertPerfil" method="POST" action="../action/atualizarPerfil.action.php?op=insertPrestadorServico">
            
         
                <div class="form-group" >
                    <label  for="nome">Nome Completo ou Nome Fantasia</label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Preencha seu nome completo" aria-describedby="basic-addon1" required>
                </div>

                <div class="form-group" >
                    <label  for="telefone">Telefone</label> 
                    <input type="text" id="telefone" name="telefone" onkeyup="mascara(this, mtel);" class="form-control" placeholder="Preencha seu telefone de contato" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                    <label  for="registro_salarial">Registro Salarial</label>
                    <input type="text" id="registro_salarial" name="registro_salarial" class="form-control" placeholder="Preencha aqui seu número de registro salarial (PIS)" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                        <label  for="area_atuacao">Área de Atuação</label>
                        <input type="text" id="area_atuacao" name="area_atuacao"   class="form-control" placeholder="Preencha sua principal área de atuação" required ><br/>
                    </div>
                
                <br>
                    <center>
                        <button type="submit" class="btn btn-default" aria-label="Left Align">
                            <i class="fa fa-check fa-fw"></i> <span class="network-name">Cadastrar como Prestador de Serviços</span>
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

            <form id="formAlterarPerfil" method="POST" action="../action/atualizarPerfil.action.php?op=alterPrestadorServico">
            
                <input style="display: none;" id="idUsuario" name="idUsuario" value="<?php echo($usuario->getIdUsuario()); ?>">

                <div class="form-group" >
                    <label  for="nome">Nome Completo ou Nome Fantasia</label>
                    <input type="text" id="nome" name="nome" value="<?php echo($profissional['nome']); ?>" class="form-control" placeholder="Preencha seu nome completo" aria-describedby="basic-addon1" required>
                </div>

                <div class="form-group" >
                    <label  for="telefone">Telefone</label> 
                    <input type="text" id="telefone" name="telefone" maxlength="15" value="<?php echo($profissional['telefone']); ?>" onkeyup="mascara(this, mtel);" class="form-control" placeholder="Preencha seu telefone de contato" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                    <label  for="registro_salarial">Registro Salarial</label>
                    <input type="text" id="registro_salarial" name="registro_salarial"  value="<?php echo($profissional['registro_salarial']); ?>" class="form-control" placeholder="Preencha aqui seu número de registro salarial (PIS)" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                        <label  for="area_atuacao">Área de Atuação</label>
                        <input type="text" id="area_atuacao" name="area_atuacao"  value="<?php echo($profissional['area_atuacao']); ?>" class="form-control" placeholder="Preencha sua principal área de atuação" required ><br/>
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