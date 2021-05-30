<?php
session_start();
include('../dao/conexao.php');
include('../dao/selects/select_produto.php');
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
  		$arquivo = 'produtos.xls';

  		//criando a tabela
  		$html = '';
  		$html .= '<table border="1">';
  		$html .= '<tr>';
  		$html .= '<td colspan="6" style="text-align:center"><b>Lista de Produtos</b></tr>';
  		$html .= '</tr>';

  		$html .= '<tr>';
  		$html .= '<td style="text-align:center"><b>Nome</b></td>';
  		$html .= '<td style="text-align:center"><b>Nome Curto</b></td>';
  		$html .= '<td style="text-align:center"><b>Quantidade</b></td>';
  		$html .= '<td style="text-align:center"><b>unidade</b></td>';
  		$html .= '<td style="text-align:center"><b>tipo</b></td>';
  		$html .= '<td style="text-align:center"><b>Dt.Cadastro</b></td>';
  		$html .= '</tr>';

  		do{
  				$html .= '<tr>';
  				$html .= '<td style="text-align:center">'.$linha_produto["nome"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_produto["nomecurto"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_produto["quantidade"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_produto["unidade"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_produto["tipoProduto"].'</td>';
  				$html .= '<td style="text-align:center">'.date("d/m/y", strtotime($linha_produto ['dataCadastro'])).'</td>';

  				$html .= '</tr>';


  		}while($linha_produto = $sql_query_produto->fetch_assoc());

  		//configurações para realizar o download
  		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  		header("Last-Modified:" .gmdate("D,d M YH:i:s") . "GMT");
  		header("Cache-Control: no-cache, must-revalidate");
  		header("Pragma: no-cache");
  		header("Content-Type: application/x-msexcel");
  		header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
  		header("Content-Description: PHP Generated Data");

  		echo $html;
  		exit;   		  		
  	?>


	</body>

</html>