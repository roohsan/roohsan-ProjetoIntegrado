<?php
//inclusao do arquivo conexao.php
include('../../dao/conexao.php');
//variaveis do input
$ru = isset($_POST['rua']) == true ? $_POST['rua']:"";
$ni = isset($_POST['nivel']) == true ? $_POST['nivel']:"";
$seq = isset($_POST['sequencia']) == true ? $_POST['sequencia']:"";
$produto = isset($_POST['produto']) == true ? $_POST['produto']:"";
$quantidade = isset($_POST['quantidade']) == true ? $_POST['quantidade']:"";
$deposito = isset($_POST['deposito']) == true ? $_POST['deposito']:"";
$user = isset($_POST['user']) == true ? $_POST['user']:"";


//selecionando o produto, na tabela, para validar quantidade existente
$sql_query_produto = "SELECT * FROM produto where nome = '$produto'";
$sql_return_dados = $conexao->query($sql_query_produto) or die ($conexao->error);
$linha_produto_id = $sql_return_dados->fetch_assoc();
$quant_pro = $linha_produto_id ['quantidade'];
$pk_produto = $linha_produto_id ['id_produto'];

//pegando registros da rua,sequencia, nivel e deposito na tabela movimentação!
$sql_query_move = "SELECT rua,sequencia,nivel,deposito FROM movimentacao where rua = '$ru' and sequencia = '$seq' and nivel = '$ni' and deposito = '$deposito'";
$sql_return_dados = $conexao->query($sql_query_move) or die ($conexao->error);
$linha_move_id = $sql_return_dados->fetch_assoc();
$rua_move = $linha_move_id ['rua'];
$nivel_move = $linha_move_id ['nivel'];
$sequencia_move = $linha_move_id ['sequencia'];
$depos_move = $linha_move_id ['deposito'];


//validação se quantidade digitada corresponde a quantidade existente, e se o endereço está diferente de um produto alocado!
if(($quantidade<=$quant_pro)&&($quantidade>0)&&($ru!=$rua_move)&&($ni!=$nivel_move)&&($seq!=$sequencia_move)&&($deposito!=$depos_move)){

//validado o modulo da rua se é par ou impar de acordo ao sequencia digitada
		if($seq%2==0){


		$query = "INSERT INTO `movimentacao` (`produto`, `quantidade`, `rua`, `deposito`, `nivel`, `sequencia`, `modulo`, `dataMovimentacao`, `usuario`,`pk_produto`) VALUES ('$produto', '$quantidade', '$ru', '$deposito', '$ni', '$seq', 'Par', current_date(),'$user','$pk_produto')";

			$cal = $quant_pro - $quantidade;

			$query_up_produto = "UPDATE `produto` SET `quantidade` = '$cal' WHERE (`id_produto` = '$pk_produto')";


		}else{

		$query = "INSERT INTO `movimentacao` (`produto`, `quantidade`, `rua`, `deposito`, `nivel`, `sequencia`, `modulo`, `dataMovimentacao`, `usuario`,`pk_produto`) VALUES ('$produto', '$quantidade', '$ru', '$deposito', '$ni', '$seq', 'Impar', current_date(), '$user','$pk_produto')";

			$cal = $quant_pro - $quantidade;

			$query_up_produto = "UPDATE `produto` SET `quantidade` = '$cal' WHERE (`id_produto` = '$pk_produto')";
		}

}
$result = mysqli_query($conexao,$query);
$result2 = mysqli_query($conexao,$query_up_produto);





?>