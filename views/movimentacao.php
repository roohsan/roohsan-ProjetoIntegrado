<?php
  include('../control/autenticacao.php');
  include('../dao/selects/select_movimentacao.php');
  include('../dao/selects/select_produto.php');
  include('../dao/selects/select_rua.php');
  include('../dao/selects/select_nivel.php');
  include('../dao/selects/select_sequencia.php');
  include('../dao/selects/select_modulo.php');
  include('../dao/selects/select_deposito.php');
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
    <script src="../js/ajax/ajax_movimentacao.js"></script>
    <!--<script src="../js/ajax/ajax_movimentacao_edit.js"></script>-->
    




    <title>MOVIMENTAÇÃO</title>
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
                                    <a href="endereco.php" class="nav-link"><i class="fas fa-map-signs"></i> <span>ENDEREÇAMENTO</span></a>
                               
                                  <li class="nav-item">
                                    <a   class=" nav-link logout_botao" onclick="window.location.href = '../control/logout.php'"><i class="fas fa-sign-out-alt icone"></i>SAIR</a>
                                  </li>
                                </ul> 
                            </div>


                        </nav>
              </header>

  <div class="conteudo">

    <div class="container-fluid">

      <div>

<!--Botao do modal cadastro produtos-->        
        <button  id="botao_novo" type="button" class="user_btn" data-toggle="modal" data-target="#cadastro_modal" data-backdrop="static" data-keyboard="false"><i class="fas fa-people-carry"></i> NOVA</button>

         <button  id="rela_excel" type="button" onclick="window.location.href = '../relatorios/rela_excel_movimentacao.php'"><i class="fas fa-file-excel"></i> Relatorio</button>


         




<!--MODAL DA Cadastro produtos-->
            <div class="modal fade t-modal" id="cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">ALOCAR PRODUTO</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

