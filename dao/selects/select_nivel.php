<?php
  include('../dao/conexao.php');
  $sql_code_nivel = "select * FROM nivel";
  $sql_query_nivel = $conexao->query($sql_code_nivel) or die ($conexao->error);
  $linha_nivel = $sql_query_nivel->fetch_assoc();
?>