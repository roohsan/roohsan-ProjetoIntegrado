<?php
	include('../control/autenticacao.php');
  include('../dao/selects/select_produto.php');
  include('../dao/selects/select_unidadeproduto.php');
  include('../dao/selects/select_tipoproduto.php');
  include('../dao/selects/select_edit_tipoproduto.php');
  include('../dao/selects/select_edit_unidadeproduto.php');
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
    <script src="../js/ajax/ajax_produto.js"></script>
    <script src="../js/ajax/ajax_produto_edit.js"></script>
    




		<title>PRODUTOS</title>
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
                                    <a href="endereco.php" class="nav-link"><i class="fas fa-map-signs"></i> <span>ENDEREÇAMENTO</span></a>
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

    <div class="container-fluid">

      <div>

<!--Botao do modal cadastro produtos-->        
        <button  id="botao_novo" type="button" class="user_btn" data-toggle="modal" data-target="#cadastro_modal" data-backdrop="static" data-keyboard="false"><i class="fas fa-box-open"></i> NOVO</button>

         <button  id="rela_excel" type="button" onclick="window.location.href = '../relatorios/rela_excel_produto.php'"><i class="fas fa-file-excel"></i> Relatorio</button>


<!--MODAL DA Cadastro produtos-->
            <div class="modal fade t-modal" id="cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">NOVO PRODUTO</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

