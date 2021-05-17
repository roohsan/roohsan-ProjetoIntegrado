<?php
  include('../dao/conexao.php');
  $sql_code_sequencia = "select * FROM sequencia";
  $sql_query_sequencia = $conexao->query($sql_code_sequencia) or die ($conexao->error);
  $linha_sequencia = $sql_query_sequencia->fetch_assoc();
?>