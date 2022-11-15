<!-- EXEMPLO: -->
<?php
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_STRING);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
$tel = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);

$_SESSION['Nome'] = $_POST['nome'];

$result_usuario = "INSERT INTO prog VALUES ( 0,'$nome','$user', '$senha','$tel','$end')";

$resutado_usuario = mysqli_query($conn, $result_usuario);

header("Location: ../pags/cadastros/cadastro_prog.php");

?>