<!-- formulario de cadastro-->
              <form name="form-cadastrar" id="produto_form"  method="post">

                                  <div class="inputs_login">  
                                    <input type="text" name="nome_produto" class="input_modal" id="nome_produto" placeholder="Nome" required></input>
                                  </div>

                            <div class="inputs_login">
                              <input name="nomeCurto" class="input_modal_senha" id="nomecurto" placeholder="Nome Curto"required></input>
                              <input name="codigo" class="input_modal_senha" id="codigo" placeholder="Codigo"required></input>
                            </div>

                                  <div class="inputs_login">
                                    <input name="qtd" class="input_modal_senha" id="qtd" placeholder="Quantidade"required></input>
                                  </div>

                                 <div class="select">
                                        <div class="label_select">
                                          <label for="unidade">Unidade</label>
                                        </div> 
                                        <select class = "form-control" name = "unidade" id="unidade" required>
                                          <option value= "">-----</option>
                                            <?php
                                               do{ 
                                             ?>

                                               <option value = "<?php echo $edit_unidadeproduto ['sigla']; ?>"><?php echo $edit_unidadeproduto ['unidade'];?></option>
                                            <?php } while ($edit_unidadeproduto = $sql_query_unidade_edit->fetch_assoc());?>
                                        </select>

                                  </div>

                                  <div class="select">
                                      <div class="label_select">
                                        <label for="tipo">Tipo</label>
                                      </div> 
                                      <select class = "form-control" name = "tipo" id="tipo" required>
                                        <option value= "">-----</option>
                                            <?php
                                              do{ 
                                            ?>

                                            <option value = "<?php echo $tipoproduto ['tipo']; ?>"><?php echo $tipoproduto ['tipo'];?></option>
                                            <?php } while ($tipoproduto = $sql_query_tipo->fetch_assoc());?>

                                      </select>
                           

                                  </div>

                            

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href = 'produto.php'">Cancelar</button>
                    <button type="submit" class="btn btn-success" id="gravarPro">Gravar</button>
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
            <th  style="text-align:center" scope="col">Codigo</th>
            <th  style="text-align:center" scope="col">Nome</th>
            <th  style="text-align:center" scope="col">Nome Curto</th>
            <th  style="text-align:center" scope="col">Quantidade</th>
            <th  style="text-align:center" scope="col">Unidade</th>
            <th  style="text-align:center" scope="col">Tipo</th>
            <th  style="text-align:center" scope="col">Dt.Cadastro</th>
            <th  style="text-align:center" scope="col">AÇÃO</th>

          </tr>
        </thead>

        <tbody>
      
      <?php do{ ?>
        <tr>
            <td style="text-align:center" ><?php echo $linha_produto ['codigo'];  ?></td>
            <td style="text-align:center" ><?php echo $linha_produto ['nome'];  ?></td>
            <td style="text-align:center" ><?php echo $linha_produto ['nomecurto'];  ?></td>
            <td style="text-align:center" ><?php echo $linha_produto ['quantidade'];  ?></td>
            <td style="text-align:center" ><?php echo $linha_produto ['unidade'];  ?></td>
            <td style="text-align:center" ><?php echo $linha_produto ['tipoProduto'];  ?></td>
            <td style="text-align:center" ><?php echo date("d/m/y", strtotime($linha_produto ['dataCadastro']));  ?></td>

   

<!--Acionador do modal edição-->
        <!--data-whatever dados para o modal-->
          <td style="text-align:center" >
            <a id="editar" type="button" data-toggle="modal" data-target="#edit_modal" data-backdrop="static" data-keyboard="false" data-whatever_id="<?php echo $linha_produto ['id_produto'];?>" data-whatever_nome="<?php echo $linha_produto ['nome'];?>"
              data-whatever_codigo="<?php echo $linha_produto ['codigo'];?>"  data-whatever_qtd="<?php echo $linha_produto ['quantidade'];?>" data-whatever_unidade="<?php echo $linha_produto ['unidade'];?>" data-whatever_tipo="<?php echo $linha_produto ['tipoProduto'];?>" data-whatever_nomecurto="<?php echo $linha_produto ['nomecurto'];?>" ><i class="fas fa-edit"></i></a> |
              <!--fim data-whatever dados para o modal-->
            <a  id="deletar" href="javascript:if(confirm('Tem certeza que deseja deletar o item selecionado? <?php echo $linha_produto ['nome'];  ?>')) location.href='../dao/deletes/delete_produto.php?id=<?php echo $linha_produto ['id_produto'];?>';"><i class="fas fa-trash"></i></a>
          </td>
          <!--botao delete--> 
             

        <?php } while($linha_produto = $sql_query_produto->fetch_assoc());?>
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
                      <h5 class="modal-title" id="exampleModalLongTitle">EDITAR PRODUTO</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

    <!-- formulario de cadastro-->
    <form name="form-cadastrar" id="edit_produto_form"  method="post">
                  <div class="inputs_login">  
                                    <input type="text" name="nomeproduto" class="input_modal" id="enomeproduto" placeholder="Nome" required></input>
                                  </div>

                                  <div class="inputs_login">
                                    <input name="nomecurto" class="input_modal_senha" id="enomecurto" placeholder="Nome Curto"required></input>
                                    <input name="codigo" class="input_modal_senha" id="ecodigo" placeholder="Codigo"required></input>
                                  </div>

                                  <div class="inputs_login">
                                    <input name="qtd" class="input_modal_senha" id="eqtd" placeholder="Quantidade"required></input>
                                  </div>

                                 <div class="select">
                                    <div class="label_select">
                                      <label for="unidade">Unidade</label>
                                    </div> 
                                        <select class = "form-control" name = "unidade" id="eunidade" required>
                                          <option value= "">-----</option>
                                            <?php
                                               do{ 
                                             ?>

                                    <option value = "<?php echo $unidadeproduto ['sigla']; ?>"><?php echo $unidadeproduto ['unidade'];?></option>
                                          <?php } while ($unidadeproduto = $sql_query_unidade->fetch_assoc());?>
                                        </select>

                                  </div>

                                  <div class="select">
                                    <div class="label_select">
                                      <label for="tipo">Tipo</label>
                                    </div> 
                                        <select class = "form-control" name = "tipo" id="etipo" required>
                                          <option value= "">-----</option>
                                              <?php
                                                do{ 
                                              ?>

                                              <option value = "<?php echo $edit_tipoproduto ['tipo']; ?>"><?php echo $edit_tipoproduto ['tipo'];?></option>
                                                    <?php } while ($edit_tipoproduto = $sql_query_edit_tipo->fetch_assoc());?>

                                        </select>
                         

                                       </div>

                                 <div>
                                      <input type="hidden" name="idproduto" id="idproduto"  ></input>
                                </div>

                                

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href = 'produto.php'">Cancelar</button>
                        <button  type="submit" class="btn btn-success" id="esalvar">Gravar</button>
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
    <script src="../js/conteudo_modal/conteudo_produto_modal.js"></script>
    <script src="../js/feedback/feedback_produto.js"></script>
    <script src="../js/feedback/feedback_produto_edit.js"></script>
 
  

</html>