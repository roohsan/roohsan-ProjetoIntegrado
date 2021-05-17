    $('#gravarEnde').click(function(){
        var rua = $("#rua").val();
        var nivel = $("#nivel").val();
        var sequencia = $("#sequencia").val();

             if ((rua!="")&&(nivel!="")&&(sequencia!="")){  
                
                 swal("Cadastrado com sucesso!", "clique no botao OK para continuar!", "success");
         
       }
       
    });