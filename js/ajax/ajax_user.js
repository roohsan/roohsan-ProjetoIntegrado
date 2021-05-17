        //metodo de envio de dados via ajax
          $(function(){
            $("#usuario_form").submit(function(){
              $.ajax({
                type: "post",
                url: "../dao/inserts/insert_usuario.php",
                data: {
                  nome:$("#nome").val(),
                  login:$("#login").val(),
                  senha:$("#senha").val(),
                  rsenha:$("#rsenha").val(),
                  perfil:$("#perfil").val()
      
                  
              
              }
            }).done(function(e){
              nome:$("#nome").val("");
              login:$("#login").val("");
              senha:$("#senha").val("");
              rsenha:$("#rsenha").val("");
              perfil:$("#perfil").val("");
            console.log(e);
            });
            return false;
            
            
          });
        });