<!-- formulario de cadastro-->
              <form name="form-cadastrar" id="movimentacao_form"  method="post">

            

                                  <div class="select">
                                        <div class="label_select">
                                          <label for="Rua">Rua</label>
                                        </div> 
                                        <select class = "form-control" name = "rua" id="rua" required>
                                          <option value= "">-----</option>
                                            <?php
                                               do{ 
                                             ?>

                                               <option value = "<?php echo $linha_rua ['nome_rua']; ?>"><?php echo $linha_rua ['nome_rua'];?></option>
                                            <?php } while ($linha_rua = $sql_query_rua->fetch_assoc());?>
                                        </select>

                                  </div>



                                   <div class="select">
                                        <div class="label_select">
                                          <label for="Sequencia">Sequencia</label>
                                        </div> 
                                        <select class = "form-control" name = "sequencia" id="sequencia" required>
                                          <option value= "">-----</option>
                                            <?php
                                               do{ 
                                             ?>

                                               <option value = "<?php echo $linha_sequencia ['nome_sequencia']; ?>"><?php echo $linha_sequencia ['nome_sequencia'];?></option>
                                            <?php } while ($linha_sequencia = $sql_query_sequencia->fetch_assoc());?>
                                        </select>

                                  </div>

                                    <div class="select">
                                        <div class="label_select">
                                          <label for="Nivel">Nivel</label>
                                        </div> 
                                        <select class = "form-control" name = "nivel" id="nivel" required>
                                          <option value= "">-----</option>
                                            <?php
                                               do{ 
                                             ?>

                                               <option value = "<?php echo $linha_nivel ['nome_nivel']; ?>"><?php echo $linha_nivel ['nome_nivel'];?></option>
                                            <?php } while ($linha_nivel = $sql_query_nivel->fetch_assoc());?>
                                        </select>

                                  </div>




                                   <div class="select">
                                        <div class="label_select">
                                          <label for="produto">Produto</label>
                                        </div> 
                                        <select class = "form-control" name = "produto" id="produto" required>
                                          <option value= "">-----</option>
                                            <?php
                                               do{ 
                                             ?>

                                               <option value = "<?php echo $linha_produto ['nome']; ?>"><?php echo $linha_produto ['nome'];?></option>
                                            <?php } while ($linha_produto = $sql_query_produto->fetch_assoc());?>
                                        </select>

                                  </div>

                                     <div class="qtd_movimento">  
                                    
                                      <input name="quantidade" class="input_modal_senha" id="quantidade" placeholder="Quantidade"required></input>
                                 
                                    </div>

                                 <div class="select">
                                        <div class="label_select">
                                          <label for="Deposito">Deposito</label>
                                        </div> 
                                        <select class = "form-control" name = "deposito" id="deposito" required>
                                          <option value= "">-----</option>
                                            <?php
                                               do{ 
                                             ?>

                                               <option value = "<?php echo $linha_deposito ['nome_deposito']; ?>"><?php echo $linha_deposito ['nome_deposito'];?></option>
                                            <?php } while ($linha_deposito = $sql_query_deposito->fetch_assoc());?>
                                        </select>
                                      

                                <div>
                                      <input type="hidden" value="<?php echo $_SESSION ['usuario'];?>" name="user" id="user"  ></input>
                                </div>

                                  </div>
      

                            

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href = 'movimentacao.php'">Cancelar</button>
                    <button type="submit" class="btn btn-success" id="gravarMovi">Gravar</button>
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
            <th style="text-align:center" scope=" col">Usuario</th>
            <th style="text-align:center" scope="col">Produto</th>
            <th style="text-align:center" scope="col">Quantidade</th>
            <th style="text-align:center" scope="col">Deposito</th>
            <th style="text-align:center" scope="col">Rua</th>
            <th style="text-align:center" scope="col">Nivel</th>
            <th style="text-align:center" scope="col">Sequencia</th>
            <th style="text-align:center" scope="col">Modulo</th>
            <th style="text-align:center" scope="col">Dt. Cadastro</th>
            <th style="text-align:center" scope="col">AÇÃO</th>

          </tr>
        </thead>

        <tbody>
      
      <?php do{ ?>
        <tr>
            <td style="text-align:center" ><?php echo $linha ['usuario'];  ?></td>
            <td style="text-align:center"><?php echo $linha ['produto'];  ?></td>
            <td style="text-align:center"><?php echo $linha ['quantidade'];  ?></td>
            <td style="text-align:center"><?php echo $linha ['deposito'];  ?></td>
            <td style="text-align:center"><?php echo $linha ['rua'];  ?></td>
            <td style="text-align:center"><?php echo $linha ['nivel'];  ?></td>
            <td style="text-align:center"><?php echo $linha ['sequencia'];  ?></td>
            <td style="text-align:center"><?php echo $linha ['modulo'];  ?></td>
            <td style="text-align:center"><?php echo date("d/m/y", strtotime($linha ['dataMovimentacao']));  ?></td>

   

<!--Acionador do modal edição-->
        <!--data-whatever dados para o modal-->
          <td style="text-align:center">
              <!--fim data-whatever dados para o modal-->
            <a  id="deletar" href="javascript:if(confirm('Tem certeza que deseja estornar a movimentação do produto? Produto-<?php echo $linha ['produto'];?>')) location.href='../dao/deletes/delete_movimentacao.php?id=<?php echo $linha ['idmovimentacao'];?>';"><i class="fas fa-trash"></i></a>
          </td>
          <!--botao delete--> 
             

        <?php } while($linha = $sql_query->fetch_assoc());?>
        </tr>
  <!--fim da lista de usuario -->     

       </tbody>

      </table>

<!--teste de limitador deletar ate aqui-->



</body>
    
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>
    <script src="../js/botao_nav.js"></script>
    <script src="../js/tabela.js"></script>
    <script src="../js/conteudo_modal/conteudo_endereco_modal.js"></script>
    <script src="../js/feedback/feedback_movimentacao.js"></script>
    <script src="../js/feedback/feedback_movimentacao_edit.js"></script>
 
  

</html>