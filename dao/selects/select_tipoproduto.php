<?php
  include('../dao/conexao.php');
  $sql_code_tipo = "select * FROM tipoproduto";
  $sql_query_tipo = $conexao->query($sql_code_tipo) or die ($conexao->error);
  $tipoproduto = $sql_query_tipo->fetch_assoc();
?>