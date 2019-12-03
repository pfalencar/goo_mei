<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$dtcompra = filter_input(INPUT_POST, 'dtcompra', FILTER_SANITIZE_STRING);
$descricaocompra = filter_input(INPUT_POST, 'descricaocompra', FILTER_SANITIZE_STRING);
$valorcompra = filter_input(INPUT_POST, 'valorcompra', FILTER_SANITIZE_STRING);

$idfornec = filter_input(INPUT_POST, 'fornecedores', FILTER_SANITIZE_STRING);
$id_mei = filter_input(INPUT_POST, 'id_mei', FILTER_SANITIZE_STRING);
$idusuario = $_SESSION['id_usuario'];
					
$result_fornecedores = "SELECT nome_razaosocial FROM fornecedor WHERE id_fornecedor ='$idfornec'";
$resultado_fornecedores = mysqli_query($conexao, $result_fornecedores);	
$row_fornecedor = mysqli_fetch_assoc($resultado_fornecedores);
$nomefornecedor = $row_fornecedor['nome_razaosocial'];




//echo "id: $id <br>";
//echo "descricao compra: $descricaocompra <br>";
//echo "dtcompra: $dtcompra <br>";
//echo "valorcompra: $valorcompra <br>";

$result_compra = "UPDATE compra SET id_fornecedor='$idfornec',fornecedor='$nomefornecedor', descricaocompra='$descricaocompra', dtcompra='$dtcompra', valorcompra='$valorcompra' WHERE id_compra = '$id'";

$resultado_compra = mysqli_query($conexao, $result_compra);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Compra editada com sucesso</p>";
	header("Location:edit_compra.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Compra não foi editada com sucesso</p>";
	header("Location:edit_compra.php?id=");
}

?>