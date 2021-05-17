    $('#cadastrar').click(function(){
        var nome = $("#nome").val();
        var login = $("#login").val();
        var senha = $("#senha").val();
        var rsenha = $("#rsenha").val();
        var perfil = $("#perfil").val();
             if ((senha==rsenha)&&(senha!="")&&(rsenha!="")&&(login!="")&&(nome!="")&&(perfil!="")){  
                
                 swal("Cadastrado com sucesso!", "clique no botao OK para continuar!", "success");
         
       }else if((senha!=rsenha)&&(senha!="")&&(rsenha!="")&&(login!="")&&(nome!="")&&(perfil!="")){
            
            swal("Cadastro não realizado!", "As senhas não coincidem!", "error");
       }
    });
