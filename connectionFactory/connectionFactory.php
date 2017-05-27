<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of connectionFactory
 *
 * @author Marcos Vasconcelos
 */
class connectionFactory {
    var $host = "localhost:3307"; //Porta :3307 - Noteb Daniel - Demais portar :3306
    var $user = "root";
    var $senha = "root"; 
    var $db = "casalimpa"; 

    function getConnection(){
        $connection =  mysql_connect($this->host,$this->user,$this->senha);
        
        if(!$connection){
            print "Ocorreu um Erro na conexão MySQL:";
            print "<b>".mysql_error()."</b>";
            die();
       } else {
           # Aqui está o segredo
        mysql_query("SET NAMES 'utf8'", $connection);
        mysql_query("SET character_set_connection=utf8",$connection);
        mysql_query("SET character_set_client=utf8",$connection);
        mysql_query("SET character_set_results=utf8",$connection);
           mysql_select_db($this->db, $connection) or print(mysql_error()); 
           
           return $connection;
       }
    }
}
