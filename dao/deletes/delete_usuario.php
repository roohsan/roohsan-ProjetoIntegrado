<?php
//inclusao do arquivo conexao.php
include('../../control/autenticacao.php');
include('../../dao/conexao.php');

$id = $_GET['id'];

$query = "SELECT  * FROM  usuario where id_Usuario= '$id'";

$result = mysqli_query($conexao,$query);

//pegando a linha especifica
$aux = mysqli_fetch_assoc($result);

//extraido informação do banco e atribuindo a variavel
$notdelete = $aux['notdelete'];

if($notdelete!=1){
$query = "DELETE FROM `usuario` WHERE (`id_Usuario` = '$id')";

$result = mysqli_query($conexao,$query);
}else{

	
}
header('location: ../../views/usuario.php');




?>