<?php

require_once '../entity/Servico.class.php';
require_once '../connectionFactory/connectionFactory.php';

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cadastro de Serviço
 *
 * @author Daniel Marques
 */
class ServicoDAO {

function incluirServico($servico) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

$sqlInsertServico = "INSERT INTO categoria_servico(nome,descricao,nivel_dificuldade)"
. "values ('" . $servico->getnome() . "',"
. "'" . $servico->getdescricao() . "',"
. "'" . $servico->getdificuldadeservico() . "')";

mysql_query($sqlInsertServico, $connection);

//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
}

function desabilitarServico($idServico) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

$query = "UPDATE servico SET ativo = 0 WHERE cod_servico = ".$idServico;


mysql_query($query, $connection);

//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
}

function confirmarRealizacaoServico($idOS) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

$sqlInsertServico = "update ordem_servico set id_situacao_os = 2 where id_os = " . $idOS;


mysql_query($sqlInsertServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
}

function confirmarRealizacaoAntecipada($idOS) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

$sqlInsertServico = "update ordem_servico set id_situacao_os = 3 where id_os = " . $idOS;


mysql_query($sqlInsertServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
}

function recusarServico($idOS) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

$sqlInsertServico = "update ordem_servico set id_situacao_os = 6 where id_os = " . $idOS;


mysql_query($sqlInsertServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
}
function avaliarCliente($idOS, $mediaSatisfatoria, $consideracoes) {
$servicoDAO = new ServicoDAO();
$servicos = $servicoDAO->getOrdemServicoPorCodigo($idOS);

$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
foreach ($servicos as $servico){

if(intval($servico['id_situacao_os']) == 3){
$sqlInsertServico = "update ordem_servico set id_situacao_os = 5 where id_os = " . $idOS;
}else{
$sqlInsertServico = "update ordem_servico set id_situacao_os = 8 where id_os = " . $idOS;
}


mysql_query($sqlInsertServico, $connection);

$sqlInsertAvaliacao = "insert into qualificacao_cliente (media_satisfatoria, consideracoes, cliente_usuario_cod_usuario,ordem_servico_numero_os) "
. "values ('".$mediaSatisfatoria."','".$consideracoes."',".$servico['id_cliente'].",".$servico['numero_os'].")";
mysql_query($sqlInsertAvaliacao, $connection);
}
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
}

function avaliarProfissional($idOS, $mediaSatisfatoria, $consideracoes, $avaliacao) {

$servicoDAO = new ServicoDAO();
$servicos = $servicoDAO->getOrdemServicoPorCodigo($idOS);

$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
foreach ($servicos as $servico){

if(intval($servico['id_situacao_os']) == 3){
$sqlInsertServico = "update ordem_servico set id_situacao_os = 4 where id_os = " . $idOS;
}else{
$sqlInsertServico = "update ordem_servico set id_situacao_os = 8 where id_os = " . $idOS;
}


mysql_query($sqlInsertServico, $connection);

$sqlInsertAvaliacao = "insert into qualificacao_servico_prestado (nota, consideracoes,avaliacao,id_profissional, ordem_servico_numero_os) "
. "values ('".$mediaSatisfatoria."','".$consideracoes."','".$avaliacao."',".$servico['id_profissional'].",".$servico['numero_os'].")";
mysql_query($sqlInsertAvaliacao, $connection);

$sqlQualificacaoProf = "select * from qualificacao_profissional where id_profissional = ".$servico['id_profissional'];

$res = mysql_query($sqlQualificacaoProf);
$arrayProfissional = array();

while($row = mysql_fetch_assoc($res)){
$arrayProfissional = $row;

}
$totalReclamacoes = $arrayProfissional['total_reclamacoes'];
$totalSatisfeitos = $arrayProfissional['total_satisfeitos'];
$mediaAtendimento = $arrayProfissional['media_atendimento'];
if($mediaSatisfatoria >= 1 && $mediaSatisfatoria <= 2){
$totalReclamacoes = $totalReclamacoes + 1;
}else{
$totalSatisfeitos = $totalSatisfeitos + 1;
}

$mediaAtendimento = ($totalReclamacoes + ($totalSatisfeitos * 2)) / 3;

$sqlUpdateQualificacao = "update qualificacao_profissional set total_reclamacoes = ".$totalReclamacoes.", 
              total_satisfeitos = ".$totalSatisfeitos.", media_atendimento = ".$mediaAtendimento." where id_profissional = ".$servico['id_profissional'];
mysql_query($sqlUpdateQualificacao, $connection);

}
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";
}



