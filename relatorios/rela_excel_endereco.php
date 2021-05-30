<?php
session_start();
include('../dao/conexao.php');
include('../dao/selects/select_endereco.php');
include('../control/autenticacao.php');
?>
<!doctype html>


<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>movimentacao</title>
  </head>

  <body >
    <?php
      //definindo o nome do relatorio
      $arquivo = 'endereco.xls';

      //criando a tabela
      $html = '';
      $html .= '<table border="1">';
      $html .= '<tr>';
      $html .= '<td colspan="5" style="text-align:center"><b>Lista de Endereço</b></tr>';
      $html .= '</tr>';

      $html .= '<tr>';
      $html .= '<td style="text-align:center"><b>Rua</b></td>';
      $html .= '<td style="text-align:center"><b>Nivel</b></td>';
      $html .= '<td style="text-align:center"><b>Sequencia</b></td>';
      $html .= '<td style="text-align:center"><b>Modulo</b></td>';
      $html .= '<td style="text-align:center"><b>Dt. Cadastro</b></td>';
      $html .= '</tr>';

      do{
          $html .= '<tr>';
          $html .= '<td style="text-align:center">'.$linha_endereco["rua"].'</td>';
          $html .= '<td style="text-align:center">'.$linha_endereco["nivel"].'</td>';
          $html .= '<td style="text-align:center">'.$linha_endereco["sequencia"].'</td>';
          $html .= '<td style="text-align:center">'.$linha_endereco["modulo"].'</td>';
          $html .= '<td style="text-align:center">'.date("d/m/y", strtotime($linha_endereco ['dataCadastro'])).'</td>';

          $html .= '</tr>';


      }while($linha_endereco = $sql_query_endereco->fetch_assoc());

      //configurações para realizar o download
      header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
      header("Last-Modified:" .gmdate("D,d M YH:i:s") . "GMT");
      header("Cache-Control: no-cache, must-revalidate");
      header("Pragma: no-cache");
      header("Content-Type: application/x-msexcel");
      header("Content-Disposition: attachment; filename=\"{$arquivo}\"");
      header("Content-Description: PHP Generated Data");

      echo $html;
      exit;             
    ?>


  </body>

</html>