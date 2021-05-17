    $('#gravarMovi').click(function(){
        var rua = $("#rua").val();
        var nivel = $("#nivel").val();
        var sequencia = $("#sequencia").val();
        var produto = $("#produto").val();
        var quantidade = $("#quantidade").val();
        var deposito = $("#deposito").val();


             if ((rua!="")&&(nivel!="")&&(sequencia!="")&&(quantidade!="")&&(deposito!="")&&(quantidade>0)){  
                
                 swal("Alocado com sucesso!", "clique no botao OK para continuar!", "success");
         
       }else if((rua!="")&&(nivel!="")&&(sequencia!="")&&(quantidade!="")&&(deposito!="")&&(quantidade<0)){

       		swal("A quantidade é menor que 0!", "Favor inserir valor valido!", "error");
       }
       
    });