function getServicoPorUsuario($idUsuario) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
$sqlServico = "select serv.cod_servico as codigoServico, serv.prazo as prazoServico, serv.preco_sugerido as precoServico, catServ.nome as nomeServico, p.nome, p.registro_salarial, serv.imagem_principal imagemPrincipal
             from servico serv, profissional p, categoria_servico catServ where catServ.cod_categoria_servico = serv.categoria_servico_cod_categoria_servico
 and p.id_profissional = serv.id_profissional
 and p.id_usuario = " . $idUsuario . "  
 and serv.ativo = 1";
$result = mysql_query($sqlServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";


$servicos[] = null;
$count = 0;
while ($row = mysql_fetch_assoc($result)) {
$servicos[$count] = $row;
$count++;
}
if (mysql_num_rows($result) == 0) {
    $servicos = null;
}
$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return $servicos;
} else {
return NULL;
}
}

function getOrdemServicoPorCodigo($ordemServico) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
$sqlServico = "select distinct os.*, DATE_FORMAT(os.dt_inicio,'%d/%m/%Y') AS dtInicioFormatada , DATE_FORMAT(os.dt_fim,'%d/%m/%Y') AS dtFimFormatada  , p.nome as nomeProfissional, c.nome as nomeCliente, 
situacaoOs.situacao as descricaoSituacaoOS, 
serv.cod_servico as codigoServico, serv.prazo as prazoServico, 
            serv.preco_sugerido as precoServico, catServ.nome as nomeServico, p.nome, logradouro.*,
            serv.imagem_principal imagemPrincipal, bairro.Nome_Bairro as nomeBairro, usuarioCliente.id_usuario as usuarioClienteID, usuarioProfissional.id_usuario as usuarioProfissionalID, situacaoOs.idsituacao_os as idSituacaoOS,
            usuarioCliente.email as emailCliente, usuarioCliente.fotoPerfil as fotoPerfilCliente, 
            usuarioProfissional.email as emailProfissional, usuarioProfissional.fotoPerfil as fotoPerfilProfissional, 
            p.nome as nomeProfissional, p.telefone as telefoneProfissional, 
            p.registro_salarial as registroSalarialProfissional,p.area_atuacao as areaAtuacaoProfissional,
            c.nome as nomeCliente, c.telefone as telefoneCliente, DATE_FORMAT(c.data_nascimento,'%d/%m/%Y') AS dtNascimentoCliente,
            serv.observacoes as observacoesServico,
        cidade.Nome_Cidade as nomeCidade
        

from ordem_servico os, profissional p, cliente c, usuario usuarioCliente, usuario usuarioProfissional, situacao_os situacaoOs,
servico serv,categoria_servico catServ, tb_logradouro logradouro, tb_bairro bairro , tb_cidade cidade
where p.id_usuario = usuarioProfissional.id_usuario
and p.id_profissional = os.id_profissional
and c.id_usuario = usuarioCliente.id_usuario
and os.id_cliente = c.id_cliente
and os.id_situacao_os = situacaoOs.idsituacao_os
and catServ.cod_categoria_servico = serv.categoria_servico_cod_categoria_servico
and os.cod_servico = serv.cod_servico
and logradouro.PK_Logradouro = os.id_logradouro
and logradouro.TB_Bairro_PK_Bairro = bairro.PK_Bairro
and cidade.PK_Cidade = bairro.TB_Cidade_PK_Cidade
and p.id_profissional = serv.id_profissional
and os.id_os = " . $ordemServico . ""
. " order by id_os";


$result = mysql_query($sqlServico, $connection);



$servicos[] = null;
$count = 0;
if (mysql_num_rows($result) > 0) {
while ($row = mysql_fetch_assoc($result)) {
$servicos[$count] = $row;
$count++;
}
} else {
$servicos = NULL;
}
$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return $servicos;
} else {
return NULL;
}
}

