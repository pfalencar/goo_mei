<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)){
	
	$result_funcionario = "DELETE FROM funcionario WHERE id_funcionario='$id'";
	$resultado_funcionario = mysqli_query ($conexao, $result_funcionario);

	if (mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green'>Funcionário apagado com sucesso!</p>";
		header("Location:PesquisaFuncionario.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red'>Funcionário não foi apagado com sucesso!</p>";
		header("Location:PesquisaFuncionario.php");
	}
	
} else {
	$_SESSION['msg'] = "<p style='color:red'>Necessário selecionar um funcionário!</p>";
	header("Location:PesquisaFuncionario.php");
}
?>