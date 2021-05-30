<?php
  include('../control/autenticacao.php');
  include('../dao/selects/select_endereco.php');
?>

<!doctype html>


<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/stylo_usuario.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="../jquery/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/ajax/ajax_endereco.js"></script>
    <script src="../js/ajax/ajax_endereco_edit.js"></script>
    




    <title>ENDEREÇAMENTO</title>
  </head>

<body class="body_master">
<!-- navebar no cabeçalho-->
              <header>
                        <nav class="navbar navbar-expand-lg nav_light nav_bar">
                            <span class="navbar-brand" href="#" id="logo">Flow of Goods ©®™</span>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>

                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                      <a href="<?php echo $_SESSION ['perfil']?>" class="nav-link"><i class="fas fa-desktop"></i> <span>DASHBOARD</span></a>
                                    </li>
                                  <li class="nav-item">
                                    <a href="produto.php" class="nav-link"><i class="fas fa-box-open"></i> <span>PRODUTOS</span></a>
                                  </li>
                                  <li class="nav-item">
                                    <a href="movimentacao.php" class="nav-link"><i class="fas fa-truck-moving"></i> <span>MOVIMENTAÇÕES</span></a>
                               
                                  <li class="nav-item">
                                    <a   class=" nav-link logout_botao" onclick="window.location.href = '../control/logout.php'"><i class="fas fa-sign-out-alt icone"></i>SAIR</a>
                                  </li>
                                </ul> 
                            </div>


                        </nav>
              </header>

  <div class="conteudo">

    <div class="container">

      <div>

<!--Botao do modal cadastro produtos-->        
        <button  id="botao_novo" type="button" class="user_btn" data-toggle="modal" data-target="#cadastro_modal" data-backdrop="static" data-keyboard="false"><i class="fas fa-map-signs"></i> NOVO</button>

         <button  id="rela_excel" type="button" onclick="window.location.href = '../relatorios/rela_excel_endereco.php'"><i class="fas fa-file-excel"></i> Relatorio</button>



<!--MODAL DA Cadastro produtos-->
            <div class="modal fade t-modal" id="cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">NOVO ENDEREÇO</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

<!-- formulario de cadastro-->
              <form name="form-cadastrar" id="endereco_form"  method="post">

                          <div class="inputs_login">  
                            <input type="text" name="rua" class="input_modal_senha" id="rua" placeholder="Rua" required></input>
                            <input name="nivel" class="input_modal_senha" id="nivel" placeholder="Nivel Ex: 1,2,3"required></input>
                            <input name="sequencia" class="input_modal_senha" id="sequencia" placeholder="Sequencia Ex:1,2,3"required></input>
                          </div>

                            

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href = 'endereco.php'">Cancelar</button>
                    <button type="submit" class="btn btn-success" id="gravarEnde">Gravar</button>
                  </div>

                </form>
<!-- fim do formulario de cadastro-->
              </div>
            </div>
          </div>

      </div>





  <!--exibição da lista de usuario -->  
      <table class="table table-bordered table-dark table-border table-hover corpo" id="tabela_user">



        <thead>
          <tr>
            <th  style="text-align:center" scope="col">Rua</th>
            <th  style="text-align:center" scope="col">Nivel</th>
            <th  style="text-align:center" scope="col">Sequencia</th>
            <th  style="text-align:center" scope="col">Modulo</th>
            <th  style="text-align:center" scope="col">Dt. Cadastro</th>
            <th  style="text-align:center" scope="col">AÇÃO</th>

          </tr>
        </thead>

        <tbody>
      
      <?php do{ ?>
        <tr>
            <td style="text-align:center" ><?php echo $linha_endereco ['rua'];  ?></td>
            <td style="text-align:center" ><?php echo $linha_endereco ['nivel'];  ?></td>
            <td style="text-align:center" ><?php echo $linha_endereco ['sequencia'];  ?></td>
            <td style="text-align:center" ><?php echo $linha_endereco ['modulo'];  ?></td>
            <td style="text-align:center" ><?php echo date("d/m/y", strtotime($linha_endereco ['dataCadastro']));  ?></td>

   

<!--Acionador do modal edição-->
        <!--data-whatever dados para o modal-->
          <td style="text-align:center" >
            <a id="editar" type="button" data-toggle="modal" data-target="#edit_modal" data-backdrop="static" data-keyboard="false" data-whatever_id="<?php echo $linha_endereco ['id_endereco'];?>" data-whatever_rua="<?php echo $linha_endereco ['rua'];?>"
              data-whatever_nivel="<?php echo $linha_endereco ['nivel'];?>" data-whatever_sequencia="<?php echo $linha_endereco ['sequencia'];?>"><i class="fas fa-edit"></i></a> |
              <!--fim data-whatever dados para o modal-->
            <a  id="deletar" href="javascript:if(confirm('Tem certeza que deseja deletar o endereço? Rua-<?php echo $linha_endereco ['rua'];?>, Nivel-<?php echo $linha_endereco ['nivel'];  ?>, Sequencia-<?php echo $linha_endereco ['sequencia'];?>, Modulo-<?php echo $linha_endereco ['modulo'];?>')) location.href='../dao/deletes/delete_endereco.php?id=<?php echo $linha_endereco ['id_endereco'];?>';"><i class="fas fa-trash"></i></a>
          </td>
          <!--botao delete--> 
             

        <?php } while($linha_endereco = $sql_query_endereco->fetch_assoc());?>
        </tr>
  <!--fim da lista de usuario -->     

       </tbody>

      </table>

<!--teste de limitador deletar ate aqui-->

<!--MODAL DA edição-->
                <div class="modal fade t-modal" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">EDITAR ENDEREÇO</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

    <!-- formulario de cadastro-->
    <form name="form-cadastrar" id="edit_endereco_form"  method="post">
                  <div class="inputs_login">  

                          <div class="inputs_login">  

                                <div class="inputs_login">  
                                          <input type="text" name="rua" class="input_modal_senha" id="erua" placeholder="Rua" required></input>
                                          <input name="nivel" class="input_modal_senha" id="enivel" placeholder="Nivel Ex: 1,2,3"required></input>
                                          <input name="sequencia" class="input_modal_senha" id="esequencia" placeholder="Sequencia Ex:1,2,3"required></input>

                                         <div>
                                              <input type="hidden" name="id" id="id_endereco"></input>
                                        </div>
                                 </div>

                                              

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href = 'endereco.php'">Cancelar</button>
                                      <button  type="submit" class="btn btn-success" id="ende_ed_gravar">Gravar</button>
                                    </div>
                    </form>
    <!-- fim do formulario de cadastro-->
                  </div>
                </div>
              </div>

          </div>



</body>
    
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>
    <script src="../js/botao_nav.js"></script>
    <script src="../js/tabela.js"></script>
    <script src="../js/conteudo_modal/conteudo_endereco_modal.js"></script>
    <script src="../js/feedback/feedback_endereco.js"></script>
    <script src="../js/feedback/feedback_endereco_edit.js"></script>
 
  

</html>