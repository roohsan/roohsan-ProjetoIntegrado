<?php
//inclusao do arquivo conexao.php

include('../conexao.php');
include('../../control/autenticacaoBD.php');
//
if(strcmp($_POST['senha'],$_POST['rsenha'])==0){
$senha = isset($_POST['senha']) == true ? $_POST['senha']:"";
$id = isset($_POST['id']) == true ? $_POST['id']:"";

$query = "UPDATE `estoque`.`usuario` SET `senha` = md5('$senha') WHERE (`id_Usuario` = '$id')";



$result = mysqli_query($conexao,$query);

	header('location: ../../views/user.php');
		


}else{

	header('location: ../../views/user.php');
}



?>