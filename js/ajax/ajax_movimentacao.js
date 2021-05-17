        //metodo de envio de dados via ajax
          $(function(){
            $("#movimentacao_form").submit(function(){
              $.ajax({
                type: "post",
                url: "../dao/inserts/insert_movimentacao.php",
                data: {
                  rua:$("#rua").val(),
                  nivel:$("#nivel").val(),
                  sequencia:$("#sequencia").val(),
                  produto:$("#produto").val(),
                  quantidade:$("#quantidade").val(),
                  deposito:$("#deposito").val(),
                  user:$("#user").val(),
              
              }
            }).done(function(e){
              rua:$("#rua").val("");
              nivel:$("#nivel").val("");
              sequencia:$("#sequencia").val("");
              produto:$("#produto").val("");
              quantidade:$("#quantidade").val("");
              deposito:$("#deposito").val("");
              user:$("#user").val("");
            
            });
            return false;
            
            
          });
        });