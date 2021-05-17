<?php
session_start();
//inclusao do arquivo conexao.php
include('../dao/conexao.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header('location: index.php');
	exit();
}
//atribuindo os valores do formulario as variaveis locais
$usuario = mysqli_real_escape_string($conexao,$_POST['usuario']);
$senha = mysqli_real_escape_string($conexao,$_POST['senha']);

//query de seleção comparando o que foi digitado com o que esta no banco
$query = "SELECT  * FROM  usuario where usuario = '{$usuario}' and senha =md5('{$senha}')";


$result = mysqli_query($conexao,$query);

//ver o tanto de linhas encontradas
$row = mysqli_num_rows($result);
//atribuindo dos dados a variavel auxilar
$aux = mysqli_fetch_assoc($result);

$perfil = $aux['perfil'];
$nome = $aux['nome'];
$aux_register;

	
	//validando se o retorno da linha consta um usuario ativo
	if(($row==1)&&($perfil==1)){
		$_SESSION ['usuario'] = $usuario;
		$_SESSION ['nome'] = $nome;
		$aux_register = $nome;
			header('location: ../views/admin.php');
			exit();	
		}


	else if(($row==1)&&($perfil==2)){

		$_SESSION ['usuario'] = $usuario;
		$_SESSION ['nome'] = $nome;
		header('location: ../views/user.php');
		exit();
		
	} 

	else{

		$_SESSION['nao_autenticado'] = true;
			header('location: ../index.php');
		exit();
	}
?>