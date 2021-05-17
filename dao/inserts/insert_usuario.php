<?php
//inclusao do arquivo conexao.php
include('../../dao/conexao.php');
//
if(strcmp($_POST['senha'],$_POST['rsenha'])==0){
$nome = isset($_POST['nome']) == true ? $_POST['nome']:"";
$login = isset($_POST['login']) == true ? $_POST['login']:"";
$senha = isset($_POST['senha']) == true ? $_POST['senha']:"";
$boolean = isset($_POST['perfil']) == true ? $_POST['perfil']:"";

$query = "INSERT INTO `usuario` (`nome`, `perfil`, `usuario`, `senha`,`dataCadastro`) VALUES ('$nome',  '$boolean', '$login', md5('$senha'),current_date())";

$result = mysqli_query($conexao,$query);

//header('location: ../../views/usuario.php');

} 




?>