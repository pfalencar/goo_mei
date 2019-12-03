<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)){
	
	$result_compra = "DELETE FROM compra WHERE id_compra='$id'";
	$resultado_compra = mysqli_query ($conexao, $result_compra);

	if (mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green'>Compra apagada com sucesso</p>";
		header("Location:PesquisaCompra.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red'>Compra não foi apagada com sucesso</p>";
		header("Location:PesquisaCompra.php");
	}
	
} else {
	$_SESSION['msg'] = "<p style='color:red'>Necessário selecionar um compra</p>";
	header("Location:PesquisaCompra.php");
}
?>