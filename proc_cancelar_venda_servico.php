<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_cancelar_venda_servico = "UPDATE vendaservico SET situacao='CANCELADA' WHERE id_venda_servico = '$id'";

$resultado_compra = mysqli_query($conexao, $result_cancelar_venda_servico);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Venda de Serviço editada com sucesso</p>";
	header("Location:PesquisaVendaServico.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Venda de Serviço não foi editada com sucesso</p>";
	header("Location:PesquisaVendaServico.php?id=");
}


?>