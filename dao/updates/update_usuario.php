<?php
//inclusao do arquivo conexao.php

include('../conexao.php');
include('../../control/autenticacaoBD.php');
//
if(strcmp($_POST['senha'],$_POST['rsenha'])==0){
$nome = isset($_POST['nome']) == true ? $_POST['nome']:"";
$login = isset($_POST['login']) == true ? $_POST['login']:"";
$senha = isset($_POST['senha']) == true ? $_POST['senha']:"";
$boolean = isset($_POST['perfil']) == true ? $_POST['perfil']:"";
$id = isset($_POST['id']) == true ? $_POST['id']:"";

$query = "UPDATE .`usuario` SET `nome` = '$nome', `perfil` = '$boolean', `usuario` = '$login', `senha` = md5('$senha') WHERE (`id_Usuario` = '$id')";



$result = mysqli_query($conexao,$query);

	echo $query;


}else{

	echo "error";
}



?>