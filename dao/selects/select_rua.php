<?php
  include('../dao/conexao.php');
  $sql_code_rua = "select * FROM rua";
  $sql_query_rua = $conexao->query($sql_code_rua) or die ($conexao->error);
  $linha_rua = $sql_query_rua->fetch_assoc();
?>