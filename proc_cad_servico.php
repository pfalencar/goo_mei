<?php
session_start();
include_once("Conexao.php");

$id_usuario = $_SESSION['id_usuario'];
$descricaoServico = filter_input(INPUT_POST, 'descricaoServico', FILTER_SANITIZE_STRING);
$precoServico = filter_input(INPUT_POST, 'precoServico', FILTER_SANITIZE_STRING);
$quantidadeServico = filter_input(INPUT_POST, 'quantidadeServico', FILTER_SANITIZE_STRING);

/*
echo "descricaoServico: $descricaoServico <br>";
echo "precoServico: $precoServico <br>";
echo "quantidade: $quantidadeServico <br>";
*/


$result_servico = "INSERT INTO servico (id_usuario, descricaoservico, precoservico, quantidadeservico, dt) VALUES ('$id_usuario','$descricaoServico', '$precoServico', '$quantidadeServico',NOW())";

$resultado_servico = mysqli_query($conexao, $result_servico);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Servico cadastrado com sucesso</p>";
	header("Location:CadServico.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Servico não foi cadastrado com sucesso</p>";
	header("Location:CadServico.php");
}


?>