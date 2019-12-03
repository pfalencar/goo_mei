<?php
session_start();
include_once("Conexao.php");

$id_estoque = filter_input(INPUT_POST, 'id_estoque', FILTER_SANITIZE_NUMBER_INT);
$descricaoestoque = filter_input(INPUT_POST, 'descricaoestoque', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);
/*
echo "id_estoque: $id_estoque <br>";
echo "descricaoestoque: $descricaoestoque <br>";
echo "preco: $preco <br>";
echo "quantidade: $quantidade <br>";
*/
$result_estoque = "UPDATE estoque SET descricaoestoque='$descricaoestoque', preco='$preco', quantidade='$quantidade' WHERE id_estoque = '$id_estoque'";

$resultado_estoque = mysqli_query($conexao, $result_estoque);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Estoque editado com sucesso</p>";
	header("Location:edit_estoque.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Estoque não foi editado com sucesso</p>";
	header("Location:edit_estoque.php?id=");
}

?>