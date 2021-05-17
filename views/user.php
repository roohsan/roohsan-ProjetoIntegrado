<?php
	include('../control/autenticacao.php');
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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


		<title>DASHBOARD</title>
  </head>

<body class="body_master">

<header>
          <nav class="navbar navbar-expand-lg nav_light nav_bar">
              <span class="navbar-brand" href="#" id="logo">LOGO</span>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>

              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav">
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="fas fa-desktop"></i> <span>DASBOARD</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="fas fa-users"></i> <span>USUARIOS</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="fas fa-box-open"></i> <span>PRODUTOS</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="fas fa-map-signs"></i> <span>ENDEREÇAMENTO</span></a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link"><i class="fas fa-truck-moving"></i> <span>MOVIMENTAÇÕES</span></a>
                    </li>
                 
                    <li class="nav-item">
                      <a   class=" nav-link logout_botao" onclick="window.location.href = '../control/logout.php'"><i class="fas fa-sign-out-alt icone"></i>SAIR</a>
                    </li>
                  </ul> 
              </div>


          </nav>


</header>

  <div class="conteudo">

    <div class="body">
      

    </div>


  </div>