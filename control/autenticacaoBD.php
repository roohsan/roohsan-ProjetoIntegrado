<?php
//permissão para usuario entrar na pagina, apenas autenticado!
session_start();
include('../dao/conexao.php');

if(!$_SESSION['usuario']){
	header('location:../../index.php');
	exit();
}