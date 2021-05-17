<?php
//inclusao do arquivo conexao.php
include('../../dao/conexao.php');
//
$rua = isset($_POST['rua']) == true ? $_POST['rua']:"";
$nivel = isset($_POST['nivel']) == true ? $_POST['nivel']:"";
$bloco = isset($_POST['bloco']) == true ? $_POST['bloco']:"";
$sequencia = isset($_POST['sequencia']) == true ? $_POST['sequencia']:"";


if($sequencia%2==0){

$query = "INSERT INTO `endereco` (`rua`, `nivel`,`sequencia`, `modulo`, `dataCadastro`) VALUES ('$rua', '$nivel', '$sequencia', 'Par', current_date())";
$query_rua = "INSERT INTO `estoque`.`rua` (`nome_rua`) VALUES ('$rua')";
$query_modulo = "INSERT INTO `estoque`.`modulo` (`nome_modulo`) VALUES ('Par')";
$query_nivel = "INSERT INTO `estoque`.`nivel` (`nome_nivel`) VALUES ('$nivel')";
$query_sequencia = "INSERT INTO `estoque`.`sequencia` (`nome_sequencia`) VALUES ('$sequencia')";
}else{

$query = "INSERT INTO `endereco` (`rua`, `nivel`, `sequencia`, `modulo`, `dataCadastro`) VALUES ('$rua', '$nivel','$sequencia', 'Impar', current_date())";

$query_rua = "INSERT INTO `estoque`.`rua` (`nome_rua`) VALUES ('$rua')";
$query_modulo = "INSERT INTO `estoque`.`modulo` (`nome_modulo`) VALUES ('Impar')";
$query_nivel = "INSERT INTO `estoque`.`nivel` (`nome_nivel`) VALUES ('$nivel')";
$query_sequencia = "INSERT INTO `estoque`.`sequencia` (`nome_sequencia`) VALUES ('$sequencia')";

}
echo $query;

$result = mysqli_query($conexao,$query);
$result1 = mysqli_query($conexao,$query_rua);
$result2 = mysqli_query($conexao,$query_nivel);
$result3= mysqli_query($conexao,$query_sequencia);
$result4 = mysqli_query($conexao,$query_modulo);
//header('location: ../../views/usuario.php');





?>