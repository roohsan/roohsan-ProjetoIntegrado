<?php
  include('../dao/conexao.php');
  $sql_edit_tipo = "select * FROM tipoproduto";
  $sql_query_edit_tipo = $conexao->query($sql_edit_tipo) or die ($conexao->error);
  $edit_tipoproduto = $sql_query_edit_tipo->fetch_assoc();
?>