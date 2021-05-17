<?php
  include('../dao/conexao.php');
  $sql_edit_unidade = "select * FROM unidadeproduto";
  $sql_query_unidade_edit = $conexao->query($sql_edit_unidade) or die ($conexao->error);
  $edit_unidadeproduto = $sql_query_unidade_edit->fetch_assoc();
?>