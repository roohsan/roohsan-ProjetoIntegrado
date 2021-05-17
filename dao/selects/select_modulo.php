<?php
  include('../dao/conexao.php');
  $sql_code_modulo = "select * FROM modulo";
  $sql_query_modulo = $conexao->query($sql_code_modulo) or die ($conexao->error);
  $linha_modulo = $sql_query_modulo->fetch_assoc();
?>