<?php
//inclusao do arquivo conexao.php
include('../../control/autenticacao.php');
include('../../dao/conexao.php');

$id = $_GET['id'];

//selecionando o produto, na tabela movimentacao, para devolver antes de deletar
$sql_query_move = "SELECT * FROM movimentacao where idmovimentacao = '$id'";
$sql_return_dados = $conexao->query($sql_query_move) or die ($conexao->error);
$linha_move_id = $sql_return_dados->fetch_assoc();
$quant_move = $linha_move_id ['quantidade'];
$id_prod_pk = $linha_move_id ['pk_produto'];

//selecionando o produto de acordo o id, para devolver a quatidade estornada!
$sql_query_produto = "SELECT * FROM produto where id_produto = '$id_prod_pk'";
$sql_return_dados = $conexao->query($sql_query_produto) or die ($conexao->error);
$linha_produto_id = $sql_return_dados->fetch_assoc();
$quant_pro = $linha_produto_id ['quantidade'];


	$cal_devol = $quant_pro + $quant_move;

	$query_up_produto = "UPDATE `produto` SET `quantidade` = '$cal_devol' WHERE (`id_produto` = '$id_prod_pk')";




$query = "DELETE FROM `movimentacao` WHERE (`idmovimentacao` = '$id')";

$result = mysqli_query($conexao,$query);
$result2 = mysqli_query($conexao,$query_up_produto);

header('location: ../../views/movimentacao.php');




?>