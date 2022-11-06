<?php
include_once("conexao.php");

$id = $_POST['id'];
$nome=$_POST['nome'];
$marca=$_POST['marca'];
$qtd=$_POST['qtd'];
$preco=$_POST['preco'];

date_default_timezone_set('America/Sao_Paulo');

$data_atualizada = date("Y-m-d H:i:s");


$instrucao="UPDATE produtos SET nome = '$nome', marca = '$marca', qtd = '$qtd', preco = '$preco', data_atualizada = '$data_atualizada' WHERE id = '$id '" ;

mysqli_query($conn, $instrucao);
header("location: ../pags/tabela_prod.php");

?>