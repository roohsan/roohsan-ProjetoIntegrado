//metodo de envio de dados via ajax
          $(function(){
            $("#usuario_form_edit").submit(function(){
              $.ajax({
                type: "post",
                url: "../dao/updates/update_usuario.php",
                data: {
                  nome:$("#enome").val(),
                  login:$("#elogin").val(),
                  senha:$("#esenha").val(),
                  rsenha:$("#ersenha").val(),
                  perfil:$("#eperfil").val(),
                  id:$("#id_Usuario").val()
              
              }
            }).done(function(e){
              //nome:$("#enome").val("");
             //login:$("#elogin").val("");
             senha:$("#esenha").val("");
             rsenha:$("#ersenha").val("");
             // perfil:$("#eperfil").val("");

              console.log(e);
            });
            return false;
            
            
          });
        });