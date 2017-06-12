    /* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//function identifica(campo) {        
//        var nome = campo.name;
//        alert(nome);        
//    }


$(document).ready(function(){
    
    
//    $("button").click(function(){;
//        $(".view").css("visibility","visible");
//    });
    
    $("button").click(function(){
        $.ajax({
        url:"../action/delete_row.php", //the page containing php script
        type: "POST", //request type
        success:function(result){
            alert(result);
            }
        });
    
});

});

