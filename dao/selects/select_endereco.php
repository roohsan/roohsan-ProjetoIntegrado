<?php
  include('../dao/conexao.php');
  $sql_code_endereco = "select * FROM endereco";
  $sql_query_endereco = $conexao->query($sql_code_endereco) or die ($conexao->error);
  $linha_endereco = $sql_query_endereco->fetch_assoc();
?>