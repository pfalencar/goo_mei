<?php
session_start();
include_once("Conexao.php");

$id_usuario = $_SESSION['id_usuario'];
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$nomemae = filter_input(INPUT_POST, 'nomemae', FILTER_SANITIZE_STRING);
$nomepai = filter_input(INPUT_POST, 'nomepai', FILTER_SANITIZE_STRING);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
$logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);

/*
echo "nome: $nome <br>";
echo "cpf: $cpf <br>";
echo "sexo: $sexo <br>";
echo "cep: $cep <br>";
echo "uf: $uf <br>";
*/


$result_cliente = "INSERT INTO cliente (id_usuario, nome, cpf, email, tel, cel, sexo, rg, nome_mae, nome_pai, cep, logradouro, numero, bairro, cidade, uf, dt) VALUES ('$id_usuario', '$nome', '$cpf', '$email', '$telefone', '$celular', '$sexo', '$rg', '$nomemae', '$nomepai', '$cep', '$logradouro', '$numero', '$bairro', '$cidade', '$uf',NOW())";

$resultado_cliente = mysqli_query($conexao, $result_cliente);

if (mysqli_insert_id($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Cliente cadastrado com sucesso</p>";
	header("Location:CadCliente.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Cliente não foi cadastrado com sucesso</p>";
	header("Location:CadCliente.php");
}


?>