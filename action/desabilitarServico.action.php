<?php
  require_once '../dao/Servico.dao.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (isset($_GET['id'])){
    if (isset($_GET['acao'])) {
        
        if ($_GET['acao'] == 2) {
            $servicoDAO = new ServicoDAO();
      
            $resultado = $servicoDAO->desabilitarServico($_GET['id']) ;  
  
            header("Location: /casaLimpa/pages/listaServicos.php");
        }
    }
}