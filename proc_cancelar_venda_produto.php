<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result_cancelar_venda_produto = "UPDATE vendaproduto SET situacao='CANCELADA' WHERE id_venda_produto = '$id'";

$resultado_compra = mysqli_query($conexao, $result_cancelar_venda_produto);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Venda de Produto editada com sucesso</p>";
	header("Location:PesquisaVendaProduto.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Venda de Produto não foi editada com sucesso</p>";
	header("Location:PesquisaVendaProduto.php?id=");
}


?>