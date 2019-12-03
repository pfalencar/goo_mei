<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
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
echo "id do usuario: $id_usuario <br>";
echo "id do cliente: $id <br>";
echo "nome: $nome <br>";
echo "cpf: $cpf <br>";
echo "email: $email <br>";
echo "telefone: $telefone <br>";
echo "celular: $celular <br>";
echo "sexo: $sexo <br>";
echo "nome da mae: $nomemae <br>";
echo "nome do pai: $nomepai <br>";
echo "cep: $cep <br>";
echo "logradouro: $logradouro <br>";
echo "numero: $numero <br>";
echo "bairro: $bairro <br>";
echo "cidade: $cidade <br>";
echo "uf: $uf <br>";
*/

$result_cliente = "UPDATE cliente SET nome='$nome', cpf='$cpf', email='$email', tel='$telefone', cel='$celular', sexo='$sexo', rg='$rg', nome_mae='$nomemae', nome_pai='$nomepai', cep='$cep', logradouro='$logradouro', numero='$numero', bairro='$bairro', cidade='$cidade', uf='$uf' WHERE id_cliente = '$id'";

$resultado_cliente = mysqli_query($conexao, $result_cliente);

if (mysqli_affected_rows($conexao)){
	$_SESSION['msg'] = "<p style='color:green'>Cliente editado com sucesso</p>";
	header("Location:edit_cliente.php");
} else {
	$_SESSION['msg'] = "<p style='color:red'>Cliente não foi editado com sucesso</p>";
	header("Location:edit_cliente.php?id=");
}

?>