<?php
include_once '../entity/Usuario.class.php';

include_once '../dao/Avaliacao.dao.php';

$idUsuario = $_POST['idUsuario'];

$avaliacaoDAO = new AvaliacaoDAO();
$avaliacaoCliente = $avaliacaoDAO->getAvaliacaoCliente($idUsuario);
$avaliacaoProfissional = $avaliacaoDAO->getAvaliacaoProfissional($idUsuario);

if($avaliacaoCliente != null){
	$result['resultCliente'] = "true";
	$result['avaliacaoCliente'] = json_encode($avaliacaoCliente); 
	
	} else {
	$result['resultCliente'] = "false";
	}
	
if($avaliacaoProfissional != null){
	$result['resultProfissional'] = "true";
	$result['avaliacaoProfissional'] = json_encode($avaliacaoProfissional); 
	
	} else {
	$result['resultProfissional'] = "false";
	}
	
	echo json_encode($result, JSON_UNESCAPED_UNICODE);
	
        ?>
