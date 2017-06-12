$(document).ready( function() {
   /* Executa a requisição quando o campo CEP perder o foco */
   $('#cep').blur(function(){
   
           /* Configura a requisição AJAX */
            $('#logradouro').val('');
            $('#bairro').val('');
            $('#cidade').val('');
            $('#uf').val('');
            var $cep = $('#cep').val();
            var $cepFmt = $cep.replace("-", "");
                        
           $.ajax({
               url : '/casaLimpa/ajax/cep.request.php', /* URL que será chamada */ 
                type : 'POST', /* Tipo da requisição */ 
                data: 'cep=' + $cepFmt, /* dado que será enviado via POST */
                dataType: 'json', /* Tipo de transmissão */
                success: function(data){
                    if(data.sucesso == "1"){
                        $('#logradouro').val(data.logradouro);
                        $('#bairro').val(data.bairro);
                        $('#cidade').val(data.cidade);
                        $('#uf').val(data.uf);
                        $('#idLogradouro').val(data.idLogradouro);
                        $('#enderecoCompleto').val(data.logradouro + ' '+ data.bairro + ', ' + data.cidade+ ' - ' + data.uf);
                        
                        $('#complemento').focus();
     
                    }
                }
           });
           
   return false;    
   });
});