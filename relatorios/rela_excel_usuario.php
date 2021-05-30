<?php
session_start();
include('../dao/conexao.php');
include('../dao/selects/select_usuario.php');
include('../control/autenticacao.php');
?>
<!doctype html>


<html lang="pt-br">
  <head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">


		<title>movimentacao</title>
  </head>

  <body >
  	<?php
  		//definindo o nome do relatorio
  		$arquivo = 'usuarios.xls';

  		//criando a tabela
  		$html = '';
  		$html .= '<table border="1">';
  		$html .= '<tr>';
  		$html .= '<td colspan="4" style="text-align:center"><b>Lista de Usuarios</b></tr>';
  		$html .= '</tr>';

  		$html .= '<tr>';
  		$html .= '<td style="text-align:center"><b>Nome</b></td>';
  		$html .= '<td style="text-align:center"><b>Login</b></td>';
  		$html .= '<td style="text-align:center"><b>Perfil</b></td>';
  		$html .= '<td style="text-align:center"><b>Dt. Cadastro</b></td>';
  		$html .= '</tr>';

  		do{
  				$html .= '<tr>';
  				$html .= '<td style="text-align:center">'.$linha["nome"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha["usuario"].'</td>';

  				   if(($linha ['perfil'])==1){
              $aux = "Administrador";
              }
              else{
                $aux = "Usuario";
              }
  				$html .= '<td style="text-align:center">'.$aux.'</td>';
  				$html .= '<td style="text-align:center">'.date("d/m/y", strtotime($linha ['dataCadastro'])).'</td>';

  				$html .= '</tr>';


  		}while($linha = $sql_query->fetch_assoc());

  		//configurações para realizar o download
  		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  		header("Last-Modified:" .gmdate("D,d M YH:i:s") . "GMT");
  		header("Cache-Control: no-cache, must-revalidate");
  		header("Pragma: no-cache");
  		header("Content-Type: application/vnd.ms-excel");
  		header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
  		header("Content-Description: PHP Generated Data");

  		echo $html;
  		exit;   		  		
  	?>


	</body>

</html>