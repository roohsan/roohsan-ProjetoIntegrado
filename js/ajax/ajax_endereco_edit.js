        //metodo de envio de dados via ajax
          $(function(){
            $("#edit_endereco_form").submit(function(){
              $.ajax({
                type: "post",
                url: "../dao/updates/update_endereco.php",
                data: {
                  rua:$("#erua").val(),
                  nivel:$("#enivel").val(),
                  sequencia:$("#esequencia").val(),
                  id_endereco:$("#id_endereco").val()
                      
              
              }
            }).done(function(e){
              rua:$("#erua").val("");
              nivel:$("#enivel").val("");
              sequencia:$("#esequencia").val("");
       
            
            });
            return false;
            
            
          });
        });