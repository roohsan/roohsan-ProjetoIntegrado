<?php
  include('../dao/conexao.php');
  $sql_code_produto = "select * FROM produto";
  $sql_query_produto = $conexao->query($sql_code_produto) or die ($conexao->error);
  $linha_produto = $sql_query_produto->fetch_assoc();
?>