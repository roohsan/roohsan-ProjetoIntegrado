    $('#save_senha').click(function(){
        var senha = $("#resenha").val();
        var rsenha = $("#rersenha").val();
             if (senha==rsenha){  
                    swal("Alterado com sucesso!", "clique no botao OK para continuar!", "success");
         
       }else if(senha!=rsenha){
            
            swal("Cadastro não alterado!", "As senhas não coincidem!", "error");
       }
    });