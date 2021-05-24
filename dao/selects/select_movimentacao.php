<?php
  include('../dao/conexao.php');
  $sql_code = "select * FROM movimentacao";
  $sql_query = $conexao->query($sql_code) or die ($conexao->error);
  $linha = $sql_query->fetch_assoc();
  $count_movi = mysqli_num_rows($sql_query);
?>