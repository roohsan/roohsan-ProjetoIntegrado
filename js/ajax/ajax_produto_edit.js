        //metodo de envio de dados via ajax
          $(function(){
            $("#edit_produto_form").submit(function(){
              $.ajax({
                type: "post",
                url: "../dao/updates/update_produto.php",
                data: {
                  nomeproduto:$("#enomeproduto").val(),
                  nomecurto:$("#enomecurto").val(),
                  codigo:$("#ecodigo").val(),
                  qtd:$("#eqtd").val(),
                  unidade:$("#eunidade").val(),
                  tipo:$("#etipo").val(),
                  id:$("#idproduto").val()
                  
              
              }
            }).done(function(e){
              //nome_produto:$("#enome_produto").val("");
              //nomecurto:$("#enomecurto").val("");
              //codigo:$("#ecodigo").val("");
             // qtd:$("#eqtd").val("");
             // unidade:$("#eunidade").val("");
             // tipo:$("#etipo").val("");
            
            });
            return false;
            
            
          });
        });