<?php
//inclusao do arquivo conexao.php
include('../../dao/conexao.php');
//
$codigo = isset($_POST['codigo']) == true ? $_POST['codigo']:"";
$nome_produto = isset($_POST['nome_produto']) == true ? $_POST['nome_produto']:"";
$nomecurto = isset($_POST['nomecurto']) == true ? $_POST['nomecurto']:"";
$qtd = isset($_POST['qtd']) == true ? $_POST['qtd']:"";
$unidade = isset($_POST['unidade']) == true ? $_POST['unidade']:"";
$tipo = isset($_POST['tipo']) == true ? $_POST['tipo']:"";


$query = "INSERT INTO `produto` (`nome`, `nomecurto`, `quantidade`, `unidade`, `tipoProduto`, `dataCadastro`, `codigo`) VALUES ('$nome_produto', '$nomecurto', '$qtd', '$unidade', '$tipo', current_date(), '$codigo')";



echo $query;

$result = mysqli_query($conexao,$query);

//header('location: ../../views/usuario.php');





?>