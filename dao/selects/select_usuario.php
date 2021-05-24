<?php
  include('../dao/conexao.php');
  $sql_code = "select * FROM usuario";
  $sql_query = $conexao->query($sql_code) or die ($conexao->error);
  $linha = $sql_query->fetch_assoc();
  $count_user = mysqli_num_rows($sql_query);
?>