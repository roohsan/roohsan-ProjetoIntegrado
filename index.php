<?php
session_start();
?>
<!doctype html>


<html lang="pt-br">
  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- Bootstrap CSS -->
		<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">-->
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/stylo_login.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">


		<title>HOME</title>
  </head>

  <body class="body_login">

<div class="container container_login">



		<div class="col-lg-4 centralizador ">

	

				<form action="control/login.php" method="post">

				  		<div class="inputs_login">	
				  			<i class="fas fa-users icone fonte"></i> <label class="fonte">Login</label>
				  			<input type="text" name="usuario" class="form-control" placeholder="Login" required></input>
				  		</div>

				  		<div class="inputs_login">
				  			<label class="fonte">Senha</label>
				  			<input type="password" name="senha" class="form-control" placeholder="********"required></input>
				  		</div>

			  		<div class="inputs_login">
			  			<button type="submit" name="botao" class="btn1">Entrar <i class="fas fa-sign-in-alt"></i></button>
			  		</div>

								  	<?php
										if(isset($_SESSION['nao_autenticado'])):
									?>
											<div class="">
												<p class="fonte">Usuário ou Senha Incorreta!</p>
											</div>
									<?php
										endif;
										unset($_SESSION['nao_autenticado']);
									?>

				</form>

	


	  	</div>

</div>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>
	</body>

</html>