        //metodo de envio de dados via ajax
          $(function(){
            $("#senha_edit").submit(function(){
              $.ajax({
                type: "post",
                url: "../dao/updates/update_usuario.php",
                data: {
                  nome:$("#renome").val(),
                  login:$("#relogin").val(),
                  senha:$("#resenha").val(),
                  rsenha:$("#rersenha").val(),
                  perfil:$("#reperfil").val()
      
                  
              
              }
            }).done(function(e){
              nome:$("#renome").val("");
              login:$("#relogin").val("");
              senha:$("#resenha").val("");
              rsenha:$("#rersenha").val("");
              perfil:$("#reperfil").val("");
            console.log(e);
            });
            return false;
            
            
          });
        });