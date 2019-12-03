<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from usuario where email_usuario = '$email'";

$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1){
	$_SESSION['usuario_existe'] = true;
	header('Location: cadastro.php');
	exit;	

} elseif ($row['total'] == 0) {
	$sql = "INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario) VALUES ('$nome', '$email','$senha')";
	if ($conexao->query($sql) === TRUE) {
	  $_SESSION['status_cadastro'] = true;
	  header('Location: cadastro.php');
		exit;
	}
} else {
	die();
}

$conexao->close();

?>