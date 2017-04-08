$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep').blur(function(){
           /* Configura a requisição AJAX */
            alert("cheguei aqui");
           $.ajax({
               url : 'ajaxRequest/cep.request.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $('#cep').val(), /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso === 1){
                        $('#rua').val(data.rua);
                        $('#logradouro').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
 
                        
     
                    }
                }
           });   
   return false;    
   });
});