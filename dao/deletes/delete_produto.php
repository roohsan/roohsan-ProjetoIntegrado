<?php
//inclusao do arquivo conexao.php
include('../../control/autenticacao.php');
include('../../dao/conexao.php');

$id = $_GET['id'];

$query = "DELETE FROM `produto` WHERE (`id_produto` = '$id')";

$result = mysqli_query($conexao,$query);

header('location: ../../views/produto.php');
?>