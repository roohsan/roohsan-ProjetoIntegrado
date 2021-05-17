<?php
//inclusao do arquivo conexao.php
include('../../control/autenticacao.php');
include('../../dao/conexao.php');

$id = $_GET['id'];

$query = "DELETE FROM `endereco` WHERE (`id_endereco` = '$id')";

$result = mysqli_query($conexao,$query);

header('location: ../../views/endereco.php');




?>