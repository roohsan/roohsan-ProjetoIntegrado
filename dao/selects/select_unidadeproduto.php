<?php
  include('../dao/conexao.php');
  $sql_code_unidade = "select * FROM unidadeproduto";
  $sql_query_unidade = $conexao->query($sql_code_unidade) or die ($conexao->error);
  $unidadeproduto = $sql_query_unidade->fetch_assoc();
?>