function getServicosPrestadosPorUsuario($idUsuario, $startrow) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
$sqlServico = "select distinct os.*, DATE_FORMAT(os.dt_inicio,'%d/%m/%Y') as dataInicio, DATE_FORMAT(os.dt_fim,'%d/%m/%Y') as dataFim, p.nome as nomeProfissional, c.nome as nomeCliente, 
situacaoOs.situacao as descricaoSituacaoOS, 
serv.cod_servico as codigoServico, serv.prazo as prazoServico, 
            serv.preco_sugerido as precoServico, catServ.nome as nomeServico, p.nome, 
            serv.imagem_principal imagemPrincipal, bairro.Nome_Bairro as nomeBairro, 
             serv.observacoes as observacoesServico,
        cidade.Nome_Cidade as nomeCidade
from ordem_servico os, profissional p, cliente c, usuario usuarioCliente, usuario usuarioProfissional, situacao_os situacaoOs,
servico serv,categoria_servico catServ, tb_logradouro logradouro, tb_bairro bairro , tb_cidade cidade
where p.id_usuario = usuarioProfissional.id_usuario
and p.id_profissional = os.id_profissional
and c.id_usuario = usuarioCliente.id_usuario
and os.id_cliente = c.id_cliente
and os.id_situacao_os = situacaoOs.idsituacao_os
and catServ.cod_categoria_servico = serv.categoria_servico_cod_categoria_servico
and os.cod_servico = serv.cod_servico
and logradouro.PK_Logradouro = os.id_logradouro
and logradouro.TB_Bairro_PK_Bairro = bairro.PK_Bairro
and cidade.PK_Cidade = bairro.TB_Cidade_PK_Cidade
 and p.id_profissional = serv.id_profissional
and (usuarioProfissional.id_usuario = " . $idUsuario . " or usuarioCliente.id_usuario = " . $idUsuario . ")";

$sqlServico = $sqlServico . " LIMIT " . $startrow . ", 5";

$result = mysql_query($sqlServico, $connection);



$servicos[] = null;
$count = 0;
if (mysql_num_rows($result) > 0) {
while ($row = mysql_fetch_assoc($result)) {
$servicos[$count] = $row;
$count++;
}
} else {
$servicos = NULL;
}
$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return $servicos;
} else {
return NULL;
}
}

function getServicosPorFiltro($idCidade, $idBairro, $idCategoriaServico, $startrow) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
$sqlServico = "select serv.cod_servico as codigoServico, serv.prazo as prazoServico, 
            serv.preco_sugerido as precoServico, catServ.nome as nomeServico, p.nome, 
            p.registro_salarial, serv.imagem_principal imagemPrincipal, bairro.Nome_Bairro as nomeBairro, 
            serv.observacoes,
        cidade.Nome_Cidade as nomeCidade

from servico serv, profissional p, categoria_servico catServ, tb_logradouro logradouro, tb_bairro bairro , tb_cidade cidade, usuario u
where catServ.cod_categoria_servico = serv.categoria_servico_cod_categoria_servico
and p.id_usuario = u.id_usuario
and logradouro.PK_Logradouro = u.tb_logradouro_PK_Logradouro
and logradouro.TB_Bairro_PK_Bairro = bairro.PK_Bairro
and cidade.PK_Cidade = bairro.TB_Cidade_PK_Cidade
 and p.id_profissional = serv.id_profissional
 and serv.ativo = 1 ";

if ($idCidade != null && $idCidade > 0) {
$sqlServico = $sqlServico . " and cidade.PK_Cidade = " . $idCidade;
}

if ($idBairro != null && $idBairro > 0) {
$sqlServico = $sqlServico . " and bairro.PK_Bairro =  " . $idBairro;
}

if ($idCategoriaServico != null && $idCategoriaServico > 0) {
$sqlServico = $sqlServico . " and catServ.cod_categoria_servico =  " . $idCategoriaServico;
}
$sqlServico = $sqlServico . " LIMIT " . $startrow . ", 5";

$result = mysql_query($sqlServico, $connection);



$servicos[] = null;
$count = 0;
if (mysql_num_rows($result) > 0) {
while ($row = mysql_fetch_assoc($result)) {
$servicos[$count] = $row;
$count++;
}
} else {
$servicos = NULL;
}
$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return $servicos;
} else {
return NULL;
}
}

function getServicoPorCodigo($codServico) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
$sqlServico = "select serv.cod_servico as codigoServico, serv.prazo as prazoServico, 
            serv.preco_sugerido as precoServico, catServ.nome as nomeServico, p.nome, 
            p.registro_salarial, serv.imagem_principal imagemPrincipal, bairro.Nome_Bairro as nomeBairro, 
            serv.observacoes as observacoesServico,
        cidade.Nome_Cidade as nomeCidade

