<?php
//inclusao do arquivo conexao.php

include('../../dao/conexao.php');
include('../../control/autenticacaoBD.php');
//

$nome = isset($_POST['nome']) == true ? $_POST['nome']:"";
$login = isset($_POST['login']) == true ? $_POST['login']:"";
$senha = isset($_POST['senha']) == true ? $_POST['senha']:"";
$boolean = isset($_POST['perfil']) == true ? $_POST['perfil']:"";


$query_code_user = "SELECT * FROM usuario where usuario = ('$login')";
$sql_query_user = $conexao->query($query_code_user) or die ($conexao->error);
$linha_user = $sql_query_user->fetch_assoc();
$count_user = mysqli_num_rows($sql_query_user);


$result2 = mysqli_query($conexao,$sql_query_user);


$aux_user = $linha_user['usuario'];


if($login!=$aux_user){

$query = "INSERT INTO `usuario` (`nome`, `perfil`, `usuario`, `senha`,`dataCadastro`) VALUES ('$nome',  '$boolean', '$login', md5('$senha'),current_date())";

$result = mysqli_query($conexao,$query);

}elseif($login===$aux_user){

	echo  "<script type='javascript'>alert('Usuario ja cadastrado!');";
	$aux=0;


}
//header('location: ../../views/usuario.php');






?>