<?php
//inclusao do arquivo conexao.php

include('../conexao.php');
include('../../control/autenticacaoBD.php');
//
$codigo = isset($_POST['codigo']) == true ? $_POST['codigo']:"";
$nomeproduto = isset($_POST['nomeproduto']) == true ? $_POST['nomeproduto']:"";
$nomecurto = isset($_POST['nomecurto']) == true ? $_POST['nomecurto']:"";
$qtd = isset($_POST['qtd']) == true ? $_POST['qtd']:"";
$unidade = isset($_POST['unidade']) == true ? $_POST['unidade']:"";
$tipo = isset($_POST['tipo']) == true ? $_POST['tipo']:"";
$id = isset($_POST['id']) == true ? $_POST['id']:"";


$query =  "UPDATE `produto` SET `nome` = '$nomeproduto', `nomecurto` = '$nomecurto', `quantidade` = '$qtd', `unidade` = '$unidade', `tipoProduto` = '$tipo', `codigo` = '$codigo' WHERE (`id_produto` = '$id')";

echo $query;

$result = mysqli_query($conexao,$query);




?>