<?php
session_start();
include_once("Conexao.php");

$idusuario = $_SESSION['id_usuario'];
$passatual = filter_input(INPUT_POST, 'passatual', FILTER_SANITIZE_STRING);
$passnova = filter_input(INPUT_POST, 'passnova', FILTER_SANITIZE_STRING);


$result_usuario = "UPDATE usuario SET senha_usuario = md5('{$passnova}') WHERE senha_usuario = md5('{$passatual}') AND id_usuario = '$idusuario'";

$resultado_usuario = mysqli_query($conexao, $result_usuario);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Senha editada com sucesso</p>";
	header("Location:usuario.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Senha não foi editado com sucesso</p>";
	header("Location:usuario.php?id=");
}

?>