<?php
session_start();
include_once("Conexao.php");

$id_usuario = $_SESSION['id_usuario'];
$descricaoEstoque = filter_input(INPUT_POST, 'descricaoEstoque', FILTER_SANITIZE_STRING);
$preco = filter_input(INPUT_POST, 'preco', FILTER_SANITIZE_STRING);
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);

/*
echo "descricao Estoque: $descricaoEstoque <br>";
echo "preco: $preco <br>";
echo "quantidade: $quantidade <br>";

*/


$result_estoque = "INSERT INTO estoque (id_usuario, descricaoEstoque, preco, quantidade, dt) VALUES ('$id_usuario','$descricaoEstoque', '$preco', '$quantidade', NOW())";

$resultado_estoque = mysqli_query($conexao, $result_estoque);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Estoque cadastrado com sucesso</p>";
	header("Location:CadEstoque.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Estoque não foi cadastrado com sucesso</p>";
	header("Location:CadEstoque.php");
}


?>