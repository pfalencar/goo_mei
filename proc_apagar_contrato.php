<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)){
	
	$result_contrato = "DELETE FROM contrato WHERE id_contrato='$id'";
	$resultado_contrato = mysqli_query ($conexao, $result_contrato);

	if (mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green'>Contrato apagado com sucesso!</p>";
		header("Location:PesquisaContrato.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red'>Contrato não foi apagado com sucesso.</p>";
		header("Location:PesquisaContrato.php");
	}
	
} else {
	$_SESSION['msg'] = "<p style='color:red'>Necessário selecionar um contrato.</p>";
	header("Location:PesquisaContrato.php");
}
?>