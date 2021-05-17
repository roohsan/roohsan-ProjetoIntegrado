        //metodo de envio de dados via ajax
          $(function(){
            $("#produto_form").submit(function(){
              $.ajax({
                type: "post",
                url: "../dao/inserts/insert_produto.php",
                data: {
                  nome_produto:$("#nome_produto").val(),
                  nomecurto:$("#nomecurto").val(),
                  codigo:$("#codigo").val(),
                  qtd:$("#qtd").val(),
                  unidade:$("#unidade").val(),
                  tipo:$("#tipo").val()
      
                  
              
              }
            }).done(function(e){
              nome_produto:$("#nome_produto").val("");
              nomecurto:$("#nomecurto").val("");
              codigo:$("#codigo").val("");
              qtd:$("#qtd").val("");
              unidade:$("#unidade").val("");
              tipo:$("#tipo").val("");
            
            });
            return false;
            
            
          });
        });