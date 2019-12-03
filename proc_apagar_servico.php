<?php
session_start();
include_once("Conexao.php");

$id_servico = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
/*
echo "id servico: $id_servico <br>";
*/
if (!empty($id_servico)){
	
	$result_servico = "DELETE FROM servico WHERE id_servico='$id_servico'";
	$resultado_servico = mysqli_query ($conexao, $result_servico);

	if (mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green'>Serviço apagado com sucesso</p>";
		header("Location:PesquisaServico.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red'>Serviço não foi apagado com sucesso</p>";
		header("Location:PesquisaServico.php");
	}
	
} else {
	$_SESSION['msg'] = "<p style='color:red'>Necessário selecionar um serviço</p>";
	header("Location:PesquisaServico.php");
}

?>