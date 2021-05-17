    $('#salvar').click(function(){
        var nome = $("#enome").val();
        var login = $("#elogin").val();
        var senha = $("#esenha").val();
        var rsenha = $("#ersenha").val();
        var perfil = $("#eperfil").val();
             if ((senha==rsenha)&&(senha!="")&&(rsenha!="")&&(login!="")&&(nome!="")&&(perfil!="")){  
                    swal("Alterado com sucesso!", "clique no botao OK para continuar!", "success");
         
       }else if((senha!=rsenha)&&(senha!="")&&(rsenha!="")&&(login!="")&&(nome!="")&&(perfil!="")){
            
            swal("Cadastro não alterado!", "As senhas não coincidem!", "error");
       }
    });