<?php
include_once '../entity/Usuario.class.php';
require_once '../dao/Endereco.dao.php';
if (!isset($_SESSION)) {
    session_start();
}
$usuario = $_SESSION['usuario'];
include '../resources/layoutInterno.php';
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
        <h3>Meu Perfil - Informações globais</h3>
        <hr>
        <ul class="nav nav-tabs">
            <li class="active"><a href="#">Perfil principal</a></li>
            <li><a href="meuPerfil_prestador.php">Prestador de Serviços</a></li>
            <li><a href="meuPerfil_cliente.php">Empregador</a></li>

        </ul>
<?php

 $enderecoDAO = new EnderecoDAO();
 $enderecoPrincipal = $enderecoDAO->getEnderecoCompletoPorID($usuario->getLogradouro());
    
    
if ($edicao == false) {

    echo ' <table class="table" border="0" style="width: 100%" >';


    echo "<tr>";

    if ($usuario->getFotoPerfil() != null) {

        echo '<td width="10%"><img height="200" width="200" src="data:image/jpeg;base64,' . base64_encode($usuario->getFotoPerfil()) . '" /></td>';
    } else {
        echo '<td width="10%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
    }


    echo '<td>';
    echo '<b>Login: </b>' . $usuario->getLogin() . '<br>';
    echo '<b>E-mail: </b>' . $usuario->getEmail() . '<br>';
    echo '<b>CPF/CNPJ: </b>' . $usuario->getDocIdentificacao() . '<br>';
   

    echo '<b>Endereço Principal: </b>' .
    $enderecoPrincipal->getNomeLogradouro() . '  '
    . $enderecoPrincipal->getBairro()->getNomeBairro() . ', '
    . $enderecoPrincipal->getBairro()->getCidade()->getNomeCidade() . ', '
    . $enderecoPrincipal->getBairro()->getCidade()->getUF()->getNomeEstado() . '-'
    . $enderecoPrincipal->getBairro()->getCidade()->getUF()->getSiglaUf()
    . '<br>';
    echo '<b>Complemento: </b>' . $usuario->getComplementoEndereco() . '<br>';
    echo '<br><br>
            <a href="meuPerfil.php?ed" >
  
  <button type="button" class="btn btn-default" aria-label="Left Align">
  <i class="fa fa-pencil fa-fw"></i> <span class="network-name">Editar Perfil</span>
</button>
  </a>';
    echo '</td></tr></table>';
} else if ($edicao == true) {
    echo ' <table class="table" border="0" style="width: 100%" >';


    echo "<tr>";

    if ($usuario->getFotoPerfil() != null) {

        echo '<td width="10%"><img height="200" width="200" src="data:image/jpeg;base64,' . base64_encode($usuario->getFotoPerfil()) . '" /></td>';
    } else {
        echo '<td width="10%"><img height="200" width="200" src="/casaLimpa/resources/img/interno/nophoto.png" /></td>';
    }

    echo '<td>'
    ?>

            <form id="formAlterarPerfil" enctype="multipart/form-data" method="POST" action="../action/atualizarPerfil.action.php?op=global">

                
                <input style="display: none;" id="idUsuario" name="idUsuario" value="<?php echo($usuario->getIdUsuario()); ?>">

                <div class="form-group" >
                    <label  for="login">Nome de Usuário</label>
                    <input type="text" id="login" name="login" value="<?php echo($usuario->getLogin()); ?>" class="form-control" placeholder="Nome de usuário para acesso ao sistema" aria-describedby="basic-addon1" required>
                </div>

                <div class="form-group" >
                    <label  for="senha">Senha</label> 
                    <input type="password" id="senha" name="senha" value="<?php echo($usuario->getSenha()); ?>" class="form-control" placeholder="Senha para acesso ao sistema" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                    <label  for="email">E-mail</label>
                    <input type="text" id="email" name="email"  value="<?php echo($usuario->getEmail()); ?>" class="form-control" placeholder="E-mail para contato" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                    <label  for="cpfCnpj">CPF:</label>
                    <input type="text" id="cpf" name="cpf" value="<?php echo($usuario->getDocIdentificacao()); ?>" onkeyup="mascara(this, mcpf);" maxlength="14" class="form-control" placeholder="Documento de identificação" aria-describedby="basic-addon1" required>
                </div>
                
                <div class="form-group" >
                        <label  for="cep">Endereço</label>
                        <input type="text" id="cep" name="cep" onkeypress="return MM_formtCep(event,this,'#####-###');" maxlength="9"  value="<?php echo($enderecoPrincipal->getCepLogradouro() ); ?>" class="form-control" placeholder="CEP" required ><br/>
                    </div>
                 
                    <div class="form-group" >
                        <label  for="enderecoCompleto">Novo endereço: </label>
                        <input type="text" id="enderecoCompleto" name="enderecoCompleto" class="form-control" placeholder="Endereço" disabled="true"/><br/>
                      </div> 
                
                <div class="form-group" >
                    <label  for="complemento">Complemento do endereço principal:</label>
                    <input type="text" id="complemento" name="complemento" value="<?php echo($usuario->getComplementoEndereco()); ?>" class="form-control" placeholder="Documento de identificação" aria-describedby="basic-addon1" required>
                </div>
                <input style="display:none;" type="text" id="idLogradouro" name="idLogradouro" value="<?php echo($usuario->getLogradouro()); ?>"/>
  <div class="form-group">      
                         <label  for="fotoPerfil">Foto de Perfil</label><br>
                         <b>Importante:</b> Imagens tem uma melhor aceitação dos usuários!
                            
   <input id="fotoPerfil" name="fotoPerfil" type="file" value="" class="form-control" /> 
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