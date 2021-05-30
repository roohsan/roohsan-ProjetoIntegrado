<?php
  include('../control/autenticacao.php');
  include('../dao/selects/select_movimentacao.php');
  include('../dao/selects/select_produto.php');
  include('../dao/selects/select_usuario.php');
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
    <link rel="stylesheet" href="../css/cardsDashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="../js/feedback/feedback_senha_user.js"></script>
    



    <title>DASHBOARD</title>
  </head>

<body class="body_master">

<header>
          <nav class="navbar navbar-expand-lg nav_light nav_bar">
            <div>
              <span class="navbar-brand" id="logo"><i class="far fa-user"></i> <?php echo $_SESSION ['usuario'] ?></span>
             </div> 
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>

              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                 
                    <li class="nav-item">
                      <a   class=" nav-link logout_botao" onclick="window.location.href = '../control/logout.php'"><i class="fas fa-sign-out-alt icone"></i>SAIR</a>
                    </li>
                  </ul> 
              </div>


          </nav>


</header>
  <div class="conteudo">


  
      
<div class="row">
      <div class="card">
        <div class="card-header">
            <h1><i class="fas fa-users-cog"></i></i> </i> <?php echo $_SESSION ['nome'] ?></h1>
                </div>
                <div class="card-body">
                    <H3>Olá, </i> <?php echo $_SESSION ['usuario'] ?>, deseja alterar sua senha?</H3>
                  <a id="editar" type="button" data-toggle="modal" data-target="#edit_senha" data-backdrop="static" data-keyboard="false" class="btn"><i class="fas fa-arrow-right"></i> Clique aqui! <i class="fas fa-arrow-left"></i></a>
                </div>
              </div>

        <div class="card">
        <div class="card-header">
          <h1><i class="fas fa-box-open"></i> Produtos</h1>
        </div>
        <div class="card-body">
            <H1><?php echo $count_pro?></H1>
          <a href="produto.php" class="btn">Ativo(s) <i class="fas fa-link"></i></a>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h1><i class="fas fa-map-signs"></i> Endereços</h1>
        </div>
        <div class="card-body">
              <H1><?php echo $count_ende?></H1>
          <a href="endereco.php" class="btn">Ativo(s) <i class="fas fa-link"></i></a>
        </div>
      </div>




      <div class="card">
          <div class="card-header">
            <h1><i class="fas fa-truck-moving"></i> Movimentações</h1>
          </div>
          <div class="card-body">
              <H1><?php echo $count_movi?></H1>
            <a href="movimentacao.php" class="btn">Realizada(s) <i class="fas fa-link"></i></a>
          </div>
      </div>
    </div>
  </div>


    </div>



  </div>


  <div class="modal fade t-modal" id="edit_senha" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">EDITAR SENHA</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

    <!-- formulario de cadastro-->
                  <form name="form-editar" id="senha_edit" method="post" action="../dao/updates/update_senha.php" >

                                <div class="inputs_login">  
                                  <input type="text" name="nome" class="input_modal" id="renome" value="<?php echo $_SESSION ['nome'] ?>" DISABLED></input>
                                </div>

                                <div class="inputs_login">
                                  <input type="text" name="login" class="input_modal_senha" id="relogin" value="<?php echo $_SESSION ['usuario'] ?>" DISABLED></input>
                                </div>

                                <div class="inputs_login">
                                  <input type="password" name="senha" class="input_modal_senha" id="resenha" placeholder="Senha"required></input>
                                  <input type="password" name="rsenha" class="input_modal_senha" id="rersenha" placeholder="Repita Senha"required></input>
                                </div>

                                <div>
                                      <input type="hidden" name="id" id="rid_Usuario" value="<?php echo $_SESSION ['id_user'] ?>"  ></input>
                                </div>

                                

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="window.location.href = 'user.php'">Cancelar</button>
                        <button type="submit" class="btn btn-success" id="save_senha">Gravar</button>
                      </div>


                    </form>
    <!-- fim do formulario de cadastro-->
                  </div>
                </div>
              </div>

          </div>









</body>
    <script src="../jquery/jquery.min.js"></script>
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>

</html>