from servico serv, profissional p, categoria_servico catServ, tb_logradouro logradouro, tb_bairro bairro , tb_cidade cidade, usuario u
where catServ.cod_categoria_servico = serv.categoria_servico_cod_categoria_servico
and p.id_usuario = u.id_usuario
and logradouro.PK_Logradouro = u.tb_logradouro_PK_Logradouro
and logradouro.TB_Bairro_PK_Bairro = bairro.PK_Bairro
and cidade.PK_Cidade = bairro.TB_Cidade_PK_Cidade
 and p.id_profissional = serv.id_profissional
 and serv.ativo = 1 
 and serv.cod_servico = " . $codServico;


$result = mysql_query($sqlServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";


$servicos[] = null;
$count = 0;
while ($row = mysql_fetch_assoc($result)) {
$servicos[$count] = $row;
$count++;
}
$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return $servicos;
} else {
return NULL;
}
}

function getCategoriasServico() {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
$sqlServico = "select * from categoria_servico order by nome";
$result = mysql_query($sqlServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";


$servicos[] = null;
$count = 0;
while ($row = mysql_fetch_assoc($result)) {
$servicos[$count] = $row;
$count++;
}
$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return $servicos;
} else {
return NULL;
}
}

function vincularServicoUsuario($idCategoriaServico, $prazoServico, $preco, $observacoes, $idUsuario, $imagemServico) {

$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

$arquivo = $imagemServico['tmp_name'];
$tamanho = $imagemServico['size'];
$fp = fopen($arquivo, "rb");
$conteudo = fread($fp, $tamanho);
$conteudo = addslashes($conteudo);
fclose($fp);
$sqlServico = "select id_profissional from profissional where id_usuario = " . $idUsuario;
$resultProfissional = mysql_query($sqlServico, $connection);

while ($rowProf = mysql_fetch_assoc($resultProfissional)) {
$idProfissional = $rowProf['id_profissional'];
}

if ($idProfissional != null && $idProfissional != "") {
$sqlServico = "insert into servico (prazo, observacoes, preco_sugerido, categoria_servico_cod_categoria_servico, id_profissional, ativo, imagem_principal) "
. " values ('" . $prazoServico . "','" . $observacoes . "','" . $preco . "'," . $idCategoriaServico . " ," . $idProfissional . " , 1, '" . $conteudo . "') ";

mysql_query($sqlServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";

$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return TRUE;
} else {
return FALSE;
}
} else {
return false;
}
}

function vincularServicoUsuarioComBase($idCategoriaServico, $prazoServico, $preco, $observacoes, $idUsuario, $imagemServico) {

$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

$sqlServico = "select id_profissional from profissional where id_usuario = " . $idUsuario;
$resultProfissional = mysql_query($sqlServico, $connection);

while ($rowProf = mysql_fetch_assoc($resultProfissional)) {
$idProfissional = $rowProf['id_profissional'];
}

if ($idProfissional != null && $idProfissional != "") {
$sqlServico = "insert into servico (prazo, observacoes, preco_sugerido, categoria_servico_cod_categoria_servico, id_profissional, ativo, imagem_principal) "
. " values ('" . $prazoServico . "','" . $observacoes . "','" . $preco . "'," . $idCategoriaServico . " ," . $idProfissional . " , 1, '" . $imagemServico . "') ";

mysql_query($sqlServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";

$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return TRUE;
} else {
return FALSE;
}
} else {
return false;
}
}

