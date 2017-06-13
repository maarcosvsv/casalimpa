<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../connectionFactory/connectionFactory.php';

$connectionFactory = new connectionFactory();
$connection = $connectionFactory->getConnection();

if (isset($_GET['id'])){
    if (isset($_GET['acao'])) {
        
        if ($_GET['acao'] == 1) {
            $query = "SELECT * FROM servico WHERE cod_servico = ".$_GET['id'].";";
            $result = mysql_query($query, $connection);
            
        $row = mysql_fetch_array($result);
            echo "<p>".$row[1]."</p>";        
            echo "<p>".$row[2]."</p>";
            echo "<p>".$row[3]."</p>";
            echo "<p>".$row[4]."</p>";
            
        }
    }
//header("location: ../action/listaServicos.php?id=0");
}