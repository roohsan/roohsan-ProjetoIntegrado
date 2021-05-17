<?php
  include('../dao/conexao.php');
  $sql_code_deposito = "select * FROM deposito";
  $sql_query_deposito = $conexao->query($sql_code_deposito) or die ($conexao->error);
  $linha_deposito = $sql_query_deposito->fetch_assoc();
?>