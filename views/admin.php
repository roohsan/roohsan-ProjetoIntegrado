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
    <link rel="stylesheet" href="../css/cardsDashboard.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


		<title>DASHBOARD</title>
  </head>

<body class="body_master">

<header>
          <nav class="navbar navbar-expand-lg nav_light nav_bar">
            <div>
              <span class="navbar-brand" href="admin.php" id="logo"><i class="fas fa-user-plus"></i> <?php echo $_SESSION ['usuario'] ?></span>
             </div> 
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>

              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="usuario.php" class="nav-link"><i class="fas fa-users"></i> <span>USUARIOS</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="produto.php" class="nav-link"><i class="fas fa-box-open"></i> <span>PRODUTOS</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="endereco.php" class="nav-link"><i class="fas fa-map-signs"></i> <span>ENDEREÇAMENTO</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="movimentacao.php" class="nav-link"><i class="fas fa-truck-moving"></i> <span>MOVIMENTAÇÕES</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="relatorio.php" class="nav-link"><i class="fas fa-file-alt"></i></i> <span>RELATORIOS</span></a>
                    </li>
                 
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
            <h1><i class="fas fa-users"></i> Usuarios</h1>
                </div>
                <div class="card-body">
                    <H1><?php echo $count_user?></H1>
                  <a href="usuario.php" class="btn">Ativo(s)</a>
                </div>
              </div>

        <div class="card">
        <div class="card-header">
          <h1><i class="fas fa-box-open"></i> Produtos</h1>
        </div>
        <div class="card-body">
            <H1><?php echo $count_pro?></H1>
          <a href="produto.php" class="btn">Ativo(s)</a>
        </div>
      </div>

      <div class="card">
        <div class="card-header">
          <h1><i class="fas fa-map-signs"></i> Endereços</h1>
        </div>
        <div class="card-body">
              <H1><?php echo $count_ende?></H1>
          <a href="endereco.php" class="btn">Ativo(s)</a>
        </div>
      </div>




      <div class="card">
          <div class="card-header">
            <h1><i class="fas fa-truck-moving"></i> Movimentações</h1>
          </div>
          <div class="card-body">
              <H1><?php echo $count_movi?></H1>
            <a href="movimentacao.php" class="btn">Realizada(s)</a>
          </div>
      </div>
    </div>
  </div>


    </div>



  </div>












</body>

    <script src="../js/app.js"></script>
    <script src="../jquery/jquery.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>

</html>