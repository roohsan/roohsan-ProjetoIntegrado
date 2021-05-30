<?php
	include('../control/autenticacao.php');
  include('../dao/selects/select_usuario.php');
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
    <script src="../js/ajax/ajax_user.js"></script>
    <script src="../js/ajax/ajax_user_edit.js"></script>
    




		<title>USUARIOS</title>
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

<!--Botao do modal cadastro usuario-->        
        <button  id="botao_novo" type="button" class="user_btn" data-toggle="modal" data-target="#cadastro_modal" data-backdrop="static" data-keyboard="false"><i class="fas fa-user"></i> NOVO</button>

         <button  id="rela_excel" type="button" onclick="window.location.href = '../relatorios/rela_excel_usuario.php'"><i class="fas fa-file-excel"></i> Relatorio</button>



<!--MODAL DA Cadastro usuario-->
            <div class="modal fade t-modal" id="cadastro_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">NOVO USUARIO</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

<!-- formulario de cadastro-->
              <form name="form-cadastrar" id="usuario_form"  method="post">

                                  <div class="inputs_login">  
                                    <input type="text" name="nome" class="input_modal" id="nome" placeholder="Nome" required></input>
                                  </div>

                                  <div class="inputs_login">
                                    <input type="text" name="login" class="input_modal_senha" id="login" placeholder="Login"required></input>
                                  </div>

                                  <div class="inputs_login">
                                    <input type="password" name="senha" class="input_modal_senha" id="senha" placeholder="Senha"required></input>
                                    <input type="password" name="rsenha" class="input_modal_senha" id="rsenha" placeholder="Repita Senha"required></input>
                                  </div>

                                  <div class="select">
                                    <div class="label_select">
                                      <label for="perfil">Perfil</label>
                                    </div> 
                                        <select class = "form-control" name = "perfil" id="perfil" required>
                                          <option value= "">-----</option>
                                          <option value= "1">Administrador</option>
                                          <option value= "2">Usuario</option>
                                        </select>

                                  </div>

                            

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href = 'usuario.php'">Cancelar</button>
                    <button type="submit" class="btn btn-success" id="cadastrar">Gravar</button>
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
            <th style="text-align:center" scope="col">Nome</th>
            <th style="text-align:center" scope="col">Login</th>
            <th style="text-align:center" scope="col">Perfil</th>
            <th style="text-align:center" scope="col">Dt. Cadastro</th>
            <th style="text-align:center" scope="col">AÇÃO</th>

          </tr>
        </thead>

        <tbody>
      
      <?php do{ ?>
        <tr>
            <td style="text-align:center" > <?php echo $linha ['nome'];  ?></td>
            <td style="text-align:center" > <?php echo $linha ['usuario'];  ?></td>

        <?php
          
            if(($linha ['perfil'])==1){
              $aux = "Administrador";
              }
              else{
                $aux = "Usuario";
              }
          
          ?>
            <td style="text-align:center" > <?php echo $aux;  ?></td>

            <td style="text-align:center" > <?php echo date("d/m/y", strtotime($linha ['dataCadastro']));?></td>

            
<!--Acionador do modal edição-->
        <!--data-whatever dados para o modal-->
          <td style="text-align:center">
            <a id="editar" type="button" data-toggle="modal" data-target="#edit_modal" data-backdrop="static" data-keyboard="false" data-whatever_id="<?php echo $linha ['id_Usuario'];?>" data-whatever_nome="<?php echo $linha ['nome'];?>"
              data-whatever_usuario="<?php echo $linha ['usuario'];?>"><i class="fas fa-user-edit"></i></a> |
              <!--fim data-whatever dados para o modal-->
            <a  id="deletar" href="javascript:if(confirm('Tem certeza que deseja deletar o usuario? <?php echo $linha ['nome'];?>')) location.href='../dao/deletes/delete_usuario.php?id=<?php echo $linha ['id_Usuario'];?>';"><i class="fas fa-trash"></i></a>
          </td>
          <!--botao delete--> 
             

        <?php } while($linha = $sql_query->fetch_assoc());?>
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
                      <h5 class="modal-title" id="exampleModalLongTitle">EDITAR USUARIO</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

    <!-- formulario de cadastro-->
                  <form name="form-editar" id="usuario_form_edit" method="post">

                                <div class="inputs_login">  
                                  <input type="text" name="nome" class="input_modal" id="enome" placeholder="Nome" required></input>
                                </div>

                                <div class="inputs_login">
                                  <input type="text" name="login" class="input_modal_senha" id="elogin" placeholder="Login"required></input>
                                </div>

                                <div class="inputs_login">
                                  <input type="password" name="senha" class="input_modal_senha" id="esenha" placeholder="Senha"required></input>
                                  <input type="password" name="rsenha" class="input_modal_senha" id="ersenha" placeholder="Repita Senha"required></input>
                                </div>

                                <div class="select">
                                  <div class="label_select">
                                    <label for="perfil">Perfil</label>
                                  </div> 
                                      <select class = "form-control" name = "perfil" id="eperfil" required>
                                        <option value= "">-----</option>
                                        <option value= "1">Administrador</option>
                                        <option value= "2">Usuario</option>
                                      </select>

                                </div>

                                <div>
                                      <input type="hidden" name="id" id="id_Usuario"  ></input>
                                </div>

                                

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href = 'usuario.php'">Cancelar</button>
                        <button type="" class="btn btn-success" id="salvar">Gravar</button>
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
    <script src="../js/conteudo_modal/conteudo_user_modal.js"></script>
    <script src="../js/feedback/feedback_user.js"></script>
    <script src="../js/feedback/feedback_user_edit.js"></script>
  

</html>