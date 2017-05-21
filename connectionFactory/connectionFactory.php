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
    var $host = "localhost:3306"; 
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
           mysql_select_db($this->db, $connection) or print(mysql_error()); 
           return $connection;
       }
    }
}