function contratarServico($idUsuario, $codServico, $dataInicio, $dataFim, $turnoPreferencia, $idLogradouro, $horario, $numeroOS, $complemento) {
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
$sqlIdProfissional = "select p.id_profissional from profissional p inner join servico s on p.id_profissional = s.id_profissional "
. " where s.cod_servico = " . $codServico;
$resultProfissional = mysql_query($sqlIdProfissional, $connection);

while ($rowProf = mysql_fetch_assoc($resultProfissional)) {
$idProfissional = $rowProf['id_profissional'];
}

$sqlIdCliente = "select c.id_cliente from cliente c where id_usuario = " . $idUsuario;


$resultIdCliente = mysql_query($sqlIdCliente, $connection);

while ($rowCliente = mysql_fetch_assoc($resultIdCliente)) {
$idCliente = $rowCliente['id_cliente'];
}

if ($idProfissional != null && $idProfissional != "" && $idCliente != null && $idCliente != "") {
$sqlServico = "INSERT INTO casalimpa.ordem_servico
(numero_os,
dt_inicio,
dt_fim,
turno_pref,
horario,
id_cliente,
id_situacao_os,
id_profissional,
cod_servico,
complemento_endereco,
id_logradouro) VALUES (" . $numeroOS . ",'" . $dataInicio . "','" . $dataFim . "','" . $turnoPreferencia . "',"
. "'" . $horario . "',"
. "" . $idCliente . ","
. "1,"
. "'" . $idProfissional . "',"
. "'" . $codServico . "',"
. "'" . $complemento . "',"
. "'" . $idLogradouro . "')";

mysql_query($sqlServico, $connection);
//echo mysql_errno($connection) . ": " . mysql_error($connection) . "\n";

$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return TRUE;
} else {
return false;
}
} else {
return false;
}
}



function getContadoresHome($idUsuarioLogado) {
$arrayCounts[] = null;
$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();
//-- CLIENTE ESTA AGUARDANDO PRESTADOR CONFIRMAR
$sql = "select count(os.id_os)  as contador from ordem_servico os inner join cliente c on c.id_cliente = os.id_cliente 
where os.id_situacao_os = 1
and c.id_usuario = ".$idUsuarioLogado;

$result = mysql_query($sql, $connection);

while ($row = mysql_fetch_assoc($result)) {
$contador = $row['contador'];
}
$arrayCounts['CCLIAguardandoConfirmar'] = $contador;




//-- AGUARDANDO O PRESTADOR CONFIRMAR
$sql = "select count(os.id_os)  as contador  from ordem_servico os inner join profissional p on p.id_profissional = os.id_profissional
where os.id_situacao_os = 1
and P.id_usuario = ".$idUsuarioLogado;

$result = mysql_query($sql, $connection);

while ($row = mysql_fetch_assoc($result)) {
$contador = $row['contador'];
}
$arrayCounts['CPROFAguardandoConfirmar'] = $contador;


//-- CLIENTE ESTA AGUARDANDO REALIZACAO
$sql = "select count(os.id_os) as contador from ordem_servico os inner join cliente c on c.id_cliente = os.id_cliente
where os.id_situacao_os = 2
and c.id_usuario = ".$idUsuarioLogado;

$result = mysql_query($sql, $connection);

while ($row = mysql_fetch_assoc($result)) {
$contador = $row['contador'];
}
$arrayCounts['CCLIAguardandoRealizacao'] = $contador;


//-- PROFISSIONAL AGUARDANDO REALIZACAO
$sql = "select count(os.id_os) as contador from ordem_servico os inner join profissional p on p.id_profissional = os.id_profissional
where os.id_situacao_os = 2
and P.id_usuario = ".$idUsuarioLogado;

$result = mysql_query($sql, $connection);

while ($row = mysql_fetch_assoc($result)) {
$contador = $row['contador'];
}
$arrayCounts['CPROFAguardandoRealizacao'] = $contador;


//-- AGUARDANDO AVALIACAO CLIENTE
$sql = "select count(os.id_os) as contador from ordem_servico os inner join profissional p on p.id_profissional = os.id_profissional
where os.id_situacao_os in (3, 4)
and p.id_usuario = ".$idUsuarioLogado;

$result = mysql_query($sql, $connection);

while ($row = mysql_fetch_assoc($result)) {
$contador = $row['contador'];
}
$arrayCounts['CCLIAguardandoAvaliacao'] = $contador;



//-AGUARDANDO AVALIAÇÃO PRESTADOR
$sql = "select count(os.id_os) as contador from ordem_servico os inner join cliente c on c.id_cliente = os.id_cliente
where os.id_situacao_os in (3, 5)
and c.id_usuario = ".$idUsuarioLogado;

$resultContAvaliacao = mysql_query($sql, $connection);

while ($row = mysql_fetch_assoc($resultContAvaliacao)) {
$contador = $row['contador'];
}
$arrayCounts['CPROFAguardandoAvaliacao'] = $contador;






$error = mysql_errno($connection);
mysql_close($connection);
if ($error == "0") {
return $arrayCounts;
} else {
return null;
}

}


}
