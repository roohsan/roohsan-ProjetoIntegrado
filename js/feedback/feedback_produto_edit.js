    $('#esalvar').click(function(){
        var nome_produto = $("#enomeproduto").val();
        var nomeCurto = $("#enomecurto").val();
        var codigo = $("#ecodigo").val();
        var qtd = $("#eqtd").val();
        var unidade = $("#eunidade").val();
        var tipo = $("#etipo").val();
             if ((nome_produto!="")&&(nomeCurto!="")&&(codigo!="")&&(qtd!="")&&(unidade!="")&&(tipo!="")){  
                
                 swal("Alterado com sucesso!", "clique no botao OK para continuar!", "success");
         
       }
       
    });