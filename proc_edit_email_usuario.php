<?php
session_start();
include_once("Conexao.php");

$idusuario = $_SESSION['id_usuario'];
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

$result_usuario = "UPDATE usuario SET email_usuario = '$email' WHERE id_usuario = '$idusuario'";

$resultado_usuario = mysqli_query($conexao, $result_usuario);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Email editado com sucesso</p>";
	header("Location:usuario.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Email não foi editado com sucesso</p>";
	header("Location:usuario.php?id=");
}

?>