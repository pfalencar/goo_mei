<?php
session_start();
include_once("Conexao.php");

$id_servico = filter_input(INPUT_POST, 'id_servico', FILTER_SANITIZE_NUMBER_INT);
$descricaoservico = filter_input(INPUT_POST, 'descricaoservico', FILTER_SANITIZE_STRING);
$precoservico = filter_input(INPUT_POST, 'precoservico', FILTER_SANITIZE_STRING);
$quantidadeservico = filter_input(INPUT_POST, 'quantidadeservico', FILTER_SANITIZE_STRING);
/*
echo "id_servico: $id_servico <br>";
echo "descricaoservico: $descricaoservico <br>";
echo "precoservico: $precoservico <br>";
echo "quantidadeservico: $quantidadeservico <br>";
*/

$result_servico = "UPDATE servico SET descricaoservico='$descricaoservico', precoservico='$precoservico', quantidadeservico='$quantidadeservico' WHERE id_servico = '$id_servico'";

$resultado_servico = mysqli_query($conexao, $result_servico);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Serviço editado com sucesso</p>";
	header("Location:edit_servico.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Serviço não foi editado com sucesso</p>";
	header("Location:edit_servico.php?id=");
}

?>