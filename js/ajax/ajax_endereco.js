        //metodo de envio de dados via ajax
          $(function(){
            $("#endereco_form").submit(function(){
              $.ajax({
                type: "post",
                url: "../dao/inserts/insert_endereco.php",
                data: {
                  rua:$("#rua").val(),
                  nivel:$("#nivel").val(),
                  sequencia:$("#sequencia").val(),
                  
              
              }
            }).done(function(e){
              rua:$("#rua").val("");
              nivel:$("#nivel").val("");
              sequencia:$("#sequencia").val("");
            
            });
            return false;
            
            
          });
        });