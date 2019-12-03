<?php
session_start();
include_once("Conexao.php");

$idfornec = filter_input(INPUT_POST, 'fornecedores', FILTER_SANITIZE_STRING);
$id_mei = filter_input(INPUT_POST, 'id_mei', FILTER_SANITIZE_STRING);
$idusuario = $_SESSION['id_usuario'];
					
$result_fornecedores = "SELECT nome_razaosocial FROM fornecedor WHERE id_fornecedor ='$idfornec'";
$resultado_fornecedores = mysqli_query($conexao, $result_fornecedores);	
$row_fornecedor = mysqli_fetch_assoc($resultado_fornecedores);
$nomefornecedor = $row_fornecedor['nome_razaosocial'];

$descricaocompra = filter_input(INPUT_POST, 'descricaocompra', FILTER_SANITIZE_STRING);
$valorcompra = filter_input(INPUT_POST, 'valorcompra', FILTER_SANITIZE_STRING);

/*
echo "id do fornecedor: $idfornec <br>"; 
echo "id mei: $id_mei <br>";
echo "id usuario: $idusuario <br>";
echo "nome do fornecedor: $nomefornecedor <br>";
echo "descricaocompra: $descricaocompra <br>";
echo "valorcompra: $valorcompra <br>";
*/

$result_compra = "INSERT INTO compra (id_fornecedor,id_mei,id_usuario,fornecedor,descricaocompra, dtcompra, valorcompra) VALUES ('$idfornec', '$id_mei', '$idusuario', '$nomefornecedor', '$descricaocompra', NOW(), '$valorcompra')";

$resultado_compra = mysqli_query($conexao, $result_compra);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Compra cadastrada com sucesso</p>";
	header("Location:CadCompra.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Compra não foi cadastrada com sucesso</p>";
	header("Location:CadCompra.php");
}


?>