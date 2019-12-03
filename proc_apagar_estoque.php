<?php
session_start();
include_once("Conexao.php");

$id_estoque = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id_estoque)){
	
	$result_estoque = "DELETE FROM estoque WHERE id_estoque='$id_estoque'";
	$resultado_estoque = mysqli_query ($conexao, $result_estoque);

	if (mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green'>Estoque apagado com sucesso</p>";
		header("Location:PesquisaEstoque.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red'>Estoque não foi apagado com sucesso</p>";
		header("Location:PesquisaEstoque.php");
	}
	
} else {
	$_SESSION['msg'] = "<p style='color:red'>Necessário selecionar um estoque</p>";
	header("Location:PesquisaEstoque.php");
}
?>