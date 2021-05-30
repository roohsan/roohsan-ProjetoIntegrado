<?php
  include('../dao/conexao.php');
  $sql_code_movi_relatorio = "select * FROM audi_relatorio";
  $sql_query_movi_relatorio = $conexao->query($sql_code_movi_relatorio) or die ($conexao->error);
  $linha_movi_relatorio = $sql_query_movi_relatorio->fetch_assoc();
?>