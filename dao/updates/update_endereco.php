<?php
//inclusao do arquivo conexao.php

include('../conexao.php');
//
$rua = isset($_POST['rua']) == true ? $_POST['rua']:"";
$nivel = isset($_POST['nivel']) == true ? $_POST['nivel']:"";
$sequencia = isset($_POST['sequencia']) == true ? $_POST['sequencia']:"";
$id = isset($_POST['id_endereco']) == true ? $_POST['id_endereco']:"";



if($sequencia%2==0){

	$query ="UPDATE `estoque`.`endereco` SET `rua` = '$rua', `nivel` = '$nivel', `sequencia` = '$sequencia', `modulo` = 'Par' WHERE (`id_endereco` = '$id')";
}else{

	$query ="UPDATE `estoque`.`endereco` SET `rua` = '$rua', `nivel` = '$nivel', `sequencia` = '$sequencia', `modulo` = 'Impar' WHERE (`id_endereco` = '$id')";
}
echo $query;

$result = mysqli_query($conexao,$query);




?>