<?php
session_start();
include('conexao.php');

if( empty($_POST['email']) || empty($_POST['senha']) ) {
  header('Location: index.php');
  echo "E-mail ou senha vazios!";
  exit();
}

$email = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT id_usuario, nome_usuario FROM usuario WHERE email_usuario = '{$email}' AND senha_usuario = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1){
	$resposta_bd = mysqli_fetch_assoc($result);
	$_SESSION['id_usuario'] = $resposta_bd['id_usuario'];
	$_SESSION['nome_usuario'] = $resposta_bd['nome_usuario'];
	header('Location: painel.php');
	exit();

} elseif ($row == 0){
	$_SESSION['nao_autenticado'] = true;
	header('Location: acessar.php');
	exit();	

} else {
	die();
}
	

?>
	