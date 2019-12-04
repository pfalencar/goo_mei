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
$result_desc_servico = "SELECT * FROM servico WHERE id_servico = '$id_categoria' ORDER BY descricaoservico";
$resultado_desc_servico = mysqli_query($conexao, $result_desc_servico);
$row_desc_servico = mysqli_fetch_assoc($resultado_desc_servico);
$descricaoservico =  $row_desc_servico['descricaoservico'];

//valor unitario
$id_sub_categoria2 = filter_input(INPUT_POST, 'id_sub_categoria2', FILTER_SANITIZE_STRING);

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




$result_venda_servico = "INSERT INTO vendaservico (id_usuario, id_mei, id_cliente, id_servico, descricaoservico, valorunitario, qtd, nomecliente, formapgto, dtvenda, valortotal,situacao) VALUES ('$idusuario','$idmei', '$cliente', '$id_categoria','$descricaoservico', '$id_sub_categoria2', '$quantidade', '$nomecliente', '$pagamento', NOW(), '$result','REALIZADA');";

$resultado_venda_servico = mysqli_query($conexao, $result_venda_servico);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Venda de serviço cadastrada com sucesso!</p>";
	header("Location:CadVendaServico.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Venda de serviço não foi cadastrada com sucesso.</p>";
	header("Location:CadVendaServico.php");
}


?>