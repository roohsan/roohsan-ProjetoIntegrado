    $('#gravarPro').click(function(){
        var nome_produto = $("#nome_produto").val();
        var nomeCurto = $("#nomeCurto").val();
        var codigo = $("#codigo").val();
        var qtd = $("#qtd").val();
        var unidade = $("#unidade").val();
        var tipo = $("#tipo").val();
             if ((nome_produto!="")&&(nomeCurto!="")&&(codigo!="")&&(qtd!="")&&(unidade!="")&&(tipo!="")){  
                
                 swal("Cadastrado com sucesso!", "clique no botao OK para continuar!", "success");
         
       }
       
    });
