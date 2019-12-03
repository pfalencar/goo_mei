<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)){
	
	$result_cliente = "DELETE FROM cliente WHERE id_cliente='$id'";
	$resultado_cliente = mysqli_query ($conexao, $result_cliente);

	if (mysqli_affected_rows($conexao)){
		$_SESSION['msg'] = "<p style='color:green'>Cliente apagado com sucesso!</p>";
		header("Location:PesquisaCliente.php");
	} else {
		$_SESSION['msg'] = "<p style='color:red'>Cliente não foi apagado com sucesso!</p>";
		header("Location:PesquisaCliente.php");
	}
	
} else {
	$_SESSION['msg'] = "<p style='color:red'>Necessário selecionar um cliente!</p>";
	header("Location:PesquisaCliente.php");
}
?>