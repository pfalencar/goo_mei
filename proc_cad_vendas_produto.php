<?php
session_start();
include_once("Conexao.php");

//id do usuario
$idusuario = $_SESSION['id_usuario']; 
//id do mei
$result_id_mei = "SELECT * FROM mei WHERE id_usuario = '$idusuario' ORDER BY id_mei";
$resultado_id_mei = mysqli_query($conexao, $result_id_mei);
$row_id_mei = mysqli_fetch_assoc($resultado_id_mei);
$idmei =  $row_id_mei['id_mei'];

//id do servico
$id_categoria = filter_input(INPUT_POST, 'id_categoria', FILTER_SANITIZE_STRING);

//descricao servico
$result_desc_produto = "SELECT * FROM estoque WHERE id_estoque = '$id_categoria' ORDER BY descricaoEstoque";
$resultado_desc_produto = mysqli_query($conexao, $result_desc_produto);
$row_desc_produto = mysqli_fetch_assoc($resultado_desc_produto);
$descricaoproduto =  $row_desc_produto['descricaoEstoque'];

//valor unitario
$id_sub_categoria = filter_input(INPUT_POST, 'id_sub_categoria2', FILTER_SANITIZE_STRING);

//quantidade
$quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_SANITIZE_STRING);

//id do cliente
$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);

//nome do cliente
$result_nome_cliente = "SELECT * FROM cliente WHERE id_cliente = '$cliente' ORDER BY nome";
$resultado_nome_cliente = mysqli_query($conexao, $result_nome_cliente);
$row_nome_cliente = mysqli_fetch_assoc($resultado_nome_cliente);
$nomecliente =  $row_nome_cliente['nome'];

//forma de pagamento
$pagamento = filter_input(INPUT_POST, 'pagamento', FILTER_SANITIZE_STRING);
$result = filter_input(INPUT_POST, 'result', FILTER_SANITIZE_STRING);

/*
echo "idusuario: $idusuario <br>";
echo "idmei: $idmei <br>";
echo "id do cliente: $cliente <br>";
echo "id do servico: $id_categoria <br>";
echo "descricaoservico: $descricaoservico <br>";
echo "valor unitario: $id_sub_categoria2 <br>";
echo "quantidade: $quantidade <br>";
echo "nome do cliente: $nomecliente <br>";
echo "forma de pagmento: $pagamento <br>";
echo "valor total: $result <br>";
*/




$result_venda_produto = "INSERT INTO vendaproduto (id_usuario, id_mei, id_cliente, id_estoque, descricaoestoque, valorunitario, qtd, nomecliente, formapgto, dtvenda, valortotal,situacao) VALUES ('$idusuario','$idmei', '$cliente', '$id_categoria','$descricaoproduto', '$id_sub_categoria', '$quantidade', '$nomecliente', '$pagamento', NOW(), '$result','REALIZADA');";

$resultado_venda_produto = mysqli_query($conexao, $result_venda_produto);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Venda de produto cadastrada com sucesso!</p>";
	header("Location:CadVendaProduto.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Venda de produto não foi cadastrada com sucesso.</p>";
	header("Location:CadVendaProduto.php");
}


?>