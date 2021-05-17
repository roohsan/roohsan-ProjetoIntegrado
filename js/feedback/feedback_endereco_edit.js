    $('#ende_ed_gravar').click(function(){
        var rua = $("#erua").val();
        var nivel = $("#enivel").val();
        var sequencia = $("#esequencia").val();

             if ((rua!="")&&(nivel!="")&&(sequencia!="")){  
                
                 swal("Cadastrado Alterado com sucesso!", "clique no botao OK para continuar!", "success");
         
       }
       
    });