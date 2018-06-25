<?php
	require_once '../entity/Usuario.class.php';
    require_once '../dao/Usuario.dao.php';
	include_once '../dao/Servico.dao.php';
	$idUsuario =  $_POST['idUsuario'];
	$servicoDAO = new ServicoDAO();
	$contadores = $servicoDAO->getContadoresHome($idUsuario);

	if($contadores != null){
	$result['result'] = "true";
	$result['CCLIAguardandoConfirmar'] = $contadores['CCLIAguardandoConfirmar']; 
    $result['CPROFAguardandoConfirmar'] = $contadores['CPROFAguardandoConfirmar']; 
    $result['CCLIAguardandoRealizacao'] = $contadores['CCLIAguardandoRealizacao']; 
    $result['CPROFAguardandoRealizacao'] = $contadores['CPROFAguardandoRealizacao']; 
	$result['CPROFAguardandoAvaliacao'] = $contadores['CPROFAguardandoAvaliacao']; 	
	$result['CCLIAguardandoAvaliacao'] = $contadores['CCLIAguardandoAvaliacao']; 	
	
	} else {
	$result['result'] = "false";
	}
    
	echo json_encode($result, JSON_UNESCAPED_UNICODE );
       
        
       