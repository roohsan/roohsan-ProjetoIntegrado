<?php
session_start();
include('../dao/conexao.php');
include('../dao/selects/select_audi_relatorio.php');
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
  		$arquivo = 'movimentacoes.xls';

  		//criando a tabela
  		$html = '';
  		$html .= '<table border="1">';
  		$html .= '<tr>';
  		$html .= '<td colspan="9" style="text-align:center"><b>Movimentações Realizadas</b></tr>';
  		$html .= '</tr>';

  		$html .= '<tr>';
  		$html .= '<td style="text-align:center"><b>Usuario</b></td>';
  		$html .= '<td style="text-align:center"><b>Produto</b></td>';
  		$html .= '<td style="text-align:center"><b>Quantidade</b></td>';
  		$html .= '<td style="text-align:center"><b>Deposito</b></td>';
  		$html .= '<td style="text-align:center"><b>Rua</b></td>';
  		$html .= '<td style="text-align:center"><b>Nivel</b></td>';
  		$html .= '<td style="text-align:center"><b>Sequencia</b></td>';
  		$html .= '<td style="text-align:center"><b>Moddulo</b></td>';
  		$html .= '<td style="text-align:center"><b>Dt. Cadastro</b></td>';
  		$html .= '</tr>';

  		do{
  				$html .= '<tr>';
  				$html .= '<td style="text-align:center">'.$linha_movi_relatorio["usuario_audi"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_movi_relatorio["produto_audi"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_movi_relatorio["quantidade_audi"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_movi_relatorio["deposito_audi"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_movi_relatorio["rua_audi"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_movi_relatorio["nivel_audi"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_movi_relatorio["sequencia_audi"].'</td>';
  				$html .= '<td style="text-align:center">'.$linha_movi_relatorio["modulo_audi"].'</td>';
  				$html .= '<td style="text-align:center">'.date("d/m/y", strtotime($linha_movi_relatorio ['dataMovimentacao_audi'])).'</td>';

  				$html .= '</tr>';


  		}while($linha_movi_relatorio = $sql_query_movi_relatorio->fetch_assoc());

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