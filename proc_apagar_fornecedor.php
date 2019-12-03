<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)){
	
	$result_fornecedor = "DELETE FROM fornecedor WHERE id_fornecedor='$id'";
	$resultado_fornecedor = mysqli_query ($conexao, $result_fornecedor);

	if (mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green'>Fornecedor apagado com sucesso</p>";
		header("Location:PesquisaFornecedor.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red'>Fornecedor não foi apagado com sucesso</p>";
		header("Location:PesquisaFornecedor.php");
	}
	
} else {
	$_SESSION['msg'] = "<p style='color:red'>Necessário selecionar um fornecedor</p>";
	header("Location:PesquisaFornecedor.php");
